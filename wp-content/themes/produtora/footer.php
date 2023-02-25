<?php
	$id_admin = get_page_by_path( 'slug-outras-info', OBJECT, 'adminpanel' )->ID;
	$id_sobre = get_page_by_path( 'empresa', OBJECT, 'page' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<footer class="wq-footer" id="wq-footer">
		<div class="wq-footer_top">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-box_5 wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
						<h2>Entre em contato com a gente.</h2>
					</div>
					<div class="wq-box_6 wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
						<div class="wq-texto">
							<ul class="wq-midias-sociais wq-lista-inline">
								<?php
									$arrayQuery_Midias_Sociais = array(
										'post_type'				=> array( 'redes_sociais' ),
										'posts_per_page'		=> '-1',
										'orderby' => 'menu_order',
										'order' => 'ASC',
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
							<?php if (is_home()){ ?>
								<h1>2K Filmes Ltda</h1>
							<?php } else{ ?>
								<h4>2K Filmes Ltda</h4>
							<?php } ?>
							<p><?php echo get_post_meta( $id_endereco, 'wsg_endereco', true ) ?></p>
							<p>Tel:
								<?php
									$wsg_telefone_nmrs = get_post_meta( $id_telefones, 'wsg_telefone_nmrs', true );
									foreach ( (array) $wsg_telefone_nmrs as $key => $telefone_nmr ) {
								?>
									<a href="tel:<?php echo strip_tags(str_replace(array(' ', '-'), array('', ''), $telefone_nmr)); ?>"><?php echo $telefone_nmr; ?></a>
								<?php } ?>
							</p>
							<p>
								<?php
									$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
									foreach ( (array) $wsg_emails as $key => $email ) {
								?>
									<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								<?php } ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wq-footer_bottom" id="wq-contato">
			<div class="wq-container">
				<div class="wq-flex">
					<div class="wq-box_6 wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
						<div class="wq-conteudo">
							<figure>
								<img src="<?php bloginfo('template_url'); ?>/img/phone-footer.png" alt="Temos uma equipe de profissionais para te atender" title="Temos uma equipe de profissionais para te atender">
							</figure>
							<h3>Temos uma equipe de profissionais para te atender</h3>
						</div>
					</div>
					<div class="wq-box_6  wq-box_5 wq-box_cp-12 wq-box_cl-12 wq-box_tp-6 wq-box_tl-6">
						<div class="wq-conteudo">
							<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

								<input type="hidden" name="subject_email" value="Enviado pelo site">
								<input required type="hidden" name="title_email" value="Contato enviado pelo formulário do rodapé do site.">

								<input type="hidden" name="label-send-data-name" value="Nome: ">
								<input type="text" name="send-data-name" placeholder="Qual é o seu nome?" required>

								<input type="hidden" name="label-send-data-email" value="Email: ">
								<input type="email" name="send-data-email" placeholder="Qual é o seu email?" required>

								<input type="hidden" name="label-send-data-phone" value="Telefone: ">
								<input type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone" required>

								<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>

								<button type="submit">ENVIAR</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- mapa -->
		<div class="wq-mapa">
			<div id="mapGoogle" style="height: 530px;width: 100%;"></div>
		</div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjXdeHFmj4yy3BfWr1WqNgIkohPDflg6w&callback=initMap" async defer></script>
		<!-- <div class="wq-mapa">
			<div class="map-contact" style="height: 530px;width: 100%;" data-latitude="-16.714050" data-longitude="-49.270818"></div>
		</div> -->
		<div class="wq-copyright">
			<p>Copyright © 2K Filmes Ltda. Website programado por <a target="_blank" href="http://www.harpiapropaganda.com.br/">Harpia propaganda</a>. Todos os direitos reservados. </p>
		</div>
	</footer>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'script_analytics', true );
	?>

	<script src="<?php bloginfo('template_url') ?>/js/aos.js"></script>
	<script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
    </script>

	<script src="<?php bloginfo('template_url') ?>/js-template/footer-load.js"></script>

	<?php wp_footer(); ?>

</body>
</html>
