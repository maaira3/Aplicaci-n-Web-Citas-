<?php  

session_start();

if(isset($_SESSION["idTerapeuta1"]))
{
    echo "logeado ".$_SESSION["idTerapeuta1"];
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

<!--script type="text/javascript" src="../Ver_Terapeutas/verTerapeutas.js"></script>-->

</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="../Principal">elemental.mente</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="../Principal">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Principal/verTerapeutas.php">Terapeutas</a></li>

                    <?php
                    if(isset($_SESSION["idTerapeuta1"]))
                    {
                         echo '
                        <li class="nav-item"><a class="nav-link" href="verCitas.php">Consultas</a></li>
                        <li class="nav-item"><a class="nav-link" href="verHorarios.php">Horarios</a></li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">¡Hola '.$_SESSION["nombre"].'!</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="Ver_perfil.php">Ver perfil</a>
                        <a class="dropdown-item" href="logout.php">Salir</a>
                        </div></li>';
                    }
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
           <h3>Información de perfil</h3>

           <div class="text-center">
           <img src="'.$_SESSION["rutaImagen"].'" width="98" height="100" class="rounded">
           </div>
           <br>
           <div >
           Nombre: <label value="" >  '.$_SESSION["nombre"].'</label>
           </div>
           <div >
           Telefono: <label >  '.$_SESSION["telefono"].'</label>
           </div>
           <div >
           Edad: <label >  '.$_SESSION["edad"].'</label>
           </div>
           <div >
           Email: <label >  '.$_SESSION["email"].'</label>
           </div>
            <div >
            Descripción: <label >  '.$_SESSION["descripcion"].'</label>
            </div>
            <div >
            Citas del día: <label > </label>
            </div>
            <br>
            <div >
            <a class="btn btn-primary" href="modificar_perfil.php" role="button">Modificar información</a>
            </div >
            <br>
            <h4>Historial de consultas</h4>
            <br>
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                <td></td>
                <td></td>
                </tr>
                <tr>
                <td></td>
                <td></td>
                </tr>
                </tbody>
            </table>
            </div>
            </div>
            </div>';
        
        ?>
    </div>

</header>




<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
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