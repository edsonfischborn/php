<header class="header">
	<div class="header__about">
		<img class="header__logo" src="<?= IMAGES_URL ?>/logo.png"/>
		<h4 class="header__title">Curso Técnico em Informática</h4>
	</div>

	<nav role="navigation" class="header__nav">
		<input class="header__nav-toggler" type="checkbox" />
		<span class="header__burger-bar"></span>
		<span class="header__burger-bar"></span>
		<span class="header__burger-bar"></span>

		<div class="header__menu">
			<div class="header__nav-description">
				<h4 class="header__nav-title">Navegação</h4>
				<div class="header__nav-hline"></div>
			</div>
			
			<ul class="header__nav-items">
				<li class="header__nav-item">
					<a class="header__link" href="<?= HOME_URL; ?>">Início</a>
				</li>
				<li class="header__nav-item">
					<a class="header__link" href="<?= HOME_URL; ?>">MVC</a>
				</li>
				<li class="header__nav-item">
					<a class="header__link" href="<?= HOME_URL; ?>">POO</a>
				</li>
				<li class="header__nav-item">
					<a class="header__link" href="<?= HOME_URL; ?>/urlAmigavel">URL Amigável</a>
				</li>
				<li class="header__nav-item">
					<a class="header__link" href="<?= HOME_URL; ?>/contato">Contato</a>
				</li>
				<?php
					if (isset($_SESSION['user']) && $_SESSION['user']['perfil'] == "admin") {
						echo "<li class='header__nav-item'>
							<a class='header__link' href='" . HOME_URL . "/usuario/'>Usuário</a>
						</li>";
					} 
				?>
				
				<li class="header__nav-item">
					<?php
						if(isset($_SESSION['user'])){
							echo "<div> <strong class='header__user'>".$_SESSION['user']['nome'].
							"</strong> | <a class='header__button--danger' href='".HOME_URL."/usuario/logout'>Sair</a></div>";
						}else{
							echo "<p><a class='header__button--success' href='".HOME_URL."/usuario/login'>Login</a></p>";
						}
					?>
				</li>
			</ul>
		</div>
	</nav>
</header>