<?php
require_once("../config/conexion.php");
//get ciudades
$sql = "SELECT * from ciudades";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $datos[] = $fila;
} 

?>

<h1>Registrar Empleado</h1>
<form action="/empleado/insert" method="post" class="text-center" id="signup_personal_form">
    <input type="text" id="nombre" name="nombre" placeholder="NOMBRE" required pattern="[A-Za-z\s]{4-50}">
    <input type="text" id="apellido" name="apellido" placeholder="APELLIDO" required pattern="[A-Za-z\s]{4-50}"> <br> <br>
    <input type="text" id="telefono" name="telefono" placeholder="TELÉFONO" required pattern="[0-9]{10}">
    <input type="text" id="correo" name="correo" placeholder="CORREO" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> <br> <br>
    <select name="ciudad" id="ciudad" required>
        <option value="" selected disabled>Selecionar ciudad</option>
        <?php foreach ($datos as $fila) { ?>
            <option value="<?= $fila['Id_Ciudad'] ?>"><?= $fila['Ciudad'] ?></option>
        <?php } ?>
    </select>
    <input type="text" id="direccion" name="direccion" placeholder="DIRECCIÓN" required pattern="[A-Za-z0-9\s]+"> <br> <br>
    <input type="text" id="cedula" name="cedula" placeholder="CÉDULA" required pattern="[0-9]{10}"> <br> <br>
    <input type="text" id="usuario" name="usuario" placeholder="USUARIO" required pattern="[A-Za-z]{4-15}">
    <input type="password" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" required pattern="{8,12}"> <br> <br>
    <input type="password" id="clave" name="clave" placeholder="CLAVE APLICACIÓN" required pattern="{8,12}"> <br> <br>
    <button class="btn btn-primary form-control w-50" id="registro">Registrar</button>
    <button class="btn btn-danger form-control w-50" id="salir">Salir</button>

    <input type="hidden" value="signup_personal_form" name="opcion">
</form>

<script>
    signup_personal_form.onsubmit = (e) => {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: signup_personal_form.action,
            data: $(signup_personal_form).serialize(),
            success: function(res) {
                console.log(res);
                Toast.fire({
                    icon: 'success',
                    title: 'Registro completado'
                })
                
                signup_personal_form.reset()
            }
        })
    }
</script>