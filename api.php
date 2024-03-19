<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$bbdd = "app";

$conexion = new mysqli($servidor, $usuario, $password, $bbdd);

if (!$conexion->connect_error) {
    echo "Conexión establecida<br>";
} else {
    print_r($conexion->connect_error);
}

if ($_POST) {
    $tarea = $_POST["tarea"];

    // Consulta SQL con consulta preparada
    $sql = "INSERT INTO `tareas` (`id`, `tarea`, `completada`) VALUES (NULL, ?, '0')";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("s", $tarea);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Se agregó la tarea: " . $tarea;
    } else {
        echo "Error al agregar la tarea: " . $conexion->error;
    }

    // Cerrar la consulta preparada
    $stmt->close();
}

// Cerrar la conexión
$conexion->close();
?>
