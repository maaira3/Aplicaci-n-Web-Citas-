<?php 
    include "funcionesGenerales.php";
    session_start();

    $conexion = crearConexionBaseDatos();

    if( !$conexion )//Si existe un error en la conexion a la base de datos
    {
    	return -2; //Retorna un -2 para indicar el error 
    }
    $passwordActual  = $_POST["passwordActual"];
    $passwordNueva  = $_POST["passwordNueva"];
    $passwordConfirmacion  = $_POST["passwordConfirmacion"];

    $id = $_SESSION['idTerapeuta1'];
     if (empty($passwordActual) || empty($passwordNueva) || empty($passwordConfirmacion))
        {
           echo -1;
        }
        else
        {
            if($passwordActual == $_SESSION['password'])
            {
                if($passwordNueva == $passwordConfirmacion)
                {
                    //Consulta a la BD
                    $query1 = "UPDATE terapeuta SET password='$passwordNueva' WHERE idTerapeuta='$id'";
                    $resultado1 = mysqli_query($conexion, $query1);
                    if (!$resultado1 ||mysqli_affected_rows($conexion) > 0)
                    {
                        $_SESSION['password'] = $passwordNueva;
                        echo 1;  
                    }
                    else
                        echo 0;
                }
                else
                    echo -4;
            }
            else
                echo -3;
        }
?>