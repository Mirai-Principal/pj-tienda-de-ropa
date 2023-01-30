<form action="/cliente/insert" method="post" class="text-center" id="signup_cliente_form">
    <input type="text" id="nombre" name="nombre" placeholder="NOMBRE" required pattern="[A-Za-z]{4-50}">
    <input type="text" id="apellido" name="apellido" placeholder="APELLIDO" required pattern="[A-Za-z]{4-50}"> <br> <br>
    <input type="text" id="telefono" name="telefono" placeholder="TELÉFONO" required pattern="[0-9]{10}">
    <input type="text" id="correo" name="correo" placeholder="CORREO" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> <br> <br>
    <input type="text" id="ciudad" name="ciudad" placeholder="CIUDAD" required pattern="[A-Za-z]{4-50}">
    <input type="text" id="direccion" name="direccion" placeholder="DIRECCIÓN" required pattern="[A-Za-z0-9]+"> <br> <br>
    <input type="text" id="codigo" name="codigo" placeholder="CÓDIGO POSTAL" pattern="[0-9]+" maxlength="6">
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

    <input type="text" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" required pattern="[A-Za-z0-9]+"> <br> <br>
    <input type="submit" value="Registrar" class="btn btn-info w-50 form-control" id="registro">
    <a class="btn btn-danger w-50 form-control" id="salir" href="/">Salir</a>

    <input type="hidden" value="signup_cliente_form" name="opcion">

</form>

<script>
    tipo.onchange = () => {
        let tipo_cliente = tipo.value
        if (tipo_cliente == 'Empresa')
            cedula_contenedor.innerHTML = '<input type="text" id="ruc" name="ruc" placeholder="RUC" required pattern="[0-9]{13}" >'
        else
            cedula_contenedor.innerHTML = '<input type="text" id="cedula" name="cedula" placeholder="CÉDULA" required pattern="[0-9]{10}" >'
    }

    signup_cliente_form.onsubmit = (e)=>{
        e.preventDefault()
        $.ajax({
        type: 'post',
        url: signup_cliente_form.action,
        data: $(signup_cliente_form).serialize(),
        success: function(res){
            console.log(res);
        }
    })
    }
</script>