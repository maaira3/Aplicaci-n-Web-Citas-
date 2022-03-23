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
    $descripcion = $_POST["descripcionPerfil"];
    //$imagen = $_FILES["imagenPerfil"];
    //echo $imagen;


    $id = $_SESSION['idTerapeuta1'];
         if (empty($nombre) || empty($telefono) || empty($edad) || empty($email) || empty($descripcion))
            {
               echo -1;
            }
        else
        {
           /* if ($imagen["type"] == "image/jpg" OR $imagen["type"] == "image/jpeg" OR $imagen["type"] == "image/png")
             {
                $ruta = "../imagenesServer/imagenes/".md5($imagen["tmp_name"]).".jpg";
                echo "hola";
             }*/
            //Consulta a la BD
            $query = "UPDATE terapeuta SET nombre='$nombre', telefono = '$telefono', edad = '$edad', email = '$email', descripcion = '$descripcion' WHERE idTerapeuta='$id'";
            $query1 = "SELECT * FROM terapeuta WHERE idTerapeuta='$id'";
            $resultado = mysqli_query($conexion, $query);
            if (!$resultado ||mysqli_affected_rows($conexion) > 0)
            {
                $resultado1 = mysqli_query($conexion, $query1);
                if(!$resultado1 || mysqli_num_rows($resultado1) > 0)
                {
                    //move_uploaded_file($imagen["tmp_name"], $ruta)
                    $fila = $resultado1->fetch_array(MYSQLI_ASSOC);
                    //  Asignamos A Sessión el valor de la columna nombre
                    $_SESSION['idTerapeuta1'] = $fila['idTerapeuta'];
                    $_SESSION['nombre']= $fila['nombre'];
                    $_SESSION['telefono'] = $fila['telefono'];
                    $_SESSION['edad'] = $fila['edad'];
                    $_SESSION['email'] = $fila['email'];
                    $_SESSION['password'] = $fila['password'];
                    $_SESSION['descripcion'] = $fila['descripcion'];
                    //$_SESSION['rutaImagen'] = $fila['rutaImagen'];
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