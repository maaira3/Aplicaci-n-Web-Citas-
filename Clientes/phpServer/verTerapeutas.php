<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    $query = "SELECT * FROM terapeuta WHERE 1";

    $resultado = $conexion->query($query);

    $cantidadTerapeutas = $resultado->num_rows; 

    $terapeutas = array();//Almacena la informacion de cada terapeuta

    for( $index = 0; $index < $cantidadTerapeutas; $index++ ) //Para cada fila 
    {
    	//Obtiene la informacion de los terapeutas y lo agrega a la lista de terapeutas 
    	$filaTerapeuta = $resultado->fetch_row(); 
    	$terapeuta = array( 

    		"idTerapeuta" => $filaTerapeuta[0],
    		"nombre" => $filaTerapeuta[1],
    		"telefono" => $filaTerapeuta[2],
    		"edad" => $filaTerapeuta[3],
    		"email" => $filaTerapeuta[4],
    		"password" => $filaTerapeuta[5],
    		"rutaImagen" => $filaTerapeuta[6],
    		"descripcion" => $filaTerapeuta[7]

    	); 
    	array_push( $terapeutas , $terapeuta ); //Agrega la informacion de un terapeuta 
    }

    echo json_encode($terapeutas);
?>