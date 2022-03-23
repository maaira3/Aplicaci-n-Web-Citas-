<?php

include_once '../phpServer/conexion.php';
session_start();
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if($_POST['action'] == 'edit')
{
 $data = array(
  ':nombret'  => $_POST['nombret'],
 );

 $query = "
 UPDATE clientes 
 SET first_name = :first_name, 
 last_name = :last_name, 
 gender = :gender 
 WHERE id = :id
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tbl_sample 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>