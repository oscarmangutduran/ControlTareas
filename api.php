<?php
header("Content-Type: application/json");
$servidor="localhost";
$usuario="root";
$password="";
$basededatos="app";

$conexion=new mysqli($servidor,$usuario,$password,$basededatos);

if($conexion->connect_error){
    print_r($conexion->connect_error);
}

$accion=$_POST["accion"];

//Create
if($accion=="agregar"){
    $tarea=$_POST["tarea"];
    $sql="INSERT INTO tareas (id,tarea,completado) 
    VALUES(NULL, '$tarea', '0');";
    $conexion->query($sql);
    echo json_encode(array('success'=>true,'datos'=> "Se agregó la tarea."));
}
//Delete
if($accion=="borrar"){
    $id=$_POST["id"];
    $sql="DELETE FROM tareas WHERE id= $id";
    $conexion->query($sql);
    echo json_encode(array('success'=>true,'datos'=> "Se eliminó la tarea."));
}
//Update
if($accion=="completar"){
    $id=$_POST["id"];

    $sql="UPDATE tareas SET completado=1 WHERE id= $id";
    $conexion->query($sql);
    echo json_encode(array('success'=>true,'datos'=> "Se completó la tarea."));
}
//Read

if($accion=="leer"){
    $sql="SELECT * FROM tareas";
    $resultado=$conexion->query($sql);
        if($resultado->num_rows>0){
            $tareas=array();
            while($fila=$resultado->fetch_assoc()){
                $tareas[]=$fila;
            }
    echo json_encode(array('success'=>true,'datos'=> $tareas));

}
}


?>