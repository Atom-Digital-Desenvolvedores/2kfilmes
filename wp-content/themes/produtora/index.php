<?php
	get_header();

	$id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<?php
		$wsg_banner_items_img_id = get_post_meta($id_home, 'wsg_banner_items_img_id', true);
		$wsg_banner_items_img_id = wp_get_attachment_image_src($wsg_banner_items_img_id, '1920x740');
		$wsg_banner_items_img_id = $wsg_banner_items_img_id[0];
	?>

	<div class="wq-banner">
		<video width="100%" height="100%" poster="" preload="auto" loop="" autoplay="" muted="">
			<source src="<?php bloginfo('template_url'); ?>/img/video-abertura.m4v" type="video/mp4">
		</video>
		<div class="wq-detalhe">
			<div class="wq-logo">
				<span class="esq-top"></span>
				<span class="esq-bottom"></span>
				<span class="dir-top"></span>
				<span class="esq-top"></span>
				<span class="dir-bottom"></span>
				<figure class="wq-logo-empresa">
					<img src="<?php bloginfo('template_url'); ?>/img/logo-banner.png" alt="<?php echo get_post_meta( $id_home, 'wsg_banner_items_btn_texto', true ); ?>" title="<?php echo get_post_meta( $id_home, 'wsg_banner_items_btn_texto', true ); ?>">
				</figure>

				<div class="wq-cto">
					<h2 class="wq-titulo_banner"><?php echo get_post_meta( $id_home, 'wsg_banner_items_titulo', true ); ?></h2>
					<h3 class="wq-desc_banner"><?php echo get_post_meta( $id_home, 'wsg_banner_items_subtitulo', true ); ?></h3>
					<div class="wq-play">
						<a data-lity href="<?php echo get_post_meta( $id_home, 'wsg_banner_items_btn_link', true ) ?>">
							<figure>
								<img src="<?php bloginfo('template_url'); ?>/img/play.svg" alt="<?php echo get_post_meta( $id_home, 'wsg_banner_items_btn_texto', true ); ?>" title="<?php echo get_post_meta( $id_home, 'wsg_banner_items_btn_texto', true ); ?>">
							</figure>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<section class="wq-01" id="sobre">
		<div class="wq-container">
			<div class="wq-texto">
				<h2 class="wq-titulo_1"><?php echo get_post_meta( $id_home, 'wsg_sobre_titulo', true ); ?></h2>
				<?php echo wpautop(get_post_meta( $id_home, 'wsg_sobre_conteudo', true )); ?>
			</div>
		</div>
	</section>

	<section class="wq-02">

		<?php
			$wsg_galeria_1_imgs = get_post_meta( $id_home, 'wsg_galeria_1_imgs', true );

			$countImgs == count($wsg_galeria_1_imgs);

			echo '<div class="wq-flex">';

			foreach ( (array) $wsg_galeria_1_imgs as $galeria_1_img_id => $galeria_1_img_url ) {
				$countImgs++;
		?>

				<div class="wq-galeria-item">
					<a href="javascript:void(0)">
						<figure>
							<?php getImageThumb( $galeria_1_img_id, '900x374' ); ?>
						</figure>
					</a>
				</div>

		<?php
				if ($countImgs == 3) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 6) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 9) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 12) {
					echo '</div><div class="wq-flex">';
				}
			}

		?>
		</div>
	</section>

	<section class="wq-03" id="o-que-fazemos">
		<div class="wq-titulo">
			<div class="wq-container">
				<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_home, 'wsg_servicos_titulo', true ); ?></h3>
			</div>
		</div>
		<?php
			$arrayQueryServicos = array(
				'post_type'				=> array( 'servicos' ),
				'posts_per_page'		=> '7',
				'tax_query' => array(
					array(
						'taxonomy'		=> 'is_home_servicos',
						'field'			=> 'slug',
						'terms'			=> array( 'sim'),
					)
				),
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
					<a href="<?php the_permalink(); ?>">
					<div class="wq-flex">
						<figure>
							<?php
								$wsg_servico_item_icone_id = get_post_meta( get_the_ID(), 'wsg_servico_item_icone_id', true );
								getImageThumb($wsg_servico_item_icone_id,'180x180');
							?>
						</figure>
						<div class="wq-texto">
							<h3><?php the_title(); ?></h3>
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_item_resumo', true )) ?>
						</div>
					</div>
					</a>
				</div>
			</div>
		<?php } wp_reset_query(); ?>
	</section>

	<?php
		$wsg_servicos_img_id = get_post_meta($id_home, 'wsg_servicos_img_id', true);
		$wsg_servicos_img_id = wp_get_attachment_image_src($wsg_servicos_img_id, '2000x1500');
		$wsg_servicos_img_id = $wsg_servicos_img_id[0];
	?>
	<section class="wq-04 parallax-window" data-parallax="scroll" data-image-src="<?php echo $wsg_servicos_img_id; ?>">
	</section>

	<section class="wq-05" id="trabalhos">
		<div class="wq-limite">
			<h3 class="wq-titulo_1"><?php echo get_post_meta( $id_home, 'wsg_trabalhos_titulo', true ); ?></h3>
			<div class="wq-flex">
				<?php
					$arrayQueryTrabalhos = array(
						'post_type'				=> array( 'trabalhos' ),
						'posts_per_page'		=> '9',
						'tax_query' => array(
							array(
								'taxonomy'		=> 'is_home_trabalhos',
								'field'			=> 'slug',
								'terms'			=> array( 'sim'),
							)
						),
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
			<a href="<?php bloginfo('url'); ?>/trabalhos" class="wq-btn_1">MOSTRAR TODOS</a>
		</div>
	</section>

	<div class="wq-06">
		<?php
			$wsg_galeria_2_imgs = get_post_meta( $id_home, 'wsg_galeria_2_imgs', true );

			$countImgs == count($wsg_galeria_2_imgs);

			echo '<div class="wq-flex">';

			foreach ( (array) $wsg_galeria_2_imgs as $galeria_2_img_id => $galeria_2_img_url ) {
				$countImgs++;
		?>

			<div class="wq-galeria-item">
				<a href="javascript:void(0)">
					<figure>
						<?php getImageThumb( $galeria_2_img_id, '900x374' ); ?>
					</figure>
				</a>
			</div>

		<?php
				if ($countImgs == 3) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 6) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 9) {
					echo '</div><div class="wq-flex">';
				}
				if ($countImgs == 12) {
					echo '</div><div class="wq-flex">';
				}
			}

		?>
		</div>
	</div>

<?php get_footer(); ?>