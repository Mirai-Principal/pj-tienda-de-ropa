<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {

    require_once("../config/conexion.php");
    //get color_tela
    $sql = "SELECT * from color_modelo where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datos[] = $fila;
    }

?>
    <div class="row text-center">
        <div class="col">
            <h1>Color de la Tela</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12 py-4">
            <input type="button" value="Nuevo color" class="btn btn-primary form-control w-50" data-bs-toggle="modal" data-bs-target="#color_insert_modal">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Color de tela</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $fila['Color'] ?></td>
                            <td><button class="btn btn-primary form-control btn_update" data-bs-toggle="modal" data-bs-target="#color_update_modal" id="<?= $fila['Id_Color'] ?>">Modificar</button>
                            </td>
                            <td>
                                <a href="/color_tela/delete?opcion=delete_color&Id_Color=<?= $fila['Id_Color'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal insert -->
    <div class="modal fade" id="color_insert_modal" tabindex="-1" aria-labelledby="color_insert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="color_insert">Nuevo color de tela</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/color_tela/insert" method="post" id="color_insert_form">
                        <input type="text" id="color" class="form-control my-4" name="color" placeholder="Ingrese el color" required pattern="[A-Za-z\s]{3,50}">

                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="color_insert_form" name="opcion">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" id="color_update_modal" tabindex="-1" aria-labelledby="color_update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="color_update">Modificar el color de la tela</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/color_tela/update" method="post" id="color_update_form">
                        <input type="text" id="_color" class="form-control my-4" name="color_update" placeholder="Ingrese el color" required pattern="[A-Za-z\s]{3,50}">
                        <input type="hidden" name="Id_Color" id="Id_Color_update" value="">
                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="color_update_form" name="opcion">
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
                let _Id_Color = this.getAttribute('id')
                $.ajax({
                    type: "get",
                    url: "/color_tela/read",
                    data: {
                        _Id_Color,
                        'opcion': 'color_read'
                    },
                    success: function(res) {
                        res = JSON.parse(res)
                        console.log(res);
                        Id_Color_update.value = res.Id_Color
                        _color.value = res.Color
                    }
                });
            });
        }
    </script>
<?php
} else
    header('Location: /')
?>