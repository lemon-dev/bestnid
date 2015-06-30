<?php 
session_start();
//error_reporting(-1);
//ini_set('display_errors', 'On');

include('db/connect.php');
include('db/functions.php');

$subasta = subastaConID($_GET['id_subasta']);
$pageTitle = 'Ofertas | ' . $subasta->titulo;
		include('include/header.php');

$ofertas_exitosas = ofertaExitosaParaSubasta($_GET['id_subasta']);

if($_SESSION && ($_SESSION['id_usuario'] == $subasta->id_usuario)){
	if($ofertas_exitosas->num_rows == 0){


		$terminada = $subasta->fecha_final < date('Y-m-d');

?>

	<section>
		<div class="container ofertas">
			<h4 class="center">Ofertas para <?php echo $subasta->titulo ?></h4>
			<?php if($terminada){ ?>
				<p class="center">La subasta a terminado, por favor, eliga una entre las siguientes ofertas.</p>
			<?php } else { ?>
			
				<p class="center">La subasta finalizará en unos días, cuando finalize podrá elegir entre las ofertas disponibles.</p>

			<?php } ?>
			
			<?php 
				$ofertas = ofertasParaSubasta($_GET['id_subasta']);
				if($ofertas->num_rows == 0){ ?>
						
					<div class="card-panel grey lighten-5 z-depth-1 row">
						<p class="center">No hay ofertas para su subasta :(</p>
						<!--p class="center">No pierda el ánimo vuelva a intentarlo en <a href="/publicarSubasta.php">publicar subasta</a></p-->
					<div>	


				<?php } else {
					while($oferta = $ofertas->fetch_object()){ ?>
					
						<div class="card-panel grey lighten-5 z-depth-1 row">
							<p class="col m12"><?php echo $oferta->necesidad ?></p>
							<?php if($terminada) { ?>
								<form action="/function/oferta-exitosa-process.php" method="post">
									<input type="hidden" name="id_oferta" value="<?php echo $oferta->id_oferta ?>">
									<input type="hidden" name="id_subasta" value="<?php echo $_GET['id_subasta'] ?>">
									<button class="btn waves-effect waves-light right" type="submit" name="action" onclick="confirmElection()">
									<script>
										function confirmElection(){
											confirm("¿Seguro que desea elegir esta oferta como la ganadora?");
										}
									</script>
									Elegir
    									<i class="mdi-action-done right"></i>
  									</button>
								</form>
							<?php } ?>
						</div>	

				<?php } 

				} ?>


		</div>
	</section>

<?php } else { ?>
	<?php 
		
		if($ofertas_exitosas->num_rows == 1){
			$oferta_exitosa = $ofertas_exitosas->fetch_object(); ?>
			<div class="container oferta-ganadora z-depth-2">
				<h4 id="finalizada-header" class="center z-depth-1">Subasta finalizada!</h4>
				<p>La oferta ganadora es: </p>
				<div class="card-panel grey lighten-5 z-depth-1 row">
					<p class="col m3 ofertador"><i class="mdi-social-person"></i><?php echo $oferta_exitosa->nombre_usuario ?></p>
					<p class="col m6"><?php echo $oferta_exitosa->necesidad ?></p>
					<p class="col m3">$ <?php echo $oferta_exitosa->precio ?>
				</div>
			</div>
		<?php } ?>

<?php  } ?>

 <?php }  else {?>
	
	<p>Solo el dueno de la subasta puede ver las ofertas</p>
	<?php die(); ?>

 <?php } ?>


<?php include('include/footer.php'); ?>