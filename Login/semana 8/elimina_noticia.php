<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>ELIMINAR NOTICIAS</title>
	<link rel="stylesheet" href="estilo.css">
	<?php 
		//incluir bibliotecas de funciones
		include ("lib/fecha.php");
		include("menu.php");
	 ?>
</head>
<body>
	<h1>Eliminacion de noticias</h1>
	<?php 
		if (isset($_POST['eliminar'])) {

			//conectar con el servidor de base de datos
			$conexion = mysqli_connect("localhost", "root", "") or die("no se puede conectar con el servidor");

			//obtener numero de noticias a borrar
			$borrar = $_REQUEST['borrar'];
			$nfilas = count($borrar);

			//Mostrar noticias a borrar
			for($i=0; $i<$nfilas; $i++) {
				echo "$nfilas, $borrar[$i]";
				//Obtener datos de la noticia i-esima
				$instruccion = "select * from noticias where id = $borrar[$i]";
				$consulta = mysqli_query($conexion, $instruccion) or die ("fallo en la consulta");
				$resultado = mysqli_fetch_array($consulta);

				//Mostrar datos de la noticias i-esima
				print("Noticas eliminada:\n");
				print("<UL>\n");
				print("<li>Titulo: " . $resultado['titulo']);
				print("<li>texto: " . $resultado['texto']);
				print("<li>categoria: " . $resultado['categoria']);
				print("<li>fecha: " . $resultado['fecha']);
				if($resultado['imagen'] !="")
					print("<li>Imagen:".$resultado['imagen']);
				else
					print("<li>Imagen: (no hay)");
				print("<\UL>\n");

				//Eliminar noticias
				$instruccion = "delete from noticias where id = $borrar[$i]";
				$consulta = mysqli_query($conexion, $instruccion) or die("fallo en la eliminacion");

				//borrar imagen asociada si existe
				if($resultado['imagen'] !="")
				{
					$nombreFichero = "img/" . $resultado['imagen'];
					unlink($nombreFichero);
				}
			}
			print("<p>Numero total de noticias eliminadas: " . $nfilas . "</p>\n");

			//cerrar conexion
			mysql_close($conexion);

			print("<p>[<a herf = 'elimina_noticia.php'>eliminar mas noticias<\a>]
				</p>\n");
		}
		else
		{
			//conectar con el servidor de base de datos
			$conexion = mysqli_connect("localhost", "root","") or die("no se puede conectar con el servidor");

			//seleccionar base de datos
			mysqli_select_db($conexion, "lindavista") or die("No se puede seleccionar la base de datos");

			//enviar consulta
			$instruccion = "select * from noticias order by fecha desc";
			$consulta = mysqli_query($conexion, $instruccion) or die("fallo en la consulta");

			//Mostrar resultado de la consulta
			$nfilas	= mysqli_num_rows($consulta);
			if($nfilas >0){
				// print ("<from action='elimina_noticias.php' method = 'post'>\n");
				print("<form action='elimina_noticia.php' method = 'POST'>\n");
				print("<div id='wrapper'>");
				print("<TABLE id='keywords'>\n");
				print("<TR>\n");
				print("<TH>Titulo</TH>\n");
				print("<TH>Texto</TH>\n");
				print("<TH>Categoria</TH>\n");
				print("<TH>Fecha</TH>\n");
				print("<TH>Imagen</TH>\n");
				print("<TH>Borrar</TH>\n");
				print("</TR>\n");

				for ($i=0; $i<$nfilas; $i++) {
					$resultado = mysqli_fetch_array ($consulta);
					print("<TR>\n");
					print("<TD>" . $resultado['titulo']. "</TD>\n");
					print("<TD>" . $resultado['texto']. "</TD>\n");
					print("<TD>" . $resultado['categoria']. "</TD>\n");
					print("<TD>" . date2string($resultado['fecha']) . "</TD>\n");
				if ($resultado['imagen'] !="")
					print("<TD><a TARGET= '0' src='img/ico-fichero.gif' ALT=c'Imagen asociada'></TD>\n");
				else
					print("<TD>&nbsp;</TD>\n");

				print("<TD><input type='checkbox' name='borrar[]' value='" . $resultado['id'] . "'></TD>\n");

				print("</TR>\n");
			}
			print("</TABLE>\n");
			print("</div>");
			print("<BR>\n");
			print("<INPUT TYPE='SUBMIT' NAME='eliminar' VALUE= 'Eliminar noticias marcadas'>\n");
			print("</FROM>\n");
		}
		else

			print("no hay noticias disponible");

			//cerrar conexion
			mysqli_close($conexion);

		}
		print("<br>");
		print("[<a href = 'ejercicio1.php'>consulta las noticias </a>]");
	 ?>

	 <script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>