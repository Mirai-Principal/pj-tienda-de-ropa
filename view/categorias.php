<?php
require_once("../config/conexion.php");
//get ciudades
$sql = "SELECT * from cat_producto where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $datos[] = $fila;
}
?>

<style>
    /***** Input nombre cat *****/
    .input-newCat {
        position: relative;
        width: 300px;
    }

    .input-newCat input {
        width: 100%;
        padding: 10px;
        border: 2px solid #7f8fa6;
        border-radius: 5px;
        outline: none;
        font-size: 1rem;
        transition: 0.6s;
    }

    .input-newCat label {
        position: absolute;
        left: 0;
        padding: 10px;
        font-size: 1rem;
        color: #7f8fa6;
        text-transform: uppercase;
        pointer-events: none;
        transition: 0.6s;
    }

    .input-newCat input:valid~label,
    .input-newCat input:focus~label {
        color: #3742fa;
        transform: translateX(10px) translateY(-7px);
        font-size: 0.65rem;
        font-weight: 600;
        padding: 0 10px;
        background: #fff;
        letter-spacing: 0.1rem;
    }

    .input-newCat input:valid,
    .input-newCat input:focus {
        color: #3742fa;
        border: 2px solid #3742fa;

    }

    /***** End Input nombre cat *****/

    div#div_file {
        position: relative;
        margin: 12px;
        padding: 10px;
        width: 300px;
        background-color: #2499e3;
        color: white;
        font-weight: bold;
    }

    input#btn_enviar {
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
</style>

<div class="row text-center">
    <h1>Categorías</h1>
</div>
<div class="row text-center">
    <div class="col">
        <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#nueva_categoria_modal">Nueva categoría</button>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Ver productos</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $key => $fila) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $fila['Des_Categoria'] ?></td>
                        <td><img src="<?= PATH_FILES . 'categorias/' . $fila['img_categoria'] ?>" alt="" class="w-50 "></td>
                        <td><button class="btn btn-info form-control">Ver</button></td>
                        <td><button class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#update_categoria_modal">Modificar</button>
                        </td>
                        <td>
                            <a href="/categorias/delete?opcion=delete_categoria&Id_Categoria=<?= $fila['Id_Categoria'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nueva_categoria_modal" tabindex="-1" aria-labelledby="nueva_categoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nueva_categoria">Nueva categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/categorias/insert" method="post" id="categorias_insert_form" enctype="multipart/form-data">
                    <div class="input-newCat w-100">
                        <input type="text" name="nombreCat" id="nonbreCat1" required>
                        <label for="nombreCat">Ingrese la categoria</label>
                    </div>
                    <div id="div_file" class="w-50 text-center">
                        <input type="file" name="fileImg" id="btn_enviar1" required>
                        <label for="fileImg">Subir imagen</label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary form-control">Guardar</button>

                    <input type="hidden" value="categorias_insert_form" name="opcion">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update_categoria_modal" tabindex="-1" aria-labelledby="update_categoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update_categoria">Modificar categoría</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/categorias/update" method="post" id="categorias_update_form" enctype="multipart/form-data">
                    <div class="input-newCat w-100">
                        <input type="text" name="nombreCat" class="form-control " required>
                        <label for="nombreCat">Ingrese la categoria</label>
                    </div>
                    <div id="div_file" class=" w-100 text-center">
                        <input type="file" name="fileImg" class="form-control" required>
                        <label for="fileImg">Subir imagen</label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary form-control">Guardar</button>

                    <input type="hidden" value="categorias_update_form" name="opcion">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>