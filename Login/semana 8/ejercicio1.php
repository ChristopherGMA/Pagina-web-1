<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>noticias de propiedades en ventas</title>
	<link rel="stylesheet" href="estilo.css">
	<?php 
		//incluir biblioteca de funciones
		include("lib/fecha.php");
	 ?>
</head>
<body>
	<center>
		<h1>venta de apartamentos luxurios</h1>
		<img src="img/ciudad.jpg" alt="apartamento en ventas">
	</center>
	<h1>ultimas noticias sobre apartamentos</h1>
		<?php 
			//primer paso: conectar con el servido de base de datos
			$conexion = mysqli_connect('localhost','root','')
			or die ("no se puede conectar con el servidor");

			//segundo paso: seleccionar base de datos
			mysqli_select_db($conexion, 'lindavista') or die ("no se puede conectar a la base de datos");

			//tercer paso: enviar la consulta
			$instruccion = "select * from noticias order by fecha desc";
			$consulta = mysqli_query($conexion,$instruccion) or die ("fallo en la consulta");

			//cuarto paso: mostrar resultados de la consulta
			$nfilas = mysqli_num_rows($consulta);
			if ($nfilas>0) {
				print("<div id='wrapper'>");
				print("<TABLE id='keywords'>\n");
				print("<TR>\n");
				print("<TH>titulo</TH>\n");
				print("<TH>texto</TH>\n");
				print("<TH>categoria</TH>\n");
				print("<TH>fecha</TH>\n");
				print("<TH>imagen</TH>\n");
				print("</TR>\n");

				for ($i=0; $i<$nfilas; $i++) {
					$resultado = mysqli_fetch_array ($consulta);
					print("<TR>\n");
					print("<TD class='lalign'>" . $resultado['titulo']. "</TD>\n");
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

			//quinto paso: cerrar conexion
			mysqli_close($conexion);
		 ?>
		 <script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>