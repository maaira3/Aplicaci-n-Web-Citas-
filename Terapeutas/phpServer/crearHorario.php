<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    session_start();

    $nuevoHorario = $_POST["dia"]. " " . $_POST["nuevaHora"];

    $arrayParametros = array( 
	    0=> $_SESSION["idTerapeuta1"],  
        1=> $nuevoHorario
    ); 


    $listaParametros = generarListaParametros($arrayParametros); //Lista de parametros para el procedimiento

    $query = "CALL Crear_Horario(".$listaParametros.")";

    $result  = $conexion->query($query); 
  

?>