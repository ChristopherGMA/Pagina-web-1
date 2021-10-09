<?php 
	session_start();
	 require 'DataBase.php';

	 if (isset($_SESSION['user_id'])) {
	 	$records = $conn->prepare('SELECT id, email, contraseña from usuarios where id = :id');
	 	$records->bindParam(':id', $_SESSION['user_id']);
	 	$records->execute();
	 	$results = $records->fetch(PDO::FETCH_ASSOC);

	 	$user = null;

	 	if (count($results) > 0) {
	 		$user = $results;
	 	}
	 }

 ?>



<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INICIO DE SECIÓN</title>

	<!-- CSS -->
	<link rel="stylesheet" href="Assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="Assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="Assets/css/normalize.css" />
	<link rel="stylesheet" href="Assets/css/style.css" />

	<!-- COLORS -->
	<link rel="stylesheet" href="Assets/css/blue.css" title="blue"> <!-- DEFAULT COLOR/ CURRENTLY USING -->
    

</head>
<body>

	<?php require 'partials/header.php' ?>
	<?php if (!empty($user)): ?>
		<br>BIENVENIDO. <?= $user['email'] ?>
		<br>SE HA INICIADO SECIÓN
		<a href="LogOut.php">Cerrando seción</a>
		


		
	<?php else: ?>

	<section id="home-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text-center home-page">
					<div class="main-logo">
					</div>
					
				</div>
			</div>
		</div>
	</section><!-- /#home-page -->
	


	<section id="home-page">
		<div class="container-fluid home-bg">
			<div class="row">
				<div class="col-md-12 text-center home-page">
					<div class="main-logo">
						<a href=""></a>
					</div>
					<h1>Porfavor, inicie seción o cree una nueva cuenta...</h1>

					<a href="Login.php">Iniciar seción</a>
					<br>
					<a href="SingUp.php">Crear una nueva cuenta</a>
					
				</div>
			</div>
		</div>
	</section><!-- /#home-page -->
	<?php endif; ?>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>&copy; 2021 <strong></strong>. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer><!-- /.footer -->
	
	<!-- JS -->
	<script type="text/javascript" src="Assets/js/jquery.min.js"></script><!-- jQuery -->
	<script type="text/javascript" src="Assets/js/bootstrap.min.js"></script><!-- Bootstrap -->
	<script type="text/javascript" src="Assets/js/countdown.js"></script><!-- Countdown -->
	<script type="text/javascript" src="Assets/js/jquery.ajaxchimp.js"></script><!-- ajaxchimp -->
	<script type="text/javascript" src="Assets/js/scripts.js"></script><!-- Scripts -->
</body>
</html>


<?php 
		
	

 ?>