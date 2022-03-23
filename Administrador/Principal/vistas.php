<?php  
//ESTO ESTA EN PROCESO
function navar()
{
	return '     <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">elemental.mente</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Principal/verTerapeutas.php">Terapeutas</a></li>
                    <?php
                    if(!isset($_SESSION["idCliente"])  )
                    {
                        echo '<li class="nav-item"><a class="nav-link" href="../Principal/Registrarse.php">Registrarse</a></li>';
                    }

                    ?>

                    <?php  

                    if(!isset($_SESSION["idCliente"])&&!isset($_SESSION["idTerapeuta1"]))
                    {
                       echo
                       <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Sign in</a>
                       <div class="dropdown-menu">
                       <form class="px-4 py-3" method="POST">
                       <div class="form-group">
                       <label for="exampleDropdownFormEmail1">Email address</label>
                       <input type="email" name="email1" id="email1" class="form-control"  placeholder="email@example.com" autocomplete>
                       </div>
                       <div class="form-group">
                       <label for="exampleDropdownFormPassword1">Password</label>
                       <input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
                       </div>
                       <div class="form-check">
                       <input type="checkbox" class="form-check-input" id="dropdownCheck">
                       <label class="form-check-label" for="dropdownCheck">
                       Remember me
                       </label>
                       </div>
                       <button type="submit" class="btn btn-primary" onclick="validarUsuario()">Sign in</button>
                       </form>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#contact">New around here? Sign up</a>
                       <a class="dropdown-item" href="#">Forgot password?</a>
                       </div>
                       </li>';

                   }
                   if(isset($_SESSION["idCliente"]))
                   {
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
</nav>  ';
}


?>