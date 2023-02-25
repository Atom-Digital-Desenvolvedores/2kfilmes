<?php
	get_header();

	$id_servicos = get_page_by_path( 'o-que-fazemos', OBJECT, 'page' )->ID;
?>

	<section class="wq-breadcrumb">
		<div class="wq-container">
			<h1><?php echo get_page_by_path( 'o-que-fazemos', OBJECT, 'page' )->post_title; ?></h1>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				}
			?>
		</div>
	</section>

	<section class="wq-03">
		<?php
			$arrayQueryServicos = array(
				'post_type'				=> array( 'servicos' ),
				'posts_per_page'		=> '-1',
				'orderby' => 'menu_order',
				'order' => 'ASC',
			);
			$queryServicos = new WP_Query($arrayQueryServicos);
			while ( $queryServicos->have_posts()) {
				$queryServicos->the_post();
		?>
			<?php
				$wsg_servico_item_img_id = get_post_meta( get_the_ID(), 'wsg_servico_item_img_id', true );
				$wsg_servico_item_img_id = wp_get_attachment_image_src($wsg_servico_item_img_id, '1920x310');
				$wsg_servico_item_img_id = $wsg_servico_item_img_id[0];
			?>

			<div class="wq-conteudo" style="background-image: url(<?php echo $wsg_servico_item_img_id; ?>);">
				<div class="wq-container">
					<div class="wq-flex">
						<figure>
							<?php
								$wsg_servico_item_icone_id = get_post_meta( get_the_ID(), 'wsg_servico_item_icone_id', true );
								getImageThumb($wsg_servico_item_icone_id,'180x180');
							?>
						</figure>
						<div class="wq-texto">
							<h3><?php the_title(); ?></h3>
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_item_conteudo', true )); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } wp_reset_query(); ?>
	</section>

<?php get_footer(); ?>