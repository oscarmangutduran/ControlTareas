<?php
$servidor = "localhost";
$usuario = "root"; // Corregido de $usuarios a $usuario
$password = "";
$bbdd = "app";

$conexion = new mysqli($servidor, $usuario, $password, $bbdd);

if (!$conexion->connect_error) {
    echo "Conexión establecida<br>";
} else{
    print_r($conexion->connect_error);
}

if($_POST) {
    echo "Se agrego la tarea: ".$POST["tarea"];
}


?>
