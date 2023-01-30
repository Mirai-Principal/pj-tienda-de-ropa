<?php
require_once("../config/conexion.php");
$sql = "SELECT * from valor_iva";
$res = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($res);
?>

<div class="row text-center">
    <div class="col">
        <form action="/iva/update" method="post" id="iva_update_form">
            <h1>Modificar IVA</h1>
            <input class="IVA" name="iva" type="number" min="0" max="100" pattern="^[0-9]{1,3}" placeholder="IVA" value="<?= $fila['iva'] ?>">
            <br>
            <br>
            <input type="submit" class="btn btn-primary form-control w-50" value="GUARDAR">

            <input type="hidden" value="iva_update_form" name="opcion">
        </form>
    </div>
</div>

<script>
    iva_update_form.onsubmit = (e) => {
        e.preventDefault()
        $.ajax({
            type: "post",
            url: iva_update_form.action,
            data: $(iva_update_form).serialize(),
            success: function(res) {
                console.log(res);
                Toast.fire({
                    icon: 'success',
                    title: 'Actualización completada'
                })
            }
        });
    }
</script>