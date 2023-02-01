<?php
if (!(isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal'))
    header('Location: /');

require_once("../config/conexion.php");
//get talla
$sql = "SELECT * from persona as a join personal as b on a.Id_Persona=b.Id_Persona where a.tipo_persona='personal' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}

?>

<div class="row text-center">
    <div class="col">
        <h1>Empleados</h1>
    </div>
</div>

<div class="row text-center">
    <div class="col-md-12">
        <a href="/empleados_reporte" class="btn btn-primary form-control w-50">Generar Reporte</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-striped table-hover table-responsive-sm table-sm align-middle ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre y Apellido</th>
                    <th scope="col">Teléfono</th>  
                    <th scope="col">Cédula</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Correo</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $key => $fila) { ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $fila['Nombre'] ?> <?= $fila['Apellido'] ?></td>
                        <td><?= $fila['Telefono_persona'] ?> </td>
                        <td><?= $fila['Cedula'] ?></td>
                        <td><?= $fila['Direccion'] ?></td>
                        <td><?= $fila['Correo'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>