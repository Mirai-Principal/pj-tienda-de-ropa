<?php
if($_GET){
    require_once("../config/conexion.php");

    switch ($_GET["opcion"]) {
        case 'delete_categoria':
            $sql = "UPDATE cat_producto set Eliminado = 'si'";
            mysqli_query($conexion, $sql);
            header('Location: /categorias');
            break;
    }
}