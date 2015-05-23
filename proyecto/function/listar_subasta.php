<?php 
	// Requiere estar incluido en un archivo con conexión realizada
	$query = "	SELECT 	*
				FROM	Subasta";

	?> 
	<pre>
		<?php 
			($result = $db->query($query)); 

			while ($row = $result->fetch_object()) {
				echo $row->titulo . '<br>' . $row->descripcion, '<br>';
			}
		?>
	</pre>