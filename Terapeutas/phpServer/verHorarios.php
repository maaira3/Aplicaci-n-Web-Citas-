<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    session_start();

    $arrayParametros = array( 
	    0=> $_SESSION["idTerapeuta1"],  
    ); 


    $listaParametros = generarListaParametros($arrayParametros); //Lista de parametros para el procedimiento

    $query = "CALL Ver_Citas_Terapeuta(".$listaParametros.")";

    $citasHorariosDisponibles = $conexion->query($query); 

    $diasDisponibles = array();

    $horasDisponibles = array();

    $tablaCitasDisponibles = array();

    foreach ($citasHorariosDisponibles as $citaHorarioDisponible) 
    {
    	$diaDisponibleObject = new DateTime( $citaHorarioDisponible["horarioDisponible"] );

    	$stringDiaDisponible = $diaDisponibleObject->format("Y-n-j");

    	if( !array_buscar( $diasDisponibles, $stringDiaDisponible  ) )
    	{


    		array_push( $diasDisponibles, $stringDiaDisponible );

    		array_push( $horasDisponibles, [] );
    	}

    }

    foreach ($citasHorariosDisponibles as $citaHorarioDisponible) 
    {
    	$diaDisponibleObject = new DateTime( $citaHorarioDisponible["horarioDisponible"] );

    	$stringDiaDisponible = $diaDisponibleObject->format("Y-n-j");

    	$stringHoraDisponible = $diaDisponibleObject->format("H:i:s");

    	$indexDia = array_search( $stringDiaDisponible, $diasDisponibles  ); 

        array_push( $horasDisponibles[$indexDia], $stringHoraDisponible );
    }

    $tablaCitasDisponibles["dias"] = $diasDisponibles; //La primera fila son los dias 

    $indexHoraDisponible = 0;

    $existieronHorarios = 1;

    $cantidadDias = count( $diasDisponibles ); 

    while( $existieronHorarios )
    {
    	$filaHorasDisponibles = array();

    	$existieronHorarios = 0; //Suponemos que son los ultimos horarios 

        foreach( $horasDisponibles as $horasDisponible  ) //Para cada hora disponible
        {
        	if( !empty( $horasDisponible[$indexHoraDisponible] ) ) //Si existe el horario
        	{
        		array_push($filaHorasDisponibles,$horasDisponible[$indexHoraDisponible]);//Lo agrega a la fila 

        		$existieronHorarios = 1 ; //Establece que exisitieron horarios 
        	}
        	else
        	{
        	    array_push($filaHorasDisponibles,"");//Indica un espacio vacio	
        	}
        }

        array_push($tablaCitasDisponibles,$filaHorasDisponibles);//Agrega la fila a la tabla 

        $indexHoraDisponible++; //Pasa a los siguientes horarios 
    }
 

    echo json_encode($tablaCitasDisponibles);   
   
?>