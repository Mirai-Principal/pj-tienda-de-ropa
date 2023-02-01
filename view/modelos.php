<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {

    require_once("../config/conexion.php");
    //get talla
    $sql = "SELECT * from modelos where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

    $sql = "SELECT * from talla_modelo where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $tallas = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $tallas[] = $fila;
    }

    $sql = "SELECT * from color_modelo where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $color = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $color[] = $fila;
    }

    $sql = "SELECT * from producto where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $productos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $productos[] = $fila;
    }
?>

    <style>
        .img_prod {
            max-width: 80px;
        }
    </style>
    <div class="row text-center">
        <div class="col">
            <h1>Modelos</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6 py-2">
            <input type="button" value="Nuevo modelo" class="btn btn-primary form-control w-50" data-bs-toggle="modal" data-bs-target="#modelo_insert_modal">
        </div>
        <div class="col-md-6 py-2">
            <a href="/modelos_reporte" class="btn btn-primary form-control w-50">Generar Reporte</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $fila['Des_Modelo'] ?></td>
                            <td><img src="<?= PATH_FILES . 'modelos/' . $fila['Img_Modelo'] ?>" alt="" class="img_prod"></td>
                            <td><?= $fila['Stock'] ?></td>
                            <td><?= $fila['Precio'] ?></td>
                            <td><button class="btn btn-primary form-control btn_update" data-bs-toggle="modal" data-bs-target="#modelos_update_modal" id="<?= $fila['Id_Modelo'] ?>">Modificar</button>
                            </td>
                            <td>
                                <a href="/modelos/delete?opcion=delete_modelos&Id_Modelo=<?= $fila['Id_Modelo'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal insert -->
    <div class="modal fade" id="modelo_insert_modal" tabindex="-1" aria-labelledby="modelo_insert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modelo_insert">Nuevo talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/modelos/insert" method="post" id="modelo_insert_form" enctype="multipart/form-data">
                        <input type="text" class="form-control" id="desmod" name="desmod" placeholder="Descripcion del Modelo" required pattern="[A-Za-z]{4-50}">
                        <select name="Id_Producto" id="Id_Producto" class="form-control">
                            <option value="" selected disabled>Seleccionar tipo de producto</option>
                            <?php foreach ($productos as $key => $producto) { ?>
                                <option value="<?= $producto['Id_Producto'] ?>"><?= $producto['Des_Producto'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" class="form-control" id="stomod" name="stomod" placeholder="Stock" required pattern="[0-9]+">
                        <select id="colmod" name="codmod" required class="form-control">
                            <option value="" selected disabled>Color de la tela</option>
                            <?php foreach ($color as $key => $_color) { ?>
                                <option value="<?= $_color['Id_Color'] ?>"><?= $_color['Color'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" id="premod" name="premod" class="form-control" placeholder="Precio" required pattern="[0-9]+" min="10">
                        <select id="telmod" name="telmod" required class="form-control">
                            <option value="" selected disabled>Tipo de tela</option>
                            <option value="Strech antifluido">Strech antifluido</option>
                            <option value="Cloro Resistente">Cloro Resistente</option>
                        </select>
                        <select id="talmod" name="talmod" required class="form-control">
                            <option value="" selected disabled>Seleccionar la talla</option>
                            <?php foreach ($tallas as $key => $talla) { ?>
                                <option value="<?= $talla['Id_Talla'] ?>"><?= $talla['Talla'] ?></option>
                            <?php } ?>
                        </select>
                        <select id="genmod" name="genmod" class="form-control" required>
                            <option value="" selected disabled>Género</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                        </select>
                        <input type="file" id="img_producto" name="img_producto" accept="image/*" class="form-control"> <br>

                        <button type="submit" class="btn btn-primary form-control my-1">Guardar</button>

                        <input type="hidden" value="modelo_insert_form" name="opcion">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" id="modelos_update_modal" tabindex="-1" aria-labelledby="modelo_update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modelo_update">Modificar una talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/modelos/update" method="post" id="modelo_update_form" enctype="multipart/form-data">
                        <input type="text" class="form-control" id="_desmod" name="desmod" placeholder="Descripcion del Modelo" required pattern="[A-Za-z]{4-50}">
                        <select name="_Id_Producto" id="_Id_Producto" class="form-control">
                            <option value="" selected disabled>Seleccionar tipo de producto</option>
                            <?php foreach ($productos as $key => $producto) { ?>
                                <option value="<?= $producto['Id_Producto'] ?>"><?= $producto['Des_Producto'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" class="form-control" id="_stomod" name="stomod" placeholder="Stock" required pattern="[0-9]+">
                        <select id="_colmod" name="codmod" required class="form-control">
                            <option value="" selected disabled>Color de la tela</option>
                            <?php foreach ($color as $key => $_color) { ?>
                                <option value="<?= $_color['Id_Color'] ?>"><?= $_color['Color'] ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" id="_premod" name="premod" class="form-control" placeholder="Precio" required pattern="[0-9]+" min="10">
                        <select id="_telmod" name="telmod" required class="form-control">
                            <option value="" selected disabled>Tipo de tela</option>
                            <option value="Strech antifluido">Strech antifluido</option>
                            <option value="Cloro Resistente">Cloro Resistente</option>
                        </select>
                        <select id="_talmod" name="talmod" required class="form-control">
                            <option value="" selected disabled>Seleccionar la talla</option>
                            <?php foreach ($tallas as $key => $talla) { ?>
                                <option value="<?= $talla['Id_Talla'] ?>"><?= $talla['Talla'] ?></option>
                            <?php } ?>
                        </select>
                        <select id="_genmod" name="genmod" class="form-control" required>
                            <option value="" selected disabled>Género</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                        </select>
                        <input type="file" id="_img_producto" name="_img_producto" accept="image/*" class="form-control"> <br>

                        <button type="submit" class="btn btn-primary form-control my-1">Guardar</button>

                        <input type="hidden" value="modelo_update_form" name="opcion">
                        <input type="hidden" id="Id_Modelo" name="Id_Modelo">
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
                let _Id_Modelo = this.getAttribute('id')
                Id_Modelo.value = _Id_Modelo
                $.ajax({
                    type: "get",
                    url: "/modelos/read",
                    data: {
                        _Id_Modelo,
                        'opcion': 'modelos_read'
                    },
                    success: function(res) {
                        res = JSON.parse(res)
                        console.log(res);
                        _desmod.value = res['Des_Modelo']
                        _stomod.value = res['Stock']
                        _colmod.value = res['Id_Color']
                        _premod.value = res['Precio']
                        _telmod.value = res['calidad_tela']
                        _talmod.value = res['Id_Talla']
                        _genmod.value = res['tipo']
                    }
                });
            });
        }
    </script>
<?php
} else
    header('Location: /')
?>