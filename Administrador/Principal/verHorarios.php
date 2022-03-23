<?php  

session_start();

if(isset($_SESSION["idCliente"]))
{
    //echo "logeado ".$_SESSION["idCliente"];
}
else
{
    //echo "no logeado";
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
  <script type="text/javascript" src="../Sign_in/sigin.js"></script>
  <script type="text/javascript" src="../Sign_up/signup.js"></script>
  <script type="text/javascript" src="../VerTerapeutas/verTerapeutas.js"></script>
  <script type="text/javascript" src="../verHorarios/verHorarios.js"></script>


  <!--script type="text/javascript" src="../Ver_Terapeutas/verTerapeutas.js"></script>-->

  <style>

    button.mostrarTerapeuta{
      background-color: black;
    }

    div.mostrarTerapeutas
    {
      margin-top: 5%;
      margin-left: 50%;
    }

  </style>

</head>
<body id="page-top">
  <!-- Navigation-->
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="../Principal">elemental.mente</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link" href="../Principal">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="../Principal/verTerapeutas.php">Terapeutas</a></li>


          <?php  
         if(isset($_SESSION["idCliente"]))
         {
          if( $_SESSION["pagoServicio"]  == 1 )
          {
            echo '<li class="nav-item"><a class="nav-link" href="../Principal/verHorarios.php">Ver Citas Disponibles</a></li>';
          }
          echo '
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">¡Hola '.$_SESSION["nombre"].'!</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="Ver_perfil.php">Ver perfil</a>
          <a class="dropdown-item" href="logout.php">Salir</a>
          </div></li>';
        }
        if(isset($_SESSION["idTerapeuta1"]))
        {
          echo '
          <li class="nav-item"><a class="nav-link" href="#services">Consultas</a></li>
          <li class="nav-item"><a class="nav-link" href="#portfolio">Horarios</a></li>
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

 <?php  
    if( isset( $_SESSION['nombreTerapeuta'] ) )//Si el nombre del terapeuta se existe
    {
        echo '<h3 class="text-white">Terapeuta:  '.$_SESSION['nombreTerapeuta'].' </h3>';
    }

 ?> 

 <table id="tablaCitas" class="table table-dark">

 </table>

 <div id="modalCitaExitosa" class="modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="redirigirVerPerfil()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" align="center">
        <h3> Cita agendada con exito </h3>
        <br>
        <h2> En su perfil puede ver el dia de su cita </h2>
        <br>
        <h2 class="text-success bi bi-check-lg"></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="redirigirVerPerfil()">Close</button>
      </div>
    </div>
  </div>
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
