<?php
if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal') {
    require_once("../config/conexion.php");
    //get ciudades
    $sql = "SELECT * from factura where Eliminado = 'no'";
    $res = mysqli_query($conexion, $sql);
    $datos = array();
    while ($fila = mysqli_fetch_assoc($res)) {
        // array_push($datos, $fila);
        $datos[] = $fila;
    }

    /*$sql = "SELECT * from negocio where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $negocio[] = $fila;
}*/
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

        input#fileImg1,
        input#fileImgMod {
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
        <h1> Ventas </h1>
    </div>
    <!-- <div class="row text-center">
        <div class="col">
            <button class="btn btn-primary w-50" data-bs-toggle="modal" data-bs-target="#nueva_categoria_modal">Generar Reporte</button>
        </div>
    </div> -->

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Número de factura</th>
                        <th scope="col">Valor $ </th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Detalles</th>
                        <!-- <th scope="col">Adjuntar Comprobante</th>
                        <th scope="col">Estado</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $key => $fila) { ?>
                        <tr>
                            <form action="/detalles_factura" method="post">
                                <th scope="row"><?= $key + 1 ?></th>
                                <td> <input type="hidden"  name="numFact" id="numFact" value="<?= $fila['Num_Factura'] ?>"> <?= $fila['Num_Factura'] ?></td>
                                <td><?= $fila['Total'] ?></td>
                                <td><?= $fila['Fecha'] ?></td>
                                <td><a href="/detalles_factura"><button class="btn btn-primary form-control">ver</button></a></td>
                                <!-- <td><button class="btn btn-danger form-control">Adjuntar</button></td>
                                <td width="0%">
                                    <center> <select name="" id="" placeholder="Estado">
                                            <option value="">Estado 1</option>
                                            <option value="">Estado 2</option>
                                        </select> </center>
                                </td> -->
                            </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


<?php
} else
    header('Location: /');
?>