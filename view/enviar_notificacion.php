<?php
if (!isset($_SESSION['Num_Factura']))
    header('Location: /');

require_once("../config/conexion.php");
//traer bancos
$sql = "SELECT * from cuenta_bancaria where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$bancos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $bancos[] = $fila;
}
?>

<p class="NotificacionTexto">
    Tu compra se ha generadop con exito <br>
    Ahora solo debes realizar el mpago <br>
    Si es efectivo, acercate a pagar en nuestro local <br>
    Direccion: xxxxxxxxxx <br>
    Si el pago es por transferencia o deposito aqui dejo donde pagar <br>
    <?php foreach ($bancos as $key => $fila) { ?>
<p><?= $fila['Banco'] ?> - <?= $fila['Num_Cuenta'] ?> - <?= $fila['tipo_cuenta'] ?></p>
<?php }
    unset($_SESSION['carrito']);
?>

</p>
<p class="enviarNot">
    Enviar notificacion de mi compra
    <center>
        <a class="Btn_AbrirWhat" href="https://api.whatsapp.com/send?phone=996398810&text=He%20realizado%20mi%20compra,%20mi%20id%20de%20compra%20es%20<?= $_SESSION['Num_Factura'] ?>">Abir Whatsapp</a>
    </center>
</p>

<?php
unset($_SESSION['Num_Factura']);
?>

<style type="text/css">
    .NotificacionTexto {
        text-align: center;
        font-size: 30pt;
        line-height: 140%;
    }

    .enviarNot {
        text-align: center;
        font-weight: bold;
        font-size: 32pt;
        color: #cc2e27;
    }

    .IngresoComprobante {
        font-size: 12pt;
        text-align: center;
        padding: 1rem 3rem;
        border: 1px solid;
        border-radius: 6px;
        display: inline-block;
        font-weight: 300;
    }

    .Btn_AbrirWhat {
        border-radius: 10px;
        font-size: 20pt;
        color: rgb(255, 255, 255);
        background-color: #049c0c;
        height: 50px;
        width: 250px;
    }

    .Btn_AbrirWhat:hover {
        cursor: pointer;
        color: rgb(0, 0, 0);
    }
</style>