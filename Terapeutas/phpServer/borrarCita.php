<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    session_start();

    $horario = $_POST["dia"]. " " . $_POST["horario"];

    $arrayParametros = array( 
	    0=> $_SESSION["idTerapeuta1"],  
        1=> $horario
    ); 


    $listaParametros = generarListaParametros($arrayParametros); //Lista de parametros para el procedimiento

    $query = "CALL Borrar_Horario(".$listaParametros.")";

    $result  = $conexion->query($query); 
  

?>