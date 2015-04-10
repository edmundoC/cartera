 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Cartera de clientes</title>
	<script type="text/javascript" src="scripts/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).on("ready",function(){
			$('#btnActualizar').on("click",function(){
				
			});
			$.ajax({
					beforeSend: function(){

					},
					data: {operacion:"c"},
					type: "POST",
					url: "operaciones.php",
					success: function(respuesta){
						$('#datos').html(respuesta);
					},
					error: function(a,b,c){
						alert("Valor de a: "+a+" Valor de B: "+b+" Valor de C: "+c);
					}
			});	
		});
	</script>
</head>
<body>
	<?php
		session_start();
		include "config.php";
		if(isset($_SESSION['usuario'])){
			?><h2>Bienvenido: <?echo $_SESSION['usuario'] ?> a tu cartera de clientes</h2>
			<div id=datos class="cont-clientes">
			</div>
			<table>
				<tr>
					<td><input id="btnAgregar" type="button" value="Agregar Clientes"/></td>
					<td><input id="btnModificar" type="button" value="Modificar Clientes"/></td>
				</tr>
			</table>
		<?}
	?>
</body>
</html>