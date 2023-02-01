<?php
if (!(isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'personal'))
    header('Location: /');

require_once("../config/conexion.php");
//get talla
$sql = "SELECT * from persona as a join clientes as b on a.Id_Persona =b.Id_Persona join empresa as c on c.Id_Cliente=b.Id_Cliente where a.tipo_persona='clientes' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}

$sql = "SELECT * from persona as a join clientes as b on a.Id_Persona =b.Id_Persona join persona_natural as c on c.Id_Cliente=b.Id_Cliente where a.tipo_persona='clientes' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}
?>

<div class="row text-center">
    <div class="col">
        <h1>Clientes</h1>
    </div>
</div>

<div class="row text-center">
    <div class="col-md-12">
        <a href="/clientes_reporte" class="btn btn-primary form-control w-50">Generar Reporte</a>
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
                    <th scope="col">Tipo</th>
                    <th scope="col">Cédula/Ruc</th>
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
                        <td><?= $fila['tipo_cliente'] ?></td>
                        <td><?php if($fila['tipo_cliente'] == 'Empresa'){echo $fila['ruc'];}else{echo $fila['Cedula'];}?></td>
                        <td><?= $fila['Direccion'] ?></td>
                        <td><?= $fila['Correo'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>