<?php  

    session_start();

    if(isset($_SESSION["idCliente"]))
    {
        echo "logeado ".$_SESSION["idCliente"];
    }
    else
    {
        echo "no logeado";
    }

    //session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

        <!--ESTO ES NUESTRO-->
 
        <!--AQUI SE COLOCA LOS SCRIPS QUE TODOS LOS MODULOS USAN--->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="../validaciones.js"></script>
        <script type="text/javascript" src="../generadorEtiquetas.js"></script>

        <!--AQUI COLOCA LOS SCRIPTS PARA LOS MODULOS--->
        <script type="text/javascript" src="../Ver_perfil/ver_perfil.js"></script>
        <script type="text/javascript" src="../Sign_in/sigin.js"></script>
        <script type="text/javascript" src="../Ver_Terapeutas/verTerapeutas.js"></script>
        <script type="text/javascript" src="../VerPerfil/ver_perfil.js"></script>


        <!--script type="text/javascript" src="../Ver_Terapeutas/verTerapeutas.js"></script>-->

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">elemental.mente</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                       <li class="nav-item"><a class="nav-link" href="../Principal">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Principal/verTerapeutas.php">Terapeutas</a></li>

                        <?php  
                         echo '
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">¡Hola '.$_SESSION["nombre"].'!</a>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="Ver_perfil.php">Ver perfil</a>
                                  <a class="dropdown-item" href="logout.php">Salir</a>
                                </div></li>';
                        ?>
    
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">

               <!--AQUI COLOCA TU CODIGO---->
               <?php
                echo'   <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                            <div class="col-lg-6">
                            <div class="p-3 mb-2 bg-light text-dark" align="center">
                                <br>
                                <h4>Cambiar contraseña</h4>
                                <br>
                                <div class="form-group col-md-6" >
                                    <label for="passwordActual">Contraseña actual</label>
                                    <input type="password" class="form-control" id="passwordActual">
                                </div>
                                <div class="form-group col-md-6"  >
                                    <label for="passwordNueva">Nueva contraseña</label>
                                    <input type="password" class="form-control" id="passwordNueva">
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="passwordConfirmacion">Confirmación contraseña</label>
                                    <input type="password" class="form-control" id="passwordConfirmacion">
                                </div>
                                <br>
                                <div class="form-group col-md-6" >
                                    <button type="submit" class="btn btn-primary" onclick="actualizarContraseña()">Cambiar contraseña</button>
                                </div >
                                <br>
                                <br>
                                

                            </div>
                            </div>
                        </div>';
               ?>
            </div>

        </header>


            
            
        <!-- Footer-->
        <footer class="bg-light py-5">
            
        </footer>
        <!-- Bootstrap core JS
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>-->
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script> 
    </body>
</html>