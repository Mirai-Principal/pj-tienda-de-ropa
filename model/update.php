<?php
if ($_POST) {
    require_once("../config/conexion.php");

    switch ($_POST["opcion"]) {
        case 'update_key_app_form':
            $_POST['clave'] = password_hash($_POST['clave'], PASSWORD_DEFAULT);
            $sql = "UPDATE clave_app set password_app = '$_POST[clave]'";
            mysqli_query($conexion, $sql);
            break;
        case 'iva_update_form':
            $sql = "UPDATE valor_iva set iva = $_POST[iva]";
            mysqli_query($conexion, $sql);
            break;
        case 'categorias_update_form':
            print_r($_POST);
            print_r($_FILES);
            break;
    }
}
