<?php

if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];

    require_once("../config/conexion.php");

    $sql = "SELECT * from modelos where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $modelos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $modelos[] = $fila;
    }

    //traer bancos
    $sql = "SELECT * from cuenta_bancaria where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $bancos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        $bancos[] = $fila;
    }
?>
    <style>
        .form_container {
            display: flex;
            justify-content: center;
        }
        #bancos{
            display: none;
        }
    </style>

    <div class="row text-center">
        <div class="col">
            <h1>Carrito de compras</h1>
        </div>
    </div>
    <div class="row form_container">
        <div class="col-8 ">
            <form action="/carrito/insert" method="post" id="carrito_insert_form">
                <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['carrito'] as $key => $fila) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $fila['Des_Modelo'] ?></td>
                                <td><?= $fila['precio'] ?></td>
                                <td>
                                    <a href="/carrito/delete?opcion=delete_carrito_item&<key=<?= $key ?>"><button class="btn btn-danger form-control ">Eliminar</button></a>
                                    <input type="hidden" name="Id_Modelo[]" value="<?= $fila['Id_Modelo'] ?><">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <select name="Pago_Bancario" id="Pago_Bancario" class="form-control w-25 my-4" required>
                    <option value="" selected disabled>Seleccionar tipo de pago</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tranferencia">Tranferencia</option>
                    <option value="Depósito">Depósito</option>
                </select>

                <select name="bancos" id="bancos" class="form-control w-25">
                    <option value="" selected disabled>Seleccionar el banco</option>
                    <?php foreach ($bancos as $key => $fila) { ?>
                        <option value="<?= $fila['Num_Cuenta'] ?>"><?= $fila['Num_Cuenta'] ?></option>
                    <?php } ?>
                </select>

                <input type="hidden" name="opcion" value="carrito_insert_form">
                <input type="submit" value="Realizar pedido" class="form-control btn btn-warning w-50">
                <input type="button" value="Vaciar carrito" id="vaciar" class="form-control btn btn-danger w-25">
            </form>
        </div>
    </div>

    <script>
        Pago_Bancario.onchange = () => {
            if (Pago_Bancario.value == "Efectivo")
                bancos.style.display = "none";
            else
                bancos.style.display = "block";

        }
    </script>
<?php
} else {
?>
    <h1>Carrito vacío</h1>

<?php } ?>