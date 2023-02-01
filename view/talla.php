<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {

    require_once("../config/conexion.php");
    //get talla
    $sql = "SELECT * from talla_modelo where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

?>
    <div class="row text-center">
        <div class="col">
            <h1>Tallas</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-12 py-4">
            <input type="button" value="Nueva talla" class="btn btn-primary form-control w-50" data-bs-toggle="modal" data-bs-target="#talla_insert_modal">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $fila['Talla'] ?></td>
                            <td><button class="btn btn-primary form-control btn_update" data-bs-toggle="modal" data-bs-target="#talla_update_modal" id="<?= $fila['Id_Talla'] ?>">Modificar</button>
                            </td>
                            <td>
                                <a href="/talla/delete?opcion=delete_talla&Id_Talla=<?= $fila['Id_Talla'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal insert -->
    <div class="modal fade" id="talla_insert_modal" tabindex="-1" aria-labelledby="talla_insert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="talla_insert">Nueva talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/talla/insert" method="post" id="talla_insert_form">
                        <input type="text" id="talla" class="form-control my-4" name="talla" placeholder="Ingrese la talla" required pattern="[A-Z]{1,2}">

                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="talla_insert_form" name="opcion">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" id="talla_update_modal" tabindex="-1" aria-labelledby="talla_update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="talla_update">Modificar una talla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/talla/update" method="post" id="talla_update_form">
                        <input type="text" id="_talla" class="form-control my-4" name="_talla" placeholder="Ingrese la talla" required pattern="[A-Z]{1,2}">
                        <input type="hidden" name="Id_Talla" id="Id_talla_update" value="">
                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="talla_update_form" name="opcion">
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
                let _Id_Talla = this.getAttribute('id')
                $.ajax({
                    type: "get",
                    url: "/talla/read",
                    data: {
                        _Id_Talla,
                        'opcion': 'talla_read'
                    },
                    success: function(res) {
                        res = JSON.parse(res)
                        // console.log(res);
                        Id_talla_update.value = res.Id_Talla
                        _talla.value = res.Talla
                    }
                });
            });
        }
    </script>
<?php
} else
    header('Location: /');
?>