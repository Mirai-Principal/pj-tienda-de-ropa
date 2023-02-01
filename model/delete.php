<?php
if ($_GET) {
    require_once("../config/conexion.php");

    switch ($_GET["opcion"]) {
        case 'delete_categoria':
            $sql = "UPDATE cat_producto set Eliminado = 'si' where Id_Categoria = '$_GET[Id_Categoria]'";
            mysqli_query($conexion, $sql);
            header('Location: /categorias');
            break;

        case 'delete_cuenta':
            $sql = "UPDATE cuenta_bancaria set Eliminado = 'si' where Num_Cuenta = '$_GET[Num_Cuenta]'";
            mysqli_query($conexion, $sql);
            header('Location: /cuenta_bancaria');
            break;
        case 'delete_color':
            $sql = "UPDATE color_modelo set Eliminado = 'si' where Id_Color = '$_GET[Id_Color]'";
            mysqli_query($conexion, $sql);
            header('Location: /color_tela');
            break;
        case 'delete_talla':
            $sql = "UPDATE talla_modelo set Eliminado = 'si' where Id_Talla = '$_GET[Id_Talla]'";
            mysqli_query($conexion, $sql);
            header('Location: /talla');
            break;
        case 'delete_producto':
            $sql = "UPDATE producto set Eliminado = 'si' where Id_Producto = '$_GET[Id_Producto]'";
            mysqli_query($conexion, $sql);
            header('Location: /productos');
            break;

        case 'delete_modelos':
            $sql = "UPDATE modelos set Eliminado = 'si' where Id_Modelo = '$_GET[Id_Modelo]'";
            mysqli_query($conexion, $sql);
            header('Location: /modelos');
            break;
    }
}
