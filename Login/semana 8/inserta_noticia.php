<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Insertar Noticias</title>
	<link rel="stylesheet" href="estilo.css">
	<?php 
		//incluir bibliotecas funciones
		include("lib/fecha.php");
		include("menu.php");
	 ?>
</head>
<body>
	<?php 
	/////////////////////////////////////////////////////////////////////////
		//si el formulario ha sido enviado
		//	validar formulario
		//fsi
		//si el formulario ha sido enviado y los datos son correctos
		//	procesar formulario
		//si no
		//	mostrar formulario
		//fsi
	/////////////////////////////////////////////////////////////////////////
	
	//Obtener valores introducidos en el formulario
	$insertar = $_REQUEST['insertar'];
	$titulo = $_REQUEST['titulo'];
	$texto = $_REQUEST['texto'];
	$categoria = $_REQUEST['categoria'];

	$error = false;
	if (isset($insertar)) {

		//comprobar que se han introducido todos los datos obligatorios
		//Titulo
		if (trim($titulo) == "") {
			$errores["titulo"] = "¡debe introducir el titulo de la noticia!";
			$error = true;
		}
		else
			$errores["titulo"] = "";

		//Texto
		if (trim($texto) =="") {
			$errores["texto"] = "¡debe introducir el texto de la noticia!";
			$error = true;
		}
		else
			$errores["texto"]="";

		//subir fichero
		$copiarFichero = false;

		//copiar fichero en directorio de fichero subidas
		//se renombra para evitar que sobreescriba un fichero existente
		//para garantizar la unicidad del nombre se añade una marca de tiempo
		if (is_uploaded_file($_FILES['imagen']['tmp_name'])) 
		{
			$nombreDirectorio = "img/";
			$nombreFichero = $_FILES['imagen']['name'];
			$copiarFichero = true;

			//si ya existe un fichero con el mismo nombre, renombrarlo
			$nombreCompleto = $nombreDirectorio . $nombreFichero;
			if (is_file($nombreCompleto)) {
				$idUnico = time();
				$nombreFichero = $idUnico . "-" . $nombreFichero;
			}
		}
		//el fichero introducido supera el limite de tamaño permitido
		else if ($_FILES['imagen']['error'] == UPLOAD_ERR_FORM_SIZE){
			$maxsize = $_REQUEST['MAX_FILE_SIZE'];
			$errores["imagen"] = "¡el tamaño del fichero supera el limite permitido ($maxsize bytes)!";
			$error = true;
		}
		//no se ha introducido ningun fichero
		else if($_FILES['imagen']['name']== "")
			$nombreFichero = '';
		//el fichero introducido no se ha podido subir
		else{
			$errores["imagen"] = "¡no se ha podido subir ek fichero!";
			$error = true;
		}
	}

	//si los datos son correctos, procesar formulario
	if(isset($insertar) && $error==false)
	{
		//insertar la noticia en la base de datos
		$conexion = mysqli_connect("localhost", "root", "") or die("no se puede conectar con el servidor");
		mysqli_select_db($conexion, "lindavista") or die("no se puede seleccionar la base de datos");
		$fecha = date("y-m-d"); //fecha actual
		$instruccion = "insert into noticias (titulo, texto, categoria, fecha, imagen) values ('$titulo', '$texto', '$categoria', '$fecha', '$nombreFichero')";
		$consulta = mysqli_query($conexion, $instruccion) or die("fallo en la consulta");
		mysqli_close($conexion);

		//Mover fichero de imagen a su ubicacion definitiva
		if ($copiarFichero)
		move_uploaded_file($_FILES['imagen']['tmp_name'],
		$nombreDirectorio . $nombreFichero);

		//mostrar datos introducidos
		print("<h1>Gestion de noticias</h1>\n");
		print("<h2>Resultado de la insercion de nueva noticia</h2>\n");
		
		print("La noticia ha sido recibida correctamente: ");
		print("<UL>");
		print("<LI>Titulo: " . $titulo);
		print("<LI>Texto: " . $texto); 
		print("<LI>Categoria: " . $categoria);
		print("<LI>Fecha: " . date2string($fecha));
		if($nombreFichero !="")
			print("<LI>Imagen: <a TARGET = '_blank' href = '" . $nombreDirectorio . $nombreFichero . "'>" . $nombreFichero . "</a>");
			else
			print("<LI>Imagen: (no hay)");
			print("</UL>");
			print("<BR>");
			print("[<a href = 'nueva_noticia.php'>Insertar otra noticia</a>]");
			print("<BR>");
			print("[<a href = 'ejercicio1.php'>Consultar las noticias</a>]"); 
		}
	?>	

	<script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>