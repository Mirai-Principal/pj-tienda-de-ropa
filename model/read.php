<?php
if ($_POST) {
    require_once("../config/conexion.php");

    switch ($_POST["opcion"]) {
        case 'login':
            $sql = "SELECT * from persona where User_Name = '$_POST[username]'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            if (isset($fila['Password']))
                if (password_verify($_POST['password'], $fila['Password'])) {
                    $_SESSION["Id_Persona"] = $fila['Id_Persona'];
                    $_SESSION["nombre"] = $fila['Nombre'];
                    $_SESSION["tipo_persona"] = $fila['tipo_persona'];
                    $_SESSION["username"] = $fila['User_Name'];
                    if ($fila['tipo_persona'] == 'clientes')
                        header('Location: /');
                    else
                        header('location: /dashboard');
                } else
                    echo '<h1>Credenciales incorrectas</h1>';
            else
                echo '<h1>Credenciales incorrectas</h1>';
            break;
        case 'cuenta_ban_read':
            print_r($_GET);
            break;
    }
} else if ($_GET["opcion"]) {
    require_once("../config/conexion.php");

    switch ($_GET["opcion"]) {
        case 'cuenta_ban_read':
            //get cuenta_bancaria
            $sql = "SELECT * from cuenta_bancaria where Num_Cuenta = '$_GET[_numcuenta]' and Eliminado = 'no'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            print_r(json_encode($fila));
            break;

        case 'color_read':
            $sql = "SELECT * from color_modelo where Id_Color = '$_GET[_Id_Color]' and Eliminado = 'no'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            print_r(json_encode($fila));
            break;
        case 'talla_read':
            $sql = "SELECT * from talla_modelo where Id_Talla = '$_GET[_Id_Talla]' and Eliminado = 'no'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            print_r(json_encode($fila));
            break;

        case 'producto_read':
            $sql = "SELECT * from producto where Id_Producto = '$_GET[_Id_Producto]' and Eliminado = 'no'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            print_r(json_encode($fila));
            break;

        case 'modelos_read':
            $sql = "SELECT * from modelos where Id_Modelo = '$_GET[_Id_Modelo]' and Eliminado = 'no'";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            print_r(json_encode($fila));
            break;
    }
}
