<?php

include_once '../phpServer/conexion.php';
session_start();
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id = $_SESSION['idTerapeuta1'];

$consulta = "SELECT nombre, email, date_format(horarioSesion, '%d/%m/%y 00:00') as horarioSesion, link FROM cliente WHERE idTerapeuta='$id' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;

?>