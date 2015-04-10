<?php
	$conexion = mysql_connect("localhost","root","") or die ("Error al realizar la conexión");
	$db = mysql_select_db("agenda",$conexion) or die ("Error al seleccionar la BD");
	$_SESSION['usuario'] = "Edmundo";
	$_SESSION['id_usuario'] = "1";
?>
