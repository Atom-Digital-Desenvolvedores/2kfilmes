<?php
	get_header();

	$id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<div class="wq-404">
		<div class="wq-container">
			<h1>Erro 404</h1>
			<p>Pagina não encontrada</p>
			<a href="<?php bloginfo('url'); ?>" class="wq-btn_1">Ir para Home</a>
		</div>
	</div>

<?php get_footer(); ?>