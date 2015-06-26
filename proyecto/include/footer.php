<?php //El footer se modifica solo de acá ?>
	
	<!-- floating -->
	 <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large waves-effect waves-light">
		  <i class="large mdi-content-add"></i>
		</a>
		<ul>
			<?php if($_SESSION){ ?>
				<li><a href="#modal2" class="btn-floating waves-effect waves-light purple modal-trigger"><i class="large mdi-action-info"></i></a></li>
				<li><a href="/publicarSubasta.php" class="btn-floating waves-effect waves-light yellow darken-2"><i class="large mdi-content-create"></i></a></li>
				<li><a href="/verPerfil.php" class="btn-floating waves-effect waves-light green darken-1"><i class="large mdi-social-person"></i></a></li>
		 		<li><a href="/logout.php" class="btn-floating waves-effect waves-light red darken-1"><i class="large mdi-action-lock"></i></a></li>
		 		<li><a href="/index.php" class="btn-floating waves-effect waves-light blue darken-1"><i class="large mdi-action-home"></i></a></li>
							
			<?php } else { ?>
				<li><a href="#modal2" class="btn-floating waves-effect waves-light purple modal-trigger"><i class="large mdi-action-info-outline"></i></a></li>
				<li><a href="/register.php" class="btn-floating waves-effect waves-light red darken-1"><i class="large mdi-communication-vpn-key"></i></a></li>
				<li><a href="/login.php" class="btn-floating waves-effect waves-light green darken-1"><i class="large mdi-action-lock-open"></i></a></li>
		 		<li><a href="/index.php" class="btn-floating waves-effect waves-light blue darken-1"><i class="large mdi-action-home"></i></a></li>
			<?php } ?>
		</ul>
    </div>
	
	<footer class="page-footer grey">
		<div class="container">
            <div class="row">
				<div class="col-md-0">	
					<a class="grey-text text-lighten-4 left modal-trigger" href="#modal1">Términos y condiciones</a>
					<a class="grey-text text-lighten-4 right" href="https://github.com/lemon-dev"><img class="responsive-img"src="../img/github.png" alt="Logo"> </a>
				</div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2015 lemon-dev ALL RIGHTS RESERVED
            <a class="grey-text text-lighten-4 right" href="http://lemon-dev.esy.es">lemon-dev.esy.es</a>
            </div>
          </div>
		</div>
	</footer>
	
	<!-- modal de terminos y condiciones -->
	<div id="modal1" class="modal">
		<div class="modal-content">
		  <h4 class="center">Términos y condiciones</h4>
		  <p>Bestnid no poseerá ningún tipo de control de contenidos, no se hace responsable del contenido publicado en la página y tampoco es un objetivo mantener seguimiento de los subastadores ni ofertadores debido a la filosofía del negocio y sus dueños.</p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat ">Cerrar</a>
		</div>
	</div>

	<!-- modal de información acerca de la página -->
	<div id="modal2" class="modal">
		<div class="modal-content">
		  <h4 class="center">Información acerca de la página</h4>
		  <p>Bestnid es considerado un remate, pero un tanto particular. En Bestnid el bien subastado no se adjudica al postor que más dinero haya ofrecido por él, sino que cada postor comunica por qué necesita dicho producto, y el subastador elegirá un ganador.</p>
		</div>
		<div class="modal-footer">
		  <a href="#!" class="modal-action modal-close waves-effect waves-teal btn-flat ">Cerrar</a>
		</div>
	</div>
	
	<script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>
  <script type="text/javascript" src="/js/main.js"></script>
</body>
</html>