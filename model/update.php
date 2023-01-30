<?php
if($_GET){
    require_once("../config/conexion.php");

    switch ($_GET["opcion"]) {
        case 'login':
            echo "Login";
            print_r($_POST);
            break;
    }
}