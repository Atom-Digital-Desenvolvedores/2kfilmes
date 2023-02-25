<?php
	get_header();

	$id_trabalhos = get_page_by_path( 'slug-trabalhos', OBJECT, 'page' )->ID;
?>
	<section class="wq-01-servicos">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-texto trabalhos">
					<p>Filmes executados/criados por nós juntamente com nossos clientes para anunciantes que veicularam na Tv, internet ou em eventos corporativos.</p>
				</div>
				<div class="wq-titulo">
					<h1><?php echo get_page_by_path( 'slug-trabalhos', OBJECT, 'page' )->post_title; ?></h1>
						<?php
							if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
							}
						?>
				</div>
			</div>
		</div>
	</section>

	<!---<section class="wq-breadcrumb">
		<div class="wq-container">
			<h1><?php echo get_page_by_path( 'slug-trabalhos', OBJECT, 'page' )->post_title; ?></h1>
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
				}
			?>
		</div>
	</section>-->

	<section class="wq-05">
		<div class="wq-limite">
			<div class="wq-flex">
				<div class="wq-flex">
				<?php
					$arrayQueryTrabalhos = array(
						'post_type'				=> array( 'trabalhos' ),
						'posts_per_page'		=> '-1',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					);
					$queryTrabalhos = new WP_Query($arrayQueryTrabalhos);
					while ( $queryTrabalhos->have_posts()) {
						$queryTrabalhos->the_post();
				?>
					<div class="wq-box_4 wq-box_cp-12f wq-box_cl-6f wq-box_tp-6f wq-box_tl-6">
						<div class="wq-video">
							<?php
								$wsg_trabalhos_item_video = get_post_meta( get_the_ID(), 'wsg_trabalhos_item_video', true );
								$wsg_trabalhos_item_video = strip_tags(str_replace(array('https://vimeo.com/'), array(''), $wsg_trabalhos_item_video));
								if ($wsg_trabalhos_item_video != null && strlen($wsg_trabalhos_item_video) > 0) {
							?>
								<iframe src="https://player.vimeo.com/video/<?php echo $wsg_trabalhos_item_video ?>" width="640" height="360" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							<?php
								}
							?>
						</div>
						<h2><?php the_title(); ?></h2>
						<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_trabalhos_item_conteudo', true )); ?>
					</div>
				<?php } ?>
			</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>