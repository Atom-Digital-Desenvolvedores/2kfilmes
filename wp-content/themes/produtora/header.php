<?php

	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta name="robots" content="noodp" />
	<meta http-equiv="Content-Language" content="pt-br">

	<link rel="icon" href="<?php echo $wsg_favicon[0]; ?>" type="image/x-icon"/>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/webquantica-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/lity.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css">

	<?php if ( is_page('sobre') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/empresa.css">
	<?php } elseif ( is_page('contato') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/contato.css">
	<?php } elseif ( is_singular('servicos') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/not-home.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/servicos-interna.css">
	<?php } elseif ( is_post_type_archive('trabalhos') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/not-home.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/empresa.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/servicos-interna.css">
	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/mobile.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/lity.min.css">

	<script src="<?php bloginfo('template_url') ?>/js/jquery.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/webquantica-grid.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/owl.carousel.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/carousel.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/lity.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/efeitos.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/parallax.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js/aos.js"></script>

	<meta name="wq_url_theme" content="<?php bloginfo('template_url'); ?>/">


	<!-- -->
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.css">
	<script src="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js-template/jquery.blockUI.js"></script>

	<script src="<?php bloginfo('template_url') ?>/js-template/jquery.maskedinput.min.js"></script>
	<script src="<?php bloginfo('template_url') ?>/js-template/script-template.js"></script>

	<!-- -->
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallbackFormsRecaptcha&render=explicit' async defer></script>

	<!-- <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/maps/infobox.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/maps/maps.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/maps/classie.js"></script> -->

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/maps/maps.js"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjXdeHFmj4yy3BfWr1WqNgIkohPDflg6w"></script> -->

	<?php wp_head(); ?>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'pixel_de_conversao_facebook', true );
		echo get_post_meta( $id_google, 'code_webmaster_tools', true );
	?>
</head>
<body <?php echo (is_home()) ? 'onload="initialize()"' : ''; ?>>

	<header class="wq-header wq-header_vertical">
		<div class="wq-header_bottom">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-menu">
						<div class="wq-btn_menu">
							<hr>
							<hr>
							<hr>
						</div>
						<nav class="wq-menu_principal">
							<ul class="wq-lista-inline">
								<li><a href="<?php bloginfo('url'); ?>/" <?php echo ( is_home() ) ? 'class="active"' : ''; ?> >Home</a></li>
								<li><a href="<?php bloginfo('url'); ?>/#sobre" class="scroll">Sobre</a></li>
								<li><a href="<?php bloginfo('url'); ?>/#o-que-fazemos" class="scroll"> O que fazemos</a></li>
								<li><a <?php echo (is_post_type_archive('trabalhos')) ? 'class="active" href="javascript:void(0)"' : 'class="scroll" href="#trabalhos"'; ?> >trabalhos</a></li>
								<li><a href="#wq-contato" class="scroll">Contato</a></li>
							</ul>
						</nav>
					</div>
					<ul class="wq-midias-sociais wq-lista-inline">
						<?php
							$arrayQuery_Midias_Sociais = array(
								'post_type'			=> array( 'redes_sociais' ),
								'posts_per_page'	=> '-1',
								'orderby' 			=> 'menu_order',
								'order' 			=> 'ASC',
							);

							$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

							while ( $query_Midias_Sociais->have_posts()) {
								$query_Midias_Sociais->the_post();
						?>
							<li><a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>" target="_blank" class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo',true); ?>"></a></li>
						<?php
							}
							wp_reset_query();
						?>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div class="loading">
		<div class="wq-img">
			<figure>
	   		 	<img src="<?php bloginfo('template_url'); ?>/img/logo-carregamento.png" alt="Carregamento-2k-filmes" title="Carregamento-2k-filmes">
	   		 </figure>
	   	</div>
  	</div>