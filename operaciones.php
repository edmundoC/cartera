<?php
	session_start();
	include "config.php";
	if(isset($_POST['operacion'])){
		$operacion = $_POST['operacion'];
		$id_usuario = $_SESSION['id_usuario'];
		switch ($operacion) {
			case "c":
				$query = "SELECT concat(c.nombre,' ',c.apellidos) AS cliente, e.nombre from clientes c, estados e WHERE id_usuario = '".$id_usuario."' AND c.id_estado = e.id_estado";
				$result = mysql_query($query) or die("Error en la consulta: ".mysql_error());
				echo '<table border="1"><tr><th>Cliente</th><th>Estado</th></tr>';
				while ($datos = mysql_fetch_row($result)) {
					echo "<tr>";
					echo "<td><center>".$datos[0]."</center></td>";
					echo "<td><center>".$datos[1]."</center></td>";
					echo "</tr>";
				}
				echo "</table>";
				break;
			
			default:
				echo "No entro a mostrar";
				break;
		}
	}else{
		echo "Error, algo salio mal";
	}
?>