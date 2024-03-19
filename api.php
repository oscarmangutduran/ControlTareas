<?php
$servidor = "localhost";
$usuario = "root"; // Corregido de $usuarios a $usuario
$password = "";
$bbdd = "app";

$conexion = new mysqli($servidor, $usuario, $password, $bbdd);

// Verificar errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión establecida<br>";
}

if ($_POST && isset($_POST["tarea"])) { // Verificar si se ha enviado algo mediante POST
    $tarea = $_POST["tarea"];
    echo "Se agregó la tarea: " . $tarea;
} else {
    print_r($conexion->connect_error);
}
?>
