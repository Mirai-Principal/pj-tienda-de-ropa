<?php

$mapRouter = array(
    "/",
    "/usuario",
    "/cliente",
    "/empleado",
    "/clave_app",
    "/logout",
    "/dashboard",
    "/iva",
    "/categorias"
);

$route = $_SERVER['REQUEST_URI'];

//llama a las vistas
if (in_array($route, $mapRouter)) {
    require_once("../config/variables.php");

    require_once("../view/header.php");

    if ($route == '/') {
        require_once("../view/portada.php");
    } else {
        require_once("../view" . $route . ".php");
    }
    
    require_once("../view/footer.php");
} else {
    //llama a los model
    $routeUri = explode('/', $route);
    $routeModel = $routeUri[2];
    $params = explode('?', $routeModel);
    if(count($params) > 1)          //para peticiones get
        $routeModel = $params[0];

    if ( is_file("../model/". $routeModel .".php") ) {
        require_once("../model/" . $routeModel . ".php");
    }else{
        //404 si no existe esa ruta
        echo "404";
        echo $route;
        //http_response_code(404);
        //require 'views/404.php';

    }
}
