<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PROCESO DE INSERTAR NUEVA NOTICIA</title>
	<link rel="stylesheet" href="estilo.css">
	<?php 
		//incluir bibliotecas de funciones
		include("lib/fecha.php");
		include("menu.php");
	 ?>
</head>
<body>
	<h1>Insercion de nueva noticia</h1>
	<p>Nota: los datos marcados con (*) deben ser rellenados obligatoriamente</p>
	<form class="borde" action="inserta_noticia.php" name="inserta" method="POST" enctype = "multipart/form-data">
		
		<!--titulo de la noticia-->
		<p><label>Titulo: *</label>
			<input type="text" name="titulo" size="50" maxlength="50">
			<?php 
				if (isset($insertar)) 
					print("VALUE = '$titulo'>\n");
				else
					print(">\n");
			 ?>
		</p>
		<!-- texto de la noticia-->
		<p><label>texto: *</label>
			<TEXTAREA COLS="45" ROWS="5" NAME="texto">
				<?php 
					if(isset($insertar)) 
						print("$texto");
					print("</TEXTAREA>");
				 ?>
		</p>

		<!--Categoria de la noticia-->
		<p><label>categoria: </label>
			<select name="categoria">
				<option selected>Promociones
				<option>Ofertas
				<option>Costas
			</select>
		</p>
		<!-- Imagen asociada a la noticia -->
		<p><label>Imagen: </label>
			<input type="hidden" name="max_file_size" value="102400">
			<input type="file" size="44" name="imagen">
		</p>
		<!--Boton de envio-->
		<p><input type="SUBMIT" name="insertar" value="insertar noticia"></p>		
	</form>
	<?php 
		print("[<a href = 'ejercicio1.php'>Consultar las Noticias</a>]");
	 ?>

	 <script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>