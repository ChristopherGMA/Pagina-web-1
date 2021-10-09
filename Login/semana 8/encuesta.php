<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilo.css">
	<title>Encuesta Sobre Precio de las Viviendas</title>
</head>
<body>
	<h1>Encuesta</h1>
	<p>¿Cree ud. que el precio de las vivienda seguira subiendo al ritmo actual?</p>
	<form action="ejercicio2.php" method="POST">
		<input type="RADIO" name = "voto" value="si" checked>Si<br>
		<input type="RADIO" name = "voto" value="no">no<br><br>
		<input type="SUBMIT" name = "enviar" value="Votar">
	</form>
		<a href="ejercicio2-resultados.php">Ver resultados</a>


		<script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>