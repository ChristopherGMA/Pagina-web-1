<?php 
require 'DataBase.php';

	$message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (email, contraseña) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    /*$con = password_hash($_POST['password'], PASSWORD_BCRYPT);*/
    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
      $message = 'Se ha registrado';
    } else {
      $message = 'Lamentablemente ha ocurrido un error...😢';
    }
  }
 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREE UNA CUENTA</title>

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

 	<form action="SingUp.php" method="POST" role="form">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h1>Ingrese sus datos</H1>
			</div>
			
		<div class="form-group" align="text-center">
			<input type="text" name="email" class="form-control" required="required" placeholder="Ingrese su email">
			<hr>
			<input type="password" name="password" class="form-control" required="required" title="" placeholder="Ingrese su contraseña">
			<hr>
		</div>
		<br>
		<button type="submit" class="btn btn-primary" value="Send">Crear</button>
	</form>


	<!-- JS -->
	<script type="text/javascript" src="Assets/js/jquery.min.js"></script><!-- jQuery -->
	<script type="text/javascript" src="Assets/js/bootstrap.min.js"></script><!-- Bootstrap -->
	<script type="text/javascript" src="Assets/js/countdown.js"></script><!-- Countdown -->
	<script type="text/javascript" src="Assets/js/jquery.ajaxchimp.js"></script><!-- ajaxchimp -->
	<script type="text/javascript" src="Assets/js/scripts.js"></script><!-- Scripts -->
 </body>
 </html>