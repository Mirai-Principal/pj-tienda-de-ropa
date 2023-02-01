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
            $nameCat = $_POST['nombreCatMod'];
            $nameFile = $_FILES['fileImgMod']['name'];
            $carpeta = '../public/files/categorias/';
            $ruta = $carpeta . basename($_FILES['fileImgMod']['name']);
            if (move_uploaded_file($_FILES['fileImgMod']['tmp_name'], $ruta)) {
                echo 'Subido con exito!';
                $sql = "UPDATE cat_producto 
                set img_categoria = '$nameFile', Des_Categoria = '$nameCat'
                Where Id_Categoria = '$_POST[Id_Categoria]'";
                mysqli_query($conexion, $sql);
                header('Location: /categorias');
            }
            break;
        case 'cuenta_ban_update_form':
            $banco = $_POST['banco'];
            $numcuenta = $_POST['numcuenta'];
            $TipoCue = $_POST['tipocuenta'];
            $sql = "UPDATE cuenta_bancaria set Banco='$banco',tipo_cuenta='$TipoCue' where Num_Cuenta='$numcuenta'";
            mysqli_query($conexion, $sql);
            header('Location: /cuenta_bancaria');

            break;
        case 'color_update_form':
            $id_color = $_POST['Id_Color'];
            $color = $_POST['color_update'];
            $sql = "UPDATE color_modelo set Color='$color' where Id_Color='$id_color'";
            mysqli_query($conexion, $sql);
            header('Location: /color_tela');

            break;
        case 'talla_update_form':
            print_r($_POST);
            $talla = $_POST['_talla'];
            $sql = "UPDATE talla_modelo SET  Talla='$talla'  where Id_Talla='$_POST[Id_Talla]'";
            mysqli_query($conexion, $sql);
            header('Location: /talla');

            break;
        case 'producto_update_form':
            $carpeta = '../public/files/productos/';
            $ruta = $carpeta . basename($_FILES['imagen_update']['name']);
            if (move_uploaded_file($_FILES['imagen_update']['tmp_name'], $ruta)) {
                echo 'Subido con exito!';
                $sql = "UPDATE producto set Id_Categoria='$_POST[_categoria]',img_Producto='" . $_FILES['imagen_update']['name'] . "' where Id_Producto='$_POST[Id_Producto]'";
                mysqli_query($conexion, $sql);
                header('Location: /productos');
            }
            break;

        case 'modelo_update_form':
            $DesModelo = $_POST['desmod'];
            $Stock = $_POST['stomod'];
            $id_prod = $_POST['_Id_Producto'];
            $idColor = $_POST['codmod'];
            $precio = $_POST['premod'];
            $CalTela = $_POST['telmod'];
            $idTalla = $_POST['talmod'];
            $GenModelo = $_POST['genmod'];
            $carpeta = '../public/files/modelos/';
            $ruta = $carpeta . basename($_FILES['_img_producto']['name']);;
            if (move_uploaded_file($_FILES['_img_producto']['tmp_name'], $ruta)) {
                echo 'Subido con exito!';
                $sql = "UPDATE modelos 
                SET Des_Modelo='$DesModelo', Stock='$Stock', Id_Color='$idColor',
                Precio='$precio', Id_Producto='$id_prod', calidad_tela='$CalTela',
                Id_Talla='$idTalla', tipo='$GenModelo', Img_Modelo='".$_FILES['_img_producto']['name']
                ."' where Id_Modelo='$_POST[Id_Modelo]'";
                mysqli_query($conexion, $sql);
                header('Location: /modelos');
            }

            break;
    }
}
