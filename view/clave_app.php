<div class="row">
    <div class="col">
        <h1>Modificar Clave de la aplicación</h1>
        <form action="/clave_app/update" method="post" id="update_key_app_form">
            <input type="password" name="clave" placeholder="Ingrese una nueva clave" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" required>
            <input type="submit" class="btn btn-primary" value="Guardar">

            <input type="hidden" value="update_key_app_form" name="opcion">
        </form>
    </div>
</div>

<script>
    update_key_app_form.onsubmit = (e) => {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: update_key_app_form.action,
            data: $(update_key_app_form).serialize(),
            success: function(res) {
                // console.log(res);
                update_key_app_form.reset()

                Toast.fire({
                    icon: 'success',
                    title: 'Actualización completada'
                })
            }
        })
    }
</script>