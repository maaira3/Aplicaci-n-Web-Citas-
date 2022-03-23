<?php

include_once '../phpServer/conexion.php';
session_start();
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT a.nombre, a.email, a.telefono, a.edad, b.nombre AS nombret, date_format(a.horarioSesion, '%d/%m/%y 00:00') as horarioSesion, a.link FROM cliente a LEFT JOIN terapeuta b on a.idTerapeuta = b.idTerapeuta";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;

?>