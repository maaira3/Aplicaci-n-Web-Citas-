<?php 
    include "funcionesGenerales.php";
    session_start();

    $conexion = crearConexionBaseDatos();

    if( !$conexion )//Si existe un error en la conexion a la base de datos
    {
    	return -2; //Retorna un -2 para indicar el error 
    }
    $nombre  = $_POST["nombrePerfil"];
    $telefono  = $_POST["telefonoPerfil"];
    $edad  = $_POST["edadPerfil"];
    $email  = $_POST["emailPerfil"];

    $id = $_SESSION['idCliente'];
     if (empty($nombre) || empty($telefono) || empty($edad) || empty($email))
        {
           echo -1;
        }
        else
        {
            //Consulta a la BD
            $query = "UPDATE cliente SET nombre='$nombre', telefono = '$telefono', edad = '$edad', email = '$email' WHERE idCliente='$id'";
            $query1 = "SELECT * FROM cliente WHERE idCliente='$id'";
            $resultado = mysqli_query($conexion, $query);
            if (!$resultado ||mysqli_affected_rows($conexion) > 0)
            {
                $resultado1 = mysqli_query($conexion, $query1);
                if(!$resultado1 || mysqli_num_rows($resultado1) > 0)
                {
                    $fila = $resultado1->fetch_array(MYSQLI_ASSOC);
                    //  Asignamos A Sessión el valor de la columna nombre
                    $_SESSION['idCliente'] = $fila['idCliente'];
                    $_SESSION['idTerapeuta'] = $fila['idTerapeuta'];
                    $_SESSION['nombre']= $fila['nombre'];
                    $_SESSION['telefono'] = $fila['telefono'];
                    $_SESSION['idCliente'] = $fila['idCliente'];
                    $_SESSION['edad'] = $fila['edad'];
                    $_SESSION['email'] = $fila['email'];
                    $_SESSION['password'] = $fila['password'];
                    $_SESSION['horarioSesion'] = $fila['horarioSesion'];
                    echo 1;
                    //header('Location: http://appcitas/Ver_perfil/ver_perfil.html');
                }
                echo 0;
                
            }
            else
            {
                //  No se puedieron actualizar los datos
                echo -3;
            }
        }
?>