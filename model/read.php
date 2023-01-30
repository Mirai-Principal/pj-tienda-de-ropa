<?php
if ($_POST) {
    require_once("../config/conexion.php");

    switch ($_POST["opcion"]) {
        case 'login':
            $sql = "SELECT * from persona where User_Name = '$_POST[username]'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);

            if (password_verify($_POST['password'], $fila['Password'])) {
                $_SESSION["Id_Persona"] = $fila['Id_Persona'];
                $_SESSION["nombre"] = $fila['Nombre'];
                $_SESSION["tipo_persona"] = $fila['tipo_persona'];
                $_SESSION["username"] = $fila['User_Name'];
                if ($fila['tipo_persona'] == 'clientes')
                    header('Location: /');
                else
                    header('location: /dashboard');
            }
            break;
    }
}
