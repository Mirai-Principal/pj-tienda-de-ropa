<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {

    require_once("../config/conexion.php");
    //get cuenta_bancaria
    $sql = "SELECT * from cuenta_bancaria where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datos[] = $fila;
    }

?>
    <div class="row text-center">
        <div class="col">
            <h1>Cuentas Bancarias</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6">
            <input type="button" value="Nueva Cuenta" class="btn btn-primary form-control w-50" data-bs-toggle="modal" data-bs-target="#cuenta_ban_insert_modal">
        </div>
        <div class="col-md-6">
            <a href="/cuentas_bancarias_reporte" class="btn btn-primary form-control w-50">Generar Reporte</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Banco</th>
                        <th scope="col">Número de Cuenta</th>
                        <th scope="col">Tipo de Cuenta</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $fila['Banco'] ?></td>
                            <td><?= $fila['Num_Cuenta'] ?></td>
                            <td><?= $fila['tipo_cuenta'] ?></td>
                            <td><button class="btn btn-primary form-control btn_update" data-bs-toggle="modal" data-bs-target="#cuenta_ban_update_modal" id="<?= $fila['Num_Cuenta'] ?>">Modificar</button>
                            </td>
                            <td>
                                <a href="/cuenta_bancaria/delete?opcion=delete_cuenta&Num_Cuenta=<?= $fila['Num_Cuenta'] ?>"><button class="btn btn-danger form-control">Eliminar</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal insert -->
    <div class="modal fade" id="cuenta_ban_insert_modal" tabindex="-1" aria-labelledby="cuenta_ban_insert" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cuenta_ban_insert">Nueva Cuenta Bancaria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/cuenta_bancaria/insert" method="post" id="cuenta_ban_insert_form">
                        <input type="text" id="_banco" class="form-control" name="_banco" placeholder="Ingrese el Banco" required pattern="[A-Za-z\s]{4,50}">
                        <input type="text" id="_numcuenta" class="form-control" name="_numcuenta" placeholder="Ingrese número de cuenta" required pattern="[0-9]{12}" maxlength="12" minlength="12" title="Sólo números de 12 dígitos">

                        <select name="_tipocuenta" id="_tipocuenta" required class="form-control">
                            <option value="" selected disabled>Tipo de cuenta</option>
                            <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                            <option value="Cuenta Corriente">Cuenta Corriente</option>
                        </select>

                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="cuenta_ban_insert_form" name="opcion">
                    </form>
                </div>
                <div class="modal-footer py-0">
                    <button type="button" class="btn btn-danger form-control" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" id="cuenta_ban_update_modal" tabindex="-1" aria-labelledby="cuenta_ban_update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cuenta_ban_update">Modificar Cuenta Bancaria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <form action="/cuenta_bancaria/update" method="post" id="cuenta_ban_update_form">
                        <input type="text" id="banco_update" class="form-control" name="banco" placeholder="Ingrese el Banco" required pattern="[A-Za-z\s]{4,50}">
                        <input type="text" id="numcuenta_update" class="form-control" name="numcuenta" placeholder="Ingrese número de cuenta" required pattern="[0-9]{12}" maxlength="12" minlength="12" readonly>

                        <select name="tipocuenta" id="tipocuenta_update" required class="form-control">
                            <option value="" selected disabled>Tipo de cuenta</option>
                            <option value="Cuenta de ahorros">Cuenta de ahorros</option>
                            <option value="Cuenta Corriente">Cuenta Corriente</option>
                        </select>

                        <button type="submit" class="btn btn-primary form-control">Guardar</button>

                        <input type="hidden" value="cuenta_ban_update_form" name="opcion">
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
                let _numcuenta = this.getAttribute('id')
                $.ajax({
                    type: "get",
                    url: "/cuenta_bancaria/read",
                    data: {
                        _numcuenta,
                        'opcion' : 'cuenta_ban_read'
                    },
                    success: function (res) {
                        res = JSON.parse(res)
                        banco_update.value = res.Banco
                        numcuenta_update.value = res.Num_Cuenta
                        tipocuenta_update.value = res.tipo_cuenta
                    }
                });
            });
        }
    </script>
<?php
} else
    header('Location: /')
?>