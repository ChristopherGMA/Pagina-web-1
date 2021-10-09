<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device=width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="estilo.css">
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class ="navbar navbar-yellow">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navdar-brand" href="https://portal.unab.edu.sv/cgi-bin/index.cgi">UNAB -II-2021</a>
		</div>
		<UL class = "nav navbar-nav">
			<li class="active"><a href="menu.php">Inicio</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle= "dropdown" href="#">Catalogos<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="ejercicio1.php">Consultar Noticias</a></li>
					<li><a href="nueva_noticia.php">Nueva Noticia</a></li>
					<li><a href="elimina_noticia.php">Eliminar Noticias</a></li>
					<li><a href="consulta_noticias2.php">Consulta Compaginada de Noticia</a></li>
				</ul>
			</li>
			<li><a href="#">Reportes</a></li>
			<li><a href="encuesta.php">Encuesta</a></li>
		</UL>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Sing Up</a></li>
			<li><a href="http://localhost/Progra%20Aplicada%20III/Login/LogOut.php"><span class="glyphicon glyphicon-log-in"></span></a></li>
		</ul>
		<img src="img/logorecortado.png" alt="logo castingwebs" width="400" height="75">
	</div>
	</nav>
	<hr>
<div id="wrapper">
	
	<h1 class="text-center">INTEGRANTES</h1>
	<table id="keywords" class="table table-hover table-bordered">
		<thead class="thead">

			<tr>
				<th class="text-center">CARNET</th>
				<th class="text-center">APELLIDOS</th>
				<th class="text-center">NOMBRE</th>
				<th class="text-center">CARRERA</th>
				<th class="text-center">FOTO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="lalign">MA2037012018</td>
				<td>Miranda alvarado</td>
				<td>Christopher Gerardo</td>
				<td>Lic. Computacion</td>
				<td class="text-center"><img src="img/Christopher.jpg" width="50" height="70"></td>
			</tr>
			<tr>
				<td class="lalign">AP0948012018</td>
				<td>Fernanda Liseth</td>
				<td>Argueta Perez</td>
				<td>Lic. Computación</td>
				<td class="text-center"><img src="img/Fernanda.jpg" width="50" height="70"></td>
			</tr>
			<tr>
				<td class="lalign">MM0889012018</td>
				<td>Edwin Antonio</td>
				<td>Meza Mejia</td>
				<td>Lic. Computación</td>
				<td class="text-center"><img src="img/Edwin.jpg" width="50" height="70"></td>
			</tr>
			<tr>
				<td class="lalign">ZL0895012018</td>
				<td>Karina Yamileth</td>
				<td>Zuniga Lemus</td>
				<td>Lic. Computación</td>
				<td class="text-center"><img src="img/Karina.jpg" width="50" height="70"></td>
			</tr>
			<tr>
				<td class="lalign">MV0798012018</td>
				<td>Carolina Alicia</td>
				<td>Martinez Vazquez</td>
				<td>Lic. Computación</td>
				<td class="text-center"><img src="img/Carolina.jpg" width="50" height="70"></td>
			</tr>
			<tr>
				<td class="lalign">GJ0303042017</td>
				<td>Rene Leonardo</td>
				<td>Godinez Gimenez</td>
				<td>Lic. Computación</td>
				<td class="text-center"><img src="img/Rene.jpg" width="50" height="70"></td>
			</tr>
		</tbody>
	</table>
</div>
	

	<!-- Latest compiled and minified JS -->
	<!-- Latest compiled and minified JS -->
	<script type="text/javascript" src="Assets/tableScript.js"></script>
</body>
</html>