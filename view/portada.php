<?php
require_once("../config/conexion.php");
//get ciudades
$sql = "SELECT * from cat_producto where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}
?>

<div class="row text-center py-2">
    <h1>Categorías de Productos</h1>
</div>

<div class="row text-center">
    <?php foreach ($datos as $key => $fila) { ?>
        <div class="col-md-2 text-center">
            <div class="card p-2">
                <img src="<?= PATH_FILES . 'categorias/' . $fila['img_categoria'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $fila['Des_Categoria'] ?></h5>
                    <a href="/modelos_producto" class="btn btn-primary">Ver Productos</a>
                </div>
            </div>
        </div>
    <?php } ?>

</div>