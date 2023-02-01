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
            $carpeta = '../public/files/categorias/';
            $ruta = $carpeta . basename($_FILES['fileImg1']['name']);
            if (move_uploaded_file($_FILES['fileImg1']['tmp_name'], $ruta)) {
                echo 'Subido con exito!';
                $sql = "INSERT INTO cat_producto(Des_Categoria, Eliminado, img_categoria) 
                VALUES('$_POST[nombreCat1]','no' ,'" . $_FILES['fileImg1']['name'] . "')";
                mysqli_query($conexion, $sql);
                header('Location: /categorias');
            }

            break;
        case 'cuenta_ban_insert_form':
            print_r($_POST);
            $sql = "INSERT INTO cuenta_bancaria values('$_POST[_numcuenta]','$_POST[_banco]','$_POST[_tipocuenta]','no')";
            $res = mysqli_query($conexion, $sql);
            header('Location: /cuenta_bancaria');
            break;
        case 'color_insert_form':
            $color = $_POST['color'];
            $sql = "INSERT INTO color_modelo values('','$color','no')";
            mysqli_query($conexion, $sql);
            header('Location: /color_tela');
            break;
        case 'talla_insert_form':
            $talla = $_POST['talla'];
            $sql = "INSERT INTO talla_modelo values('','$talla','no')";
            mysqli_query($conexion, $sql);
            header('Location: /talla');
            break;

        case 'producto_insert_form':
            print_r($_FILES);
            $carpetaP = '../public/files/productos/';
            $rutaP = $carpetaP . basename($_FILES['imagen']['name']);
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaP)) {
                echo 'Subido con exito!';
                $sql1 = "INSERT INTO producto VALUES('','$_POST[Des_Producto]','$_POST[categoria]','no' ,'" . $_FILES['imagen']['name'] . "')";
                mysqli_query($conexion, $sql1);
                header('Location: /productos');
            } else {
                echo 'no se subio';
            }
            break;
        case 'modelo_insert_form':
            $DesModelo = $_POST['desmod'];
            $Stock = $_POST['stomod'];
            $idP = $_POST['Id_Producto'];
            $idColor = $_POST['codmod'];
            $precio = $_POST['premod'];
            $CalTela = $_POST['telmod'];
            $idTalla = $_POST['talmod'];
            $GenModelo = $_POST['genmod'];
            $carpeta = '../public/files/modelos/';
            $ruta = $carpeta . basename($_FILES['img_producto']['name']);;
            if (move_uploaded_file($_FILES['img_producto']['tmp_name'], $ruta)) {
                echo 'Subido con exito!';
                $sql = "INSERT INTO modelos values('','$DesModelo','" . $_FILES['img_producto']['name'] . "','$Stock','$precio','$idP','$CalTela','$idTalla','$GenModelo','$idColor','no')";
                mysqli_query($conexion, $sql);
                header('Location: /modelos');
            }
            break;
        case 'add_carrito':
            if (isset($_SESSION['tipo_persona']) && $_SESSION['tipo_persona'] == 'clientes') {
                $_SESSION['carrito'][] = array(
                    "Des_Modelo" => $_POST['data_description'],
                    "Id_Modelo" => $_POST['modelo'],
                    "precio" => $_POST['data_precio']
                );
            } else {
                echo 'login';
            }
            break;
        case 'carrito_insert_form':
            // print_r($_POST);
            print_r($_SESSION['carrito']);
            $Id_Persona = $_SESSION['Id_Persona'];

            //traer datos de la peronsa
            $sql = "SELECT Id_Cliente, tipo_cliente FROM persona
            inner join clientes on clientes.Id_Persona = persona.Id_Persona
            where persona.Id_Persona = $Id_Persona";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            $Id_Cliente = $fila['Id_Cliente'];

            $id = '';
            if ($fila['tipo_cliente'] == 'Persona natural') {
                $sql = "SELECT * from persona_natural where persona_natural.Id_Cliente = '$fila[Id_Cliente]'";
                $res = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($res);
                $id = $fila['Cedula'];
            } else {
                $sql = "SELECT * from empresa where empresa.Id_Cliente = '$fila[Id_Cliente]'";
                $res = mysqli_query($conexion, $sql);
                $fila = mysqli_fetch_assoc($res);
                $id = $fila['ruc'];
                $id = substr($id, 0, 10);
            }

            $sql = "SELECT * FROM valor_iva";
            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_assoc($res);
            $iva = $fila['iva'] / 100;

            //sumar el precio total
            $carrito = $_SESSION['carrito'];
            $subtotal = 0;
            foreach ($carrito as $key => $item) {
                $subtotal += $item['precio'];
            }
            $iva *= $subtotal;
            $total = $subtotal + $iva;

            $sql = "SELECT Ruc FROM negocio";
            $res = mysqli_query($conexion, $sql);
            $negocio = mysqli_fetch_assoc($res);

            $sql = "SELECT Cedula FROM personal";
            $res = mysqli_query($conexion, $sql);
            $personal = mysqli_fetch_assoc($res);

            $sql = "INSERT INTO factura values('', '$negocio[Ruc]', 'no', NOW(), '', '0', '$iva', '$subtotal', '$total', '$_POST[bancos]', 'Pendiente', '$_POST[Pago_Bancario]', '$personal[Cedula]', '$Id_Cliente')";
            mysqli_query($conexion, $sql);
            $last_id = $conexion->insert_id;
            echo $last_id;

            $_SESSION['Num_Factura'] = $last_id;

            foreach ($carrito as $key => $item) {
                $sql = "INSERT INTO fact_prod values('$item[Id_Modelo]', '$last_id', '1')";
                mysqli_query($conexion, $sql);
            }

            header('Location: /enviar_notificacion');
            break;
    }
}
