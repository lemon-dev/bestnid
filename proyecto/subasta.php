<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

include('db/connect.php');

if(isset($_GET['id_subasta'])){
	
	$query = "	SELECT 	*
				FROM	subasta S INNER JOIN producto P ON S.id_producto = P.id_producto
				WHERE	S.id_subasta = " . $_GET['id_subasta'];

	$result = $db->query($query);

	$row = $result->fetch_object();


}

$pageTitle = "Bestnid | $row->titulo";
include('include/header.php');

?>

<section>
	<div class="container ver-subasta z-depth-2 col m12">
		<header class="row center">
			<h3><?php echo $row->titulo ?></h3>
		</header>
		<div class="row">
			<img class="responsive-img col m4" src="<?php echo $row->imagen_url ?>" alt="Imagen">
			<div class="subasta-opciones">
				<p><?php echo $row->descripcion ?></p>
				<?php if($row->id_usuario == $_SESSION['id_usuario']){ ?>
					
					<a class="waves-effect waves-light btn">Ver Ofertas</a>
				
				<?php } else { ?>
					
					<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ofertar</a>

					<div id="modal1" class="modal">
						<div class="modal-content">
							<h4 class="center">Ofertar</h4>
							<i class="mdi-navigation-close right"></i>
							<div class="row">
								<form action="" method="post">
									<div class="row">
										<div class="input-field col s12">
								          	<input name="precio" id="precio" type="number" class="validate" required>
						          			<label for="precio">Precio</label>
								        </div>
								        <div class="input-field col s12">
								          	<textarea id="precio" class="materialize-textarea"></textarea>
          									<label for="precio">Textarea</label>
								        </div>
						     		</div>	
								</form>
							</div>
						</div>
						<!--div class="modal-footer">
							<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Enviar</a>
						</div-->
						<button class="modal-action modal-close btn waves-effect waves-light right" type="submit" name="action">Submit
					    	<i class="mdi-content-send right"></i>
					  	</button>
        
					</div>
				<?php } ?>
			</div>
		</div>
		 <ul class="collapsible popout" data-collapsible="accordion">
			<li>
			  <div class="collapsible-header"><i class="mdi-communication-messenger"></i>First</div>
			  <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li>
			  <div class="collapsible-header"><i class="mdi-communication-messenger"></i>Second</div>
			  <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
			<li>
			  <div class="collapsible-header"><i class="mdi-communication-messenger"></i>Third</div>
			  <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
			</li>
		</ul>
	</div>
</section>


<?php include('include/footer.php'); ?>