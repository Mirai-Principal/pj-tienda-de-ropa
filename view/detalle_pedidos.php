<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'clientes') {
    require_once("../config/conexion.php");

    $sql = "SELECT * from negocio";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    $datos1 = array();
    $fila = mysqli_fetch_assoc($res);
    // array_push($datos, $fila);
    $datos = $fila;
    $datos1[] = $fila;


    foreach ($datos1 as $key => $fila1) {
        $telid = $fila1['Id_Telefono'];
        $ciuId = $fila1['Id_Ciudad'];
    }

    $sql = "SELECT * from telefono where Id_Telefono='$telid'";
    $res = mysqli_query($conexion, $sql);
    $datosT = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datosT[] = $fila;
    }

    foreach ($datosT as $key => $fila1) {
        $tel = $fila1['Telefono'];
    }

    $sql = "SELECT * from ciudades where Id_Ciudad='$ciuId'";
    $res = mysqli_query($conexion, $sql);
    $datosT = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datosT[] = $fila;
    }

    foreach ($datosT as $key => $fila1) {
        $ciu = $fila1['Ciudad'];
    }

    //id cliente
    $idClien = $_POST['numFact'];
    $sql = "SELECT * from clientes as a 
    INNER join persona as b on a.Id_Persona = b.Id_Persona 
    inner join  factura on factura.Id_Cliente = a.Id_Cliente
    where factura.Num_Factura='$_POST[numFact]'";
    $res = mysqli_query($conexion, $sql);
    $datosT = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datosT[] = $fila;
    }

    foreach ($datosT as $key => $fila1) {
        $NomCli = $fila1['Nombre'] . " " . $fila1['Nombre'];
        $dirCli = $fila1['Direccion'];
        $telCli = $fila1['Telefono_persona'];
    }

    //get datos de la factura
    $sql = "SELECT * FROM factura
    where Num_Factura = $_POST[numFact]";
    $res = mysqli_query($conexion, $sql);
    $datos_factura = mysqli_fetch_assoc($res);

    $sql = "SELECT * from fact_prod
    inner join modelos on modelos.Id_Modelo = fact_prod.Id_Modelo and fact_prod.Id_Factura='$_POST[numFact]' ";
    $res = mysqli_query($conexion, $sql);
    $datos_productos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datos_productos[] = $fila;
    }
?>
    <style>
        .factura-container{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .factura {
            
            width: 600px;
            border: 1px solid black;
            border-radius: 20px;
            padding: 30px;
        }
        .row{
            border: 1px solid grey;

        }

    </style>
    <div class="factura-container">
        <div class="factura">
            <div class="row">
                <div class="col-sm-6">
                    <label for=""> Razon Social: </label>
                    <label for=""> <?= $datos['Razon_Social'] ?> </label>
                    <br>
                    <label for=""> Nombre Comercial: </label>
                    <label for=""> <?= $datos['Nom_Comercial'] ?> </label>
                    <br>
                    <label for="" class="o"> Dirección: </label>
                    <label for="" class="o"> <?= $datos['Dir_Matriz'] ?> </label>
                    <br>
                    <label for="" class="o"> Teléfono: </label>
                    <label for="" class="o"> <?= $tel ?> </label>
                    <br>
                    <label for="" class="o"> <?= $ciu ?> - </label>
                    <label for="" class="o">Ecuador</label>
                </div>
                <div class="col-sm-6">
                    <label for=""> RUC: </label>
                    <label for=""> <?= $datos['Ruc'] ?> </label>
                    <br>
                    <label for=""> Factura: 00<?= $datos['Num_Facturero'] ?> - 00<?= $datos['Num_Establecimiento'] ?> <?= $datos_factura['Num_Factura'] ?></label>
                    <br>
                    <label for=""> AUT. SRI: </label>
                    <label for="" class="o"> <?= $datos['Autorizacion'] ?> </label>
                    <br>
                    <label for="" class="o"> F. Aut. SRI: </label>
                    <label for="" class="o"><?= $datos['Fecha_Autorizacion'] ?></label>
                    <br>
                    <br>
                    <label for=""> Fecha: </label>
                    <label for=""> <?= $datos_factura['Fecha'] ?> </label>
                    <br>
                    <label for=""> RUC/CI: </label>
                    <label for=""> 3216549870 </label>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for=""> Cliente: </label>
                    <label for=""> <?= $NomCli ?> </label>
                    <br>
                    <label for=""> Dirección: </label>
                    <label for=""> <?= $dirCli ?> </label>
                    <br>
                    <label for=""> Teléfono: </label>
                    <label for=""> <?= $telCli ?> </label>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-sm table-striped table-hover table-responsive-sm table-sm  table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <tH scope="col"> CANT. </tH>
                                <tH scope="col"> DESCRIPCIÓN </tH>
                                <tH scope="col"> V. UNIT. </tH>
                                <tH scope="col"> V. TOTAL </tH>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos_productos as $key => $item) { ?>
                                <tr>
                                    <td scope="row"><?= $item['Cantidad'] ?></td>
                                    <td><?= $item['Des_Modelo'] ?></td>
                                    <td><?= $item['Precio'] ?></td>
                                    <td><?= $item['Precio'] * $item['Cantidad'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <br>
                            <br>
                            <label for=""> --------------------- </label>
                            <br>
                            <label for=""> FIRMA AUTORIZADA </label>
                        </div>

                        <div class="col-sm-6">
                            <br>
                            <br>
                            <label for=""> ----------------------- </label>
                            <br>
                            <label for=""> RECIBÍ CONFORME </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="" class="o"> SUBTOTAL: </label>
                    <label for="" class="o"> <?= $datos_factura['SubTotal'] ?> </label>
                    <br>
                    <label for="" class="o"> IVA 12%: <?= $datos_factura['iva'] ?> </label>
                    <br>
                    <label for="" class="o"> TOTAL USD: <?= $datos_factura['Total'] ?> </label>
                </div>
            </div>
        </div>
    </div>

<?php
} else
    header('Location: /')
?>