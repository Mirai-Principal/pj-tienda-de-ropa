<?php
require_once("../config/conexion.php");
$sql = "SELECT * from ciudades";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    // array_push($datos, $fila);
    $datos[] = $fila;
} ?>

<h1>Registrar Cliente</h1>
<form action="/cliente/insert" method="post" class="text-center" id="signup_cliente_form">
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
    <input type="text" id="codigo" name="codigo" placeholder="CÓDIGO POSTAL" pattern="[0-9]{6}">
    <select name="conocer" id="conocer" required>
        <option value="" selected disabled>¿COMÓ NOS CONOCISTE?</option>
        <option value="Facebook">Facebook</option>
        <option value="Instagram">Instagram</option>
        <option value="Otros">Otros</option>
    </select>
    <br> <br>
    <select name="tipo" id="tipo" required>
        <option value="" selected disabled>Tipo de cliente</option>
        <option value="Empresa">Empresa</option>
        <option value="Persona natural">Persona natural</option>
    </select> <br> <br>
    <div id="cedula_contenedor"></div> <br>

    <input type="text" id="usuario" name="usuario" placeholder="USUARIO" required pattern="[A-Za-z0-9]+">

    <input type="password" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres"> <br> <br>
    <input type="submit" value="Registrar" class="btn btn-primary w-50 form-control" id="registro">
    <a class="btn btn-danger w-50 form-control" id="salir" href="/">Salir</a>

    <input type="hidden" value="signup_cliente_form" name="opcion">

</form>

<script>
    tipo.onchange = () => {
        let tipo_cliente = tipo.value
        if (tipo_cliente == 'Empresa')
            cedula_contenedor.innerHTML = '<input type="text" id="ruc" name="ruc" placeholder="RUC" required pattern="[0-9]{13}" maxlength="13">'
        else
            cedula_contenedor.innerHTML = '<input type="text" id="cedula" name="cedula" placeholder="CÉDULA" required pattern="[0-9]{10}" maxlength="10">'
    }

    signup_cliente_form.onsubmit = (e) => {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: signup_cliente_form.action,
            data: $(signup_cliente_form).serialize(),
            success: function(res) {
                console.log(res);
                Toast.fire({
                    icon: 'success',
                    title: 'Registro completado'
                })
                
                signup_cliente_form.reset()
            }
        })
    }
</script>