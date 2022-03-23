<?php  

    include "funcionesGenerales.php";

    $conexion = crearConexionBaseDatos();

    if( !$conexion )//Si existe un error en la conexion a la base de datos
    {
    	echo -2; //Retorna un -2 para indicar el error 
    }

    //Establece los parametros dentro de un array y sus tipos de dato 

	$nombre = $_POST["nombre"];
	$telefono =$_POST["telefono"];
	$edad = $_POST["edad"];
	$email = $_POST["email"];
	$password = $_POST["password"]; 

    $query1 = "SELECT * FROM terapeuta WHERE email='$email'";
    $resultado1 = $conexion->query($query1);
    if( !$resultado1 ) //Si existe un error al solicitar insertar al usuario
    {
        echo -2;//Retorna un -2 para indicar el error
    }
    else
    {
         if( mysqli_num_rows($resultado1) == 0)
         {
            $query = "INSERT INTO terapeuta(nombre,telefono,edad,email,password,rutaImagen,descripcion) VALUES ('$nombre','$telefono','$edad','$email','$password',NULL,'')"; // agregar al cliente 
    
            //echo $query;
            $resultado = $conexion->query($query); //Envia la peticion para agregar al cliente 

            if( !$resultado ) //Si existe un error al solicitar insertar al usuario
            {
                echo -2;//Retorna un -2 para indicar el error
            }
            echo 1;//Retorna el id del cliente 

         }
         else
            echo -1;

    }
    

?>
