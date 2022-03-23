<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    if( !$conexion )//Si existe un error en la conexion a la base de datos
    {
    	echo -2; //Retorna un -2 para indicar el error 
    }

    //Establece los parametros dentro de un array y sus tipos de dato 

    $arrayParametros = array( 
    	0=>$_POST["nombre"], 
    	1=>$_POST["telefono"], 
    	2=>intval($_POST["edad"]), 
    	3=>$_POST["email"], 
    	4=>$_POST["password"]  ); 

     /*   $arrayParametros = array( 
        0=>"adrian", 
        1=>"1234567890", 
        2=>14, 
        3=>"asdfg27@hotmail.com", 
        4=>"Adrian23");*/

 
    $listaParametros = generarListaParametros($arrayParametros); //Lista de parametros para el procedimiento

    $query = "CALL Agregar_Cliente(".$listaParametros.")"; //Llama al procedimiento para agregar al cliente 
    
    //echo $query;
    $resultado = $conexion->query($query); //Envia la peticion para agregar al cliente 

    if( !$resultado ) //Si existe un error al solicitar insertar al usuario
    {
    	echo -2;//Retorna un -2 para indicar el error
    }

    $filaResultado = $resultado->fetch_row(); //Obtiene la fila que retorna el procedimiento 

    if($filaResultado[0]!=-1)
    {
        //session_start();

        //$_SESSION["idCliente"] = $filaResultado[0];

        //$_SESSION["nombre"] = $_POST["nombre"];

    }
    echo $filaResultado[0];//Retorna el id del cliente 
    

?>
