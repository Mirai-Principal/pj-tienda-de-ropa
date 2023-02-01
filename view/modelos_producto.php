<?php
require_once("../config/conexion.php");
//get color_tela
$sql = "SELECT * from cat_producto where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$categorias = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $categorias[] = $fila;
}

$sql = "SELECT * from modelos where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$modelos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $modelos[] = $fila;
}
?>

<div class="row">
    <div class="col">
        <h1>Modelos de productos</h1>
    </div>
</div>
<div class="row">
    <!-- <div class="col-md-2">
        <?php foreach ($categorias as $key => $cat) { ?>
            <div class="row">
                <div class="col">
                    <div class="list-group">

                        <a class="list-group-item list-group-item-action" id="<?= $cat['Id_Categoria'] ?>"><?= $cat['Des_Categoria'] ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div> -->
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($modelos as $key => $mod) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?= PATH_FILES . 'modelos/' . $mod['Img_Modelo'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title"><?= $mod['Des_Modelo'] ?></h5>
                            <div class="col-md-4">
                                <?= $mod['Precio'] ?> $
                            </div>
                            <div class="col-md-4">
                                <input type="button" class="btn btn-info btn_carrito" data_precio="<?= $mod['Precio'] ?>"
                                data_description="<?= $mod['Des_Modelo'] ?>" data_opcion='add_carrito' data_id="<?= $mod['Id_Modelo'] ?>" value="Al carrito">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    window.onload = () => {
        $('.btn_carrito').click(function(e) {
            e.preventDefault();
            let obj = $(this)
            let modelo = obj[0].getAttribute('data_id')
            let opcion = obj[0].getAttribute('data_opcion')
            let data_description = obj[0].getAttribute('data_description')
            let data_precio = obj[0].getAttribute('data_precio')
 
            $.ajax({
                type: "post",
                url: "/carrito/insert",
                data: {
                    modelo,
                    opcion,
                    data_description,
                    data_precio
                },
                success: function(res) {
                    console.log(res);
                    if (res == 'login') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ingresa a tu cuenta',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else
                        Toast.fire({
                            icon: 'success',
                            title: 'Se añadio al carrito',
                            timer: 1100
                        })
                }
            });
        });

    }
</script>