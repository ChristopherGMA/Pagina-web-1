<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Consultar Noticias Compaginadas</title>
	<link rel="stylesheet" href="estilo.css">
	<?php 
		//incluir bibliotecas de funciones
		include("lib/fecha.php");
		include("menu.php");
	 ?>
</head>
<body>
	<h1>Consulta de Noticias</h1>
	<?php 
		//Conectar con el servidor de base de datos
		$conexion = mysqli_connect("localhost", "root","") or die("no se puede conectar con el servidor");

		//seleccionar base de datos
		mysqli_select_db($conexion, "lindavista") or die("no se puede seleccionar la base de datos");

		//establecer el numero de filas por pagina y la fila inicial
		$num = 3; //numero de filas por pagina

		$comienzo = $_REQUEST['comienzo'];
		// $comienzo = 0;
		if (!isset($comienzo)) $comienzo = 0;

		//calcular el numero total de filas de la tabla
		$instruccion = "select * from noticias";
		$consulta = mysqli_query($conexion, $instruccion) or die ("fallo en la consulta");
		$nfilas = mysqli_num_rows($consulta);

		if ($nfilas >0) {
			
			//mostrar numeros inicial y final de las filas a mostrar
			print("<p>Mostrando noticias" . ($comienzo + 1) . " de ");
			if(($comienzo + $num) < $nfilas)
				print($comienzo + $num);
			else
				print($nfilas);
			print(" de un total de $nfilas.\n");

			//Mostrar botones anterior y siguiente
			$estapagina = $_SERVER['PHP_SELF'];
			if ($nfilas > $num) {
				if ($comienzo > 0)
					print("[<a href = '$estapagina?comienzo= " . ($comienzo - $num) . "'>Anterior</a> | ");
									else
										print("[Anterior | ");
									if ($nfilas > ($comienzo + $num))
										print("<a href = '$estapagina?comienzo=" . ($comienzo + $num) . "'>Siguiente</a>]\n");
									else
										print("siguiente ]\n");
								}
								print("</p>\n");
			}
			//enviar consulta
			$instruccion = "select * from noticias orden by fecha desc limit $comienzo, $num";
			$consulta = mysqli_query($conexion, $instruccion) or die("fallo en la consulta");
			//Mostrar resultados de la consulta
			$nfilas = mysqli_num_rows($consulta);
			
			if($nfilas > 0){
				print("<div id='wrapper'>");
				print("<TABLE id='keywords'>\n");
				print("<TR>\n");
				print("<TH>titulo</TH>\n");
				print("<TH>texto</TH>\n");
				print("<TH>categoria</TH>\n");
				print("<TH>fecha</TH>\n");
				print("<TH>imagen</TH>\n");
				print("</TR>\n");
				

				for($i = 0; $i<$nfilas; $i++) {
					$resultado = mysqli_fetch_array($consulta);
					print("<TR>\n");
					print("<TD class='laling'>" . $resultado['titulo']. "</TD>\n");
					print("<TD>" . $resultado['texto']. "</TD>\n");
					print("<TD>" . $resultado['categoria']. "</TD>\n");
					print("<TD>" . date2string($resultado['fecha']) . "</TD>\n");

					if ($resultado['imagen'] !="")
						print("<TD><A TARGET='_blank' HREF=img/" . $resultado['imagen']."><IMG BORDER ='0' SRC=img/ico-fichero.gif ALT= Imagen asociada></A></TD>\n");
					else
						print("<TD>&nbsp;</TD>\n");
					print("</TR>\n");
				}
				print("</TABLE>\n");
				print("</div>");
			}
			else
				print("no hay noticias disponibles");


			//cerrar conexion
			mysqli_close($conexion);
			print("<br>");
			print("[<a href = 'ejercicio1:php'>Consultar las Noticias</a>]");
	 	?>

	 	<script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>