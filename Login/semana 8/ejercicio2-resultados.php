<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Encuesta. Resultados de la votacion</title>
	<link rel="stylesheet" type="text\css" href="estilo.css">
</head>
<body>
	<h1>Encuesta. Resultados de la votaci&oacuten</h1>
	<?php 
		//conectar con la base de datos
		$connection = mysqli_connect("localhost", "root", "") or die ("No se puede conectar al servidor");
		mysqli_select_db ($connection, "lindavista") or die ("no se puede seleccionar BD");

		//obtener datos actuales de la votacion
		$instruccion = "select * from votos";
		$consulta = mysqli_query ($connection, $instruccion) or die ("fallo en la seleccion");
		$resultado = mysqli_fetch_array ($consulta);

		$votos1 = $resultado["votos1"];
		$votos2 = $resultado["votos2"];
		$totalVotos = $votos1 + $votos2;

		//mostrar resultados
		print("<div id='wrapper'>");
		print ("<TABLE id='keywords'>\n");

		print ("<TR>\n");
		print ("<TH>Respuesta</TH>\n");
		print ("<TH>Votos</TH>\n");
		print ("<TH>Porcentaje</TH>\n");
		print ("<TH>Representaci&oacuten gr&aacutefica</TH>\n");
		print("</TR>\n");

		$porcentaje = round(($votos1/$totalVotos)*100,2);
		print ("<TR>\n");
		print ("<TD class= 'laling'>S&iacute</TD>\n");
		print ("<TD class= 'derecha'>$votos1</TD>\n");
		print ("<TD class= 'derecha'>$porcentaje%</TD>\n");
		print ("<TD class= 'izquierda'><img SRC='img/puntoamarillo.gif' height='10' width='" . $porcentaje*4 ."'></TD>\n");
		print ("</TR>\n");

		$porcentaje = round(($votos2/$totalVotos)*100,2);
		print("<TR>\n");
		print ("<TD class= 'izquierda'>No</TD>\n");
		print ("<TD class= 'derecha'>$votos2</TD>\n");
		print ("<TD class= 'derecha'>$porcentaje%</TD>\n");
		print ("<TD class= 'izquierda'><img SRC='img/puntoamarillo.gif' height= '10' width='" . $porcentaje*4 ."'></TD>\n");
		print("</TR>\n");

		print("</TABLE>\n");
		print("</div>");
		print("<p>N&uacutemero total de votos emitidos: $totalVotos </p>\n");
		print("<p><a href='encuesta.php'>P&aacutegina de votaci&oacuten</a></p>\n");

		//desconectar
		mysqli_close($connection);
	 ?>
	 <h1><a href="menu.php">INICIO</a></h1>


	 <script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>