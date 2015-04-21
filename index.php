<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta charset="UTF-8">
	<title>Cartera de clientes</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="scripts/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
		$(document).on("ready",function(){
			var mostrando = false;
	
			$("tbody tr:odd").css("background","#bbbbff");

			$("tbody tr").on("click",function(){
				if(mostrando){
					$("#cont-promesas").remove();
					mostrando = false;
				}else{
					var elementoActual = $(this);
					$.ajax({
						url:'operaciones.php',
						method:'POST',
						data:{operacion:'p',id:$(this).attr('id')},
						success: function(respuesta){
							var info = $('<div id="cont-promesas"></div>');
							$(elementoActual).after(info);
							$("#cont-promesas").html(respuesta);
							$("#tabla-promesas tbody tr:even").css("background","#bbffbb");
						},
					});
				mostrando = true;
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
				<table id="tabla_clientes" border="1" style="a">
					<thead><tr>
						<th>Nombre</th>
						<th>Estado</th>
					</tr></thead>	
					<?php
						$id_usuario = $_SESSION['id_usuario'];
						$query = "SELECT concat(c.nombre,' ',c.apellidos) AS cliente, e.nombre estado from clientes c, estados e WHERE id_usuario = '".$id_usuario."' AND c.id_estado = e.id_estado";
						$result = mysql_query($query,$conexion) or die ("Error en la consulta: ".mysql_error());
						$contador = 1;
						while($datos = mysql_fetch_row($result)){
							echo '<tr id="'.$contador.'">';
							echo "<td>".$datos[0]."</td>";
							echo "<td>".$datos[1]."</td>";
							echo "</tr>";

							$contador++;
						}
					?>
					<tfoot>
						<tr>
							<td colspan="2" align="center">
								<input id="btnAgregar" type="button" value="Agregar"/>
								<input id="btnModificar" type="button" value="Modificar"/>
								<input id="btnEliminar	" type="button" value="Eliminar"/>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		<?}
	?>
</body>
</html>