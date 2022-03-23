
<?php 
    include "funcionesGenerales.php";
    session_start();

    $conexion = crearConexionBaseDatos();

    if( !$conexion )//Si existe un error en la conexion a la base de datos
    {
    	echo -2; //Retorna un -2 para indicar el error 
    }
    else
    {
        $email1  = mysqli_real_escape_string($conexion,$_POST["email1"]);
        $password1 = mysqli_real_escape_string($conexion,$_POST["password1"]);

        if (empty($email1) || empty($password1))
        {
           echo -1;
        }
        else
        {
            //Consulta a la BD
            $query1 = "SELECT * FROM terapeuta WHERE email= '$email1' AND  password= '$password1'";
            $resultado1 = mysqli_query($conexion, $query1);
            
            if (!$resultado1 || mysqli_num_rows($resultado1) > 0)
            {
                $fila = $resultado1->fetch_array(MYSQLI_ASSOC);
                //  Asignamos A Sessión el valor de la columna nombre
                $_SESSION['idTerapeuta1'] = $fila['idTerapeuta'];
                $_SESSION['nombre']= $fila['nombre'];
                $_SESSION['telefono'] = $fila['telefono'];
                $_SESSION['edad'] = $fila['edad'];
                $_SESSION['email'] = $fila['email'];
                $_SESSION['password'] = $fila['password'];
                $_SESSION['descripcion'] = $fila['descripcion'];
                $_SESSION['rutaImagen'] = $fila['rutaImagen'];
            }
            else
            {
                //  La búsqueda no arrojó resultado, por lo tanto el email o contraseña son incorrectos
                echo -3;
            }
        }

    }
   

?>