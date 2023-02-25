	<?php
		$wsg_servico_item_bg_id = get_post_meta(get_the_ID(), 'wsg_servico_item_bg_id', true);
		$wsg_servico_item_bg_id = wp_get_attachment_image_src($wsg_servico_item_bg_id, '2000x1500');
		$wsg_servico_item_bg_id = $wsg_servico_item_bg_id[0];
	?>
	<section class="wq-04 parallax-window" data-parallax="scroll" data-image-src="<?php echo $wsg_servico_item_bg_id; ?>">
	</section>

	<section class="wq-02-servicos">
		<?php
			$wsg_servico_item_galeria = get_post_meta( get_the_ID(), 'wsg_servico_item_galeria', true );

			$countImgs == count($wsg_servico_item_galeria);

			echo '<div class="wq-flex">';

			foreach ( (array) $wsg_servico_item_galeria as $servico_item_galeria_img_id => $servico_item_galeria_img_url ) {
				$countImgs++;
		?>

			<div class="wq-galeria-item">
				<a href="javascript:void(0)">
					<figure>
						<?php getImageThumb( $servico_item_galeria_img_id, '900x374' ); ?>
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

	<sextion class="wq-01-servicos">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-texto">
					<?php echo wpautop( get_post_meta( get_the_ID(), 'wsg_servico_item_conteudo', true ) ); ?>
				</div>
				<div class="wq-titulo">
					<h1><?php echo get_post_meta( get_the_ID(), 'wsg_servico_item_titulo', true ); ?></h1>
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb('<p id="breadcrumbs">','</p>');
						}
					?>
				</div>
			</div>
		</div>
	</sextion>