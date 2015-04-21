<?php
	session_start();
	include "config.php";
	if(isset($_POST['operacion'])){
		$operacion = $_POST['operacion'];
		$id_usuario = $_SESSION['id_usuario'];
		switch ($operacion) {
			case 'c':
				/*$query = "SELECT concat(c.nombre,' ',c.apellidos) AS cliente, e.nombre from clientes c, estados e WHERE id_usuario = '".$id_usuario."' AND c.id_estado = e.id_estado";
				$result = mysql_query($query) or die("Error en la consulta: ".mysql_error());
				
				$contador = 1;
				while ($datos = mysql_fetch_row($result)) {
					echo "<tr id='".$contador."'>";
					echo "<td><center>".$datos[0]."</center></td>";
					echo "<td><center>".$datos[1]."</center></td>";
					echo '<td><center><input id="btnModificar" type="button" value="Modificar"/></center></td>';
					echo '<td><center><input id="btnEliminar" type="button" value="Eliminar"/></center></td>';
					echo "</tr>";
					$contador++;
				}
				*/
				echo "Entro a clientes";
				break;
			case 'l':
				echo "Entro a logout";
			break;
			case 'p':
				$idCliente = $_POST['id'];
				echo '<table id="tabla-promesas" border=1">';
				echo '<thead><tr><th>Num Folio</th><th>Fecha de pago</th><th>Monto</th></tr></thead>';
				$query = "SELECT num_folio, fecha_pago, monto from folios AS f, promesas AS p where f.id_cliente = '".$idCliente."' AND p.id_folio = f.id_folio";	
				$result = mysql_query($query);
				if(mysql_num_rows($result) != 0){
					while ($row = mysql_fetch_row($result)){
							echo "<tr>";
    						echo "<td>$row[0]</td>";
							echo "<td>$row[1]</td>";
							echo "<td>$row[2]</td>";
							echo "</tr>";
					}
				}
				echo '</table>';
			break;
			default:
				echo "Opcion invalida";
			break;
		}
	}else{
		echo "Error, algo salio mal";
	}
?>