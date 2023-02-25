<?php
	get_header();

	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
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

	<section class="wq-01-contato">
		<div class="wq-container">
			<div class="wq-flex">
				<div class="wq-box_5f wq-box_cp-12f">
					<div class="wq-conteudo">
						<figure>
							<?php
								$wsg_contato_01_img_id = get_post_meta( $id_contato, 'wsg_contato_01_img_id', true );
								getImageThumb($wsg_contato_01_img_id,'180x180');
							?>
						</figure>
						<h4><?php echo get_post_meta( $id_contato, 'wsg_contato_01_texto', true ) ?></h4>
					</div>
				</div>
				<div class="wq-box_7f wq-box_cp-12f">
					<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

						<input type="hidden" name="subject_email" value="Enviado pelo site">
						<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página de contato">

						<input type="hidden" name="label-send-data-name" value="Nome: ">
						<input type="text" name="send-data-name" placeholder="Qual é o seu nome?" required>

						<input type="hidden" name="label-send-data-email" value="Email: ">
						<input type="email" name="send-data-email" placeholder="Qual é o seu email?" required>

						<input type="hidden" name="label-send-data-phone" value="Telefone: ">
						<input type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone" required>


						<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>

						<button type="submit" class="wq-btn_1">
							Enviar
							<span class="flaticon-arrow-right"></span>
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-02-contato">
		<div class="wq-container">
			<div class="wq-flex">
				<?php
					$entries = get_post_meta( $id_contato, 'contato_01_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						$wsg_contato_01_items_texto = null;

						if ( isset( $entry['wsg_contato_01_items_img_id'] ) ) {
							$wsg_contato_01_items_img_id = $entry['wsg_contato_01_items_img_id'];
						}
						if ( isset( $entry['wsg_contato_01_items_titulo'] ) ) {
							$wsg_contato_01_items_titulo = $entry['wsg_contato_01_items_titulo'];
						}
						if ( isset( $entry['wsg_contato_01_items_texto'] ) ) {
							$wsg_contato_01_items_texto = $entry['wsg_contato_01_items_texto'];
						}
						if ( isset( $entry['wsg_contato_01_items_link'] ) ) {
							$wsg_contato_01_items_link = $entry['wsg_contato_01_items_link'];
						}

						if (strlen($wsg_contato_01_items_link) > 0) {
				?>
					<div class="wq-box_6 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f">
						<a href="<?php echo $wsg_contato_01_items_link; ?>" class="wq-conteudo">
							<div class="wq-flex">
								<div class="wq-box_3 wq-box_cp-12f">
									<figure>
										<?php getImageThumb($wsg_contato_01_items_img_id,'80x80') ?>
									</figure>
								</div>
								<div class="wq-box_9 wq-box_cp-12f">
									<h3><?php echo $wsg_contato_01_items_titulo; ?></h3>
									<?php if ( $wsg_contato_01_items_texto != null && strlen($wsg_contato_01_items_texto) > 0 ) { ?>
										<p><?php echo $wsg_contato_01_items_texto; ?></p>
									<?php } ?>
								</div>
							</div>
						</a>
					</div>
				<?php } else{ ?>
					<div class="wq-box_6 wq-box_cp-12f wq-box_cl-12f wq-box_tp-12f">
						<div class="wq-conteudo">
							<div class="wq-flex">
								<div class="wq-box_3 wq-box_cp-12f">
									<figure>
										<?php getImageThumb($wsg_contato_01_items_img_id,'80x80') ?>
									</figure>
								</div>
								<div class="wq-box_9 wq-box_cp-12f">
									<h3><?php echo $wsg_contato_01_items_titulo; ?></h3>
									<?php if ( $wsg_contato_01_items_texto != null && strlen($wsg_contato_01_items_texto) > 0 ) { ?>
										<p><?php echo $wsg_contato_01_items_texto; ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
	</section>


<?php get_footer(); ?>