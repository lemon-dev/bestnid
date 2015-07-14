<?php
//Debe tener incluido functions.php en el archivo que lo incluye

include($_SERVER['DOCUMENT_ROOT']. '/db/functions.php');

if(isset($_GET["criterio"])) {
  $criterio = $_GET["criterio"];
  $subastas = subastas_por_criterio($criterio);
} else {
  $subastas = subastas();
}

while ($subasta = $subastas->fetch_object()): if($subasta->fecha_final > date('Y-m-d')): ?>
	
    <div class="col s12 m12 l6">
      	<div class="card">
        	<div class="card-image">
          		<img class="responsive-img" src="<?php echo $subasta->imagen_url ?>">
        	</div>
        <div class="card-content">
			<span class="card-title black-text"><?php echo $subasta->titulo ?></span>
          	<p><?php echo $subasta->descripcion ?></p>
          	<p>La subasta comenz&oacute; el d&iacute;a <?php echo $subasta->fecha_inicio ?></p>
      		<p>La subasta finaliza el d&iacute;a <?php echo $subasta->fecha_final ?></p>
        </div>
        <div class="card-action">
          	<a href="subasta.php?id_subasta=<?php echo $subasta->id_subasta?>">Ver Subasta</a>
        </div>
      </div>
    </div>
        
<?php endif; endwhile;?>