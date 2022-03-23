<?php  

   /*
   Crea conexion con la base de datos
   Parametros: 
   Ninguno
   Salida
   Retorna el resultado de la conexion 
   */

   function crearConexionBaseDatos()
   {
   	    //Configuraciones para la conexion a la base de datos
   	    $servername = "localhost";
        $database = "elementalv2";
        $username = "root";
        $password = "";
        // Crea la conexion
        $conexion = mysqli_connect($servername, $username, $password, $database);

        return $conexion;
   }


      /*Genera la lista de parametros para los procedimientos 
    Parametros
    arrayParametros -> Array de valores, que representan los valores que necesita un procedimiento para realizar la consulta. Este array debe tener en orden los parametros solicitados por el procedimiento. 
    Salida
    Retorna un tipo string tiene la forma P1,P2,P3,...,Pn donde Pk es un valor
    */

    function generarListaParametros($arrayParametros)
    {
    	$cantidadParametros = count( $arrayParametros ); //Determina la cantidad de parametros

    	$listaParametros = "";

    	for( $indice=0; $indice < $cantidadParametros-1; $indice++ )//Hasta el penultimo parametro
    	{
    		if( gettype($arrayParametros[$indice]) == "string" ) //Si el tipo de parametro es string
    		{
    			//Concatenarle una coma y colocarlo entre comillas
    			$listaParametros = $listaParametros."'".$arrayParametros[$indice]."',";
    		}
    		else
    		{
    			//Concatenarle una coma
    			$listaParametros = $listaParametros.$arrayParametros[$indice].",";
    		}
    	}

    	//Para el ultimo elemento no se concatena una coma 

    	$ultimoIndice =  $cantidadParametros-1; //Indice del ultimo parametro

    	if( gettype($arrayParametros[$ultimoIndice]) == "string" ) //Si el tipo de parametro es string
    	{
    		//Se agrega el valor del parametro y colocarlo entre comillas
    		$listaParametros = $listaParametros."'".$arrayParametros[$ultimoIndice]."'";
    	}
    	else
    	{
    		//Se agrega el valor del parametro
    		$listaParametros = $listaParametros.$arrayParametros[$ultimoIndice];
    	}

    	return $listaParametros;

    }


    function array_buscar($array,$elemento)
    {
        for($index = 0; $index < count( $array ); $index++ )
        {
            if( $array[$index] == $elemento )
            {
                return 1;
            }
        }

        return 0;
    }




?>