<?php
if ($_POST) {
    require_once("../config/conexion.php");

    switch ($_POST["opcion"]) {
        case 'signup_cliente_form':
            $_POST['contrasena'] = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO persona
            values('','$_POST[nombre]', '$_POST[apellido]', '$_POST[telefono]', '$_POST[direccion]', '$_POST[correo]',  '$_POST[usuario]', '$_POST[contrasena]', 'no', '$_POST[ciudad]', 'clientes')";
            mysqli_query($conexion, $sql);
            $last_id = $conexion->insert_id;
            $_SESSION["Id_Persona"] = $last_id;
            $_SESSION["nombre"] = $_POST['nombre'];
            $_SESSION["tipo_persona"] = 'clientes';
            $_SESSION["username"] = $_POST['usuario'];

            $sql = "INSERT INTO clientes values('', '$last_id', '$_POST[codigo]', '$_POST[conocer]', '$_POST[tipo]')";
            mysqli_query($conexion, $sql);
            $last_id = $conexion->insert_id;

            if ($_POST['tipo'] == 'Persona natural') {
                $sql = "insert into persona_natural values('$_POST[cedula]', '$last_id')";
            } else {
                $sql = "insert into empresa values('$last_id', '$_POST[ruc]')";
            }
            mysqli_query($conexion, $sql);
            break;

        case 'signup_personal_form':
            //get clave de la aplicacion
            $sql = "SELECT*from clave_app";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);

            $_POST['contrasena'] = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

            if (password_verify($_POST['clave'], $fila['password_app'])) {

                $sql = "INSERT INTO persona
                values('','$_POST[nombre]', '$_POST[apellido]', '$_POST[telefono]', '$_POST[direccion]', '$_POST[correo]',  '$_POST[usuario]', '$_POST[contrasena]', 'no', '$_POST[ciudad]', 'personal')";
                mysqli_query($conexion, $sql);
                $last_id = $conexion->insert_id;
                $_SESSION["Id_Persona"] = $last_id;
                $_SESSION["nombre"] = $_POST['nombre'];
                $_SESSION["tipo_persona"] = 'personal';
                $_SESSION["username"] = $_POST['usuario'];


                $sql = "INSERT INTO personal values('$_POST[cedula]', '$last_id')";
                mysqli_query($conexion, $sql);
            } else
                echo "fail";

            break;
            case 'categorias_insert_form':
                print_r($_POST);
                print_r($_FILES);
                break;
    }
}
