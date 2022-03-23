<?php

  session_start();

?>

<html>
<head>
	<title>WEB</title>

    <meta charset="utf-8" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<!-- SCRIPT PARA EL JQUERY-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- SCRIPTS PARA FUNCIONES DE JS---->
	<script type="text/javascript" src="login.js"></script>

	<style>
		.logo{
			margin-left: 10%;
		}

		.opciones{
			margin-right: 20%;
		}

		.login{
			margin-left:40%;
			margin-top:10%;

		}

		.recuerdame{
			padding-left: 4%;
		}

		.signin{
			padding-left: 14%;
		}
	</style>
</head>
<body>

	<div>
		<nav class=" navbar-dark bg-dark navbar navbar-expand-lg navbar-light bg-light">
			<div class="logo">
				<a class="navbar-brand" href="#">Navbar</a>
			</div>

			<div class="collapse navbar-collapse opciones" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="../Principal/index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../Principal/verTerapeutas.php">Terapeutas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul>
			</div>
		</nav>

	</div>

	<?php

	if( isset($_SESSION["idCliente"]) )
	{
		 header('Location: ../Principal/index.php');
	}
	else
	{
		echo "No Esta logeado";
    }


	?>




	<div class="login" >

		<form class="px-4 py-3" method="POST" >
			<div class="form-group col-md-4">
				<label for="exampleDropdownFormEmail1">Email address</label>
				<input type="email" name="email1" id="email1" class="form-control"  placeholder="email@example.com" autocomplete>
			</div>
			<div class="form-group col-md-4"> 
				<label for="exampleDropdownFormPassword1">Password</label>
				<input type="password" name="password1" id="password1" class="form-control" placeholder="Password">
			</div>
			<div class="form-check col-md-4 recuerdame">
				<input type="checkbox" class="form-check-input" id="dropdownCheck">
				<label class="form-check-label" for="dropdownCheck">Remember me </label>
			</div>
			<br>
			<div class="signin">
				<button  class="btn btn-primary" onclick="validarUsuario()">Sign in</button>
			</div>
		</form>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="Registrarse.php">New around here? Sign up</a>
		<a class="dropdown-item" href="#">Forgot password?</a>

	</div>	



	

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>