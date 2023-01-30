<?php
if ($_POST) {
    require_once("../config/conexion.php");

    switch ($_POST["opcion"]) {
        case 'login':
            echo "Login";
            print_r($_POST);
            break;
        case 'signup_cliente_form':
            $sql = "INSERT INTO persona
            values('','$_POST[nombre]', '$_POST[apellido]', '$_POST[telefono]', '$_POST[direccion]', '$_POST[correo]',  '$_POST[usuario]', '$_POST[contrasena]', 'no', '$_POST[ciudad]', 'clientes')";
            mysqli_query($conexion, $sql);
            $last_id = $conexion->insert_id;
            echo $last_id;


            $sql = "INSERT INTO clientes values('', '$last_id', '$_POST[codigo]', '$_POST[conocer]', '$_POST[tipo]')";
            mysqli_query($conexion, $sql);
            $last_id = $conexion->insert_id;

            if ($_POST['tipo'] == 'Persona natural'){
                $sql = "insert into persona_natural values('$_POST[cedula]', '$last_id')";
            }
            else
                $sql = "insert into empresa values('$last_id', '$_POST[ruc]')";
            mysqli_query($conexion, $sql);
            break;
    }
}
