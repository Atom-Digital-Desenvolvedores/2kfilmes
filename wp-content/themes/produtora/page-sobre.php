<?php
	get_header();

	$id_sobre = get_page_by_path( 'sobre', OBJECT, 'page' )->ID;
?>

	<section class="wq-breadcrumb">
		<div class="wq-container">
			<h1><?php the_title(); ?></h1>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				}
			?>
		</div>
	</section>

	<section class="wq-01 wq-01-sobre">
		<div class="wq-container">
			<div class="wq-texto">
				<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_sobre, 'wsg_sobre_01_titulo', true ); ?></h2>
				<?php echo wpautop(get_post_meta( $id_sobre, 'wsg_sobre_01_conteudo', true )); ?>
			</div>
		</div>
	</section>

	<section class="wq-01-empresa">
		<div class="wq-container">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_sobre, 'wsg_sobre_02_titulo', true ); ?></h3>
			<div class="wq-flex">
				<?php
					$arrayQueryEquipe = array(
						'post_type'				=> array( 'equipe' ),
						'posts_per_page'		=> '-1',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					);
					$queryEquipe = new WP_Query($arrayQueryEquipe);
					while ( $queryEquipe->have_posts()) {
						$queryEquipe->the_post();
				?>
					<div class="wq-box_3 wq-box_cp-12f wq-box_cl-6 wq-box_tp-6">
						<div class="wq-padding">
							<figure>
								<?php
									$wsg_equipe_item_img_id = get_post_meta( get_the_ID(), 'wsg_equipe_item_img_id', true );
									getImageThumb($wsg_equipe_item_img_id,'223x400');
								?>
							</figure>
						</div>
						<div class="wq-conteudo">
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_post_meta( get_the_ID(), 'wsg_equipe_item_cargo', true ); ?></p>
							<ul class="wq-lista-inline wq-midias-sociais">
								<?php
									$entries = get_post_meta( get_the_ID(), 'equipe_redes_sociais', true );

									foreach ( (array) $entries as $key => $entry ) {

										if ( isset( $entry['wsg_equipe_redes_sociais_icone'] ) ) {
											$wsg_equipe_redes_sociais_icone = $entry['wsg_equipe_redes_sociais_icone'];
										}
										if ( isset( $entry['wsg_equipe_redes_sociais_link'] ) ) {
											$wsg_equipe_redes_sociais_link = $entry['wsg_equipe_redes_sociais_link'];
										}
								?>
									<li><a href="<?php echo $wsg_equipe_redes_sociais_link ?>" target="_blank" class="flaticon-<?php echo $wsg_equipe_redes_sociais_icone; ?>"></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

	<section class="wq-02-empresa">
		<div class="wq-container">
			<div class="wq-flex">
				<?php
					$entries = get_post_meta( $id_sobre, 'sobre_03_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_sobre_03_items_img_id'] ) ) {
							$wsg_sobre_03_items_img_id = $entry['wsg_sobre_03_items_img_id'];
						}
						if ( isset( $entry['wsg_sobre_03_items_titulo'] ) ) {
							$wsg_sobre_03_items_titulo = $entry['wsg_sobre_03_items_titulo'];
						}
						if ( isset( $entry['wsg_sobre_03_items_texto'] ) ) {
							$wsg_sobre_03_items_texto = $entry['wsg_sobre_03_items_texto'];
						}
				?>
					<div class="wq-box_4 wq-box_cp-12f wq-box_cl-6 wq-box_tp-6">
						<figure>
							<?php getImageThumb($wsg_sobre_03_items_img_id,'80x80') ?>
						</figure>
						<div class="wq-texto">
							<h2><?php echo $wsg_sobre_03_items_titulo; ?></h2>
							<p><?php echo wpautop($wsg_sobre_03_items_texto); ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>