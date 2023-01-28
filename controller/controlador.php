<?php
$mapRouter = array(
    "inicio" => "portada.php",
);

$route = "inicio";
if($_GET)
    $route = $_GET["route"];
else if ($_POST)
    $route = $_POST["route"];

require_once("./view/".$mapRouter[$route]);
