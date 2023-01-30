<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isa Scrubs | Uniformes médicos</title>

    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/estilos.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="./public/files/logo.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Isa Scrubs
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php if (!isset($_SESSION["tipo_persona"])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/usuario">Registrar</a>
                            </li>
                            <?php } else {
                            if ($_SESSION["tipo_persona"] == 'clientes') {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Mi perfil
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/dashboard">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/clientes">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/empleados">Empleados</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Productos
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/categorias">Categorías</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/ventas">Ventas</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Configuración
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/iva">Modificar IVA</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="container" id="contenido">

        <?php if (!isset($_SESSION["tipo_persona"])) { ?>
            <!-- VENTANA MODAL INGRESAR -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-0">
                            <form action="/login/read" method="post">
                                <input type="text" name="username" placeholder="Nombre de Usuario" class="form-control">
                                <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                <button type="submit" class="btn btn-primary form-control">Ingresar</button>

                                <input type="hidden" value="login" name="opcion">
                            </form>
                        </div>
                        <div class="modal-footer pt-0">
                            <button type="button" class="btn btn-secondary form-control" data-bs-dismiss="modal">Salir</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>