<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {

    require_once("../config/conexion.php");
    //get talla
    $sql = "SELECT * from producto where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

    $sql = "SELECT * from cat_producto where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $categosrias = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $categosrias[] = $fila;
    }
?>

<style>
    .img_prod{
        max-width: 80px;
    }
</style>

    <div class="row text-center">
        <div class="col">
            <h1>Productos</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6 py-2">
            <input type="button" value="Nuevo producto" class="btn btn-primary form-control w-50" data-bs-toggle="modal" data-bs-target="#producto_insert_modal">
        </div>
        <div class="col-md-6 py-2">
            <a class="btn btn-primary form-control w-50" href="/modelos">Ver modelos</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $fila['Des_Producto'] ?></td>
                            <td><img src="<?= PATH_FILES . 'productos/' . $fila['img_Producto'] ?>" alt="" class="img_prod"></td>
                            <td><button class="btn btn-primary form-control btn_update" data-bs-toggle="modal" data-bs-target="#producto_update_modal" id="<?= $fila['Id_Producto'] ?>">Modificar</button>
                            </td>
                            <td>
                                <a href="/producto/delete?opcion=delete_producto&Id_Producto=<?= $fila['Id_Producto'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal insert -->
    <div class="modal fade" id="producto_insert_modal" tabindex="-1" aria-labelledby="producto_insert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="producto_insert">Nuevo talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/productos/insert" method="post" id="producto_insert_form" enctype="multipart/form-data">
                        <input type="text" class="form-control" maxlength="100" name="Des_Producto" id="Des_Producto" placeholder="Descripción del producto">
                        <input type="file" class="form-control" src="" alt="" placeholder="Ingrese imagen" accept='image/*' name="imagen">
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="" selected disabled>Seleccionar la categoría</option>
                            <?php foreach ($categosrias as $key => $cat) { ?>
                                <option value="<?= $cat['Id_Categoria'] ?>"><?= $cat['Des_Categoria'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-primary form-control my-1">Guardar</button>

                        <input type="hidden" value="producto_insert_form" name="opcion">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" id="producto_update_modal" tabindex="-1" aria-labelledby="producto_update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="producto_update">Modificar una talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/productos/update" method="post" id="producto_update_form" enctype="multipart/form-data">
                        <input type="text" class="form-control" maxlength="100" name="Des_Producto_update" id="Des_Producto_update" placeholder="Descripción del producto" readonly>
                        <input type="file" class="form-control" src="" alt="" placeholder="Ingrese imagen" accept='image/*' name="imagen_update">
                        <select name="_categoria" id="_categoria" class="form-control">
                            <option value="" selected disabled>Seleccionar la categoría</option>
                            <?php foreach ($categosrias as $key => $cat) { ?>
                                <option value="<?= $cat['Id_Categoria'] ?>"><?= $cat['Des_Categoria'] ?></option>
                            <?php } ?>
                        </select>
                        <button type="submit" class="btn btn-primary form-control my-1">Guardar</button>

                        <input type="hidden" value="producto_update_form" name="opcion">
                        <input type="hidden" name="Id_Producto" id="Id_Producto" value="">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = () => {
            $('.btn_update').click(function(e) {
                e.preventDefault();
                let _Id_Producto = this.getAttribute('id')
                $.ajax({
                    type: "get",
                    url: "/producto/read",
                    data: {
                        _Id_Producto,
                        'opcion': 'producto_read'
                    },
                    success: function(res) {
                        res = JSON.parse(res)
                        // console.log(res);
                        Des_Producto_update.value = res.Des_Producto
                        Id_Producto.value = res.Id_Producto
                        _categoria.value = res.Id_Categoria
                    }
                });
            });
        }
    </script>
<?php
} else
    header('Location: /')
?>