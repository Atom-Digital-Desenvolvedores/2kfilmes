<?php
	get_header();

	$id_servicos = get_page_by_path( 'o-que-fazemos', OBJECT, 'page' )->ID;
?>

	<!-- <section class="wq-breadcrumb">
		<div class="wq-container">
			<h1><?php the_title(); ?></h1>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				}
			?>
		</div>
	</section> -->

	<?php

		if (get_post_meta( get_the_ID(), 'wsg_servico_item_modelo', true ) == "modelo2"){
			include "inc-servico_mk2.php";
		} else{
			include "inc-servico_mk1.php";
		}
	?>

<?php get_footer(); ?>