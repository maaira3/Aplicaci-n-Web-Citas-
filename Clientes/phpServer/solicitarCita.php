<?php

    include "funcionesGenerales.php";

    session_start();

    $conexion = crearConexionBaseDatos();

    $citaSeleccionada = new DateTime( $_POST["hora"]." ".$_POST["dia"] );

    //echo $citaSeleccionada->format( "y-n-j H:i:s" );


    $arrayParametros = array( 
	    0=> $_SESSION["idCliente"], 
	    1=> $citaSeleccionada->format("Y-n-j H:i:s"), 
    ); 



    $listaParametros = generarListaParametros($arrayParametros); //Lista de parametros para el procedimiento

    //echo $listaParametros;

    $query = "CALL Solicitar_Cita(".$listaParametros.")";

    $resultado = $conexion->query($query);

    //Actualiza el pago de servicio y la hora de sesion locales 

    $_SESSION["pagoServicio"] = 0;

    $_SESSION['horarioSesion'] = $citaSeleccionada->format("Y-n-j H:i:s");



?>