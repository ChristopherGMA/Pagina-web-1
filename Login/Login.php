<?php 

		session_start();

		if (isset($_SESSION['user_id'])) {
		    header('Location: /Progra%20Aplicada%20III/Login');
		  }

		require 'DataBase.php';

		if (!empty($_POST['email']) && !empty($_POST['password2'])) {
			$records = $conn->prepare('SELECT id, email, contraseña FROM usuarios WHERE email=:email');
			$records->bindParam(':email', $_POST['email']);
			$records->execute();

			$RPT = $records->fetch(PDO::FETCH_ASSOC);


			$message = '';

			if (count($RPT) > 0) {
				echo($RPT['contraseña']);
				echo('<br>');
				echo($_POST['password2']);
				echo "<br>";
				echo $RPT['id'];
				echo "<br>";
				echo $RPT['email'];


				if ($_POST['password2']==$RPT['contraseña']) {

					$_SESSION['user_id'] = $RPT['id'];
					header('location: http://localhost//Progra%20Aplicada%20III/Login/semana%208/menu.php');
				}
				else{
					$message = 'Contraseña incorrecta';
				}

				
			}
			else{
				$message = 'No existe, revise sus datos...';
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
	<!-- COLORS -->
	<link rel="stylesheet" href="Assets/css/blue.css" title="blue">

</head>
<body>

	<?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

	<form action="Login.php" method="POST" role="form">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>Ingrese sus datos</H1>
			</div>
			
		<div class="form-group" align="text-center">
			<input type="text" name="email"  class="form-control" required="required" placeholder="Ingrese su email">
			<hr>
			<input type="password" name="password2" class="form-control" required="required" placeholder="Ingrese su contraseña">
		</div>
		<br>
	</form>
		<button type="submit" class="btn btn-primary" value="Send">Ingresar</button>


	<!-- JS -->
	<script type="text/javascript" src="Assets/js/jquery.min.js"></script><!-- jQuery -->
	<script type="text/javascript" src="Assets/js/bootstrap.min.js"></script><!-- Bootstrap -->
	<script type="text/javascript" src="Assets/js/countdown.js"></script><!-- Countdown -->
	<script type="text/javascript" src="Assets/js/jquery.ajaxchimp.js"></script><!-- ajaxchimp -->
	<script type="text/javascript" src="Assets/js/scripts.js"></script><!-- Scripts -->
</body>
</html>