<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Procesamiento de Votacion</title>
</head>
<body>
	<?php 
		$enviar = $_REQUEST['enviar'];
		if (isset($enviar)) {
			print ("<h1>Encuesta. Voto registrado</h1>\n");

			//conectar con la base de datos
			$connection = mysqli_connect("localhost", "root","") or die ("No se puede conectar al servidor");
			mysqli_select_db ($connection, "lindavista") or die ("No se puede seleccionar BD");

			//Obtener votos actuales
			$instruccion = "select votos1, votos2 from votos";
			$consulta = mysqli_query ($connection, $instruccion) or die ("fallo en la seleccion");
			$resultado = mysqli_fetch_array ($consulta);

			//actualizar votos
			$votos1 = $resultado["votos1"];
			$votos2 = $resultado["votos2"];
			$voto = $_REQUEST['voto'];
			if ($voto == "si")
				$votos1 = $votos1 + 1;
			else if ($voto == "no")
				$votos2 = $votos2 + 1;
			$instruccion ="update votos set votos1=$votos1, votos2=$votos2";
			$actualizacion = mysqli_query ($connection, $instruccion) or die ("fallo en la modificacion");

			//desconectar
			mysqli_close ($connection);

			//mostrar mensaje de agradecimiento
			print("<p>Su voto ha sido registrado. Gracias por participar</p>\n");
			print("<a href = 'ejercicio2-resultados.php'>Ver resultados</a>\n");
		}
	 ?>

	 <script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>