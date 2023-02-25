<?php

	// tamanhos dinâmicos para thumbs
	function tamanhos_thumbs(){

		// Ativando suporte para imagem destacada
		add_theme_support('post-thumbnails');
		add_image_size( '2000x1500', 2000, 1500, true );
		add_image_size( '1920x740', 1920, 740, true );
		add_image_size( '1920x310', 1920, 310, true );
		add_image_size( '1000x580', 1000, 580, true );
		add_image_size( '900x374', 900, 374, true );
		add_image_size( '680x574', 680, 574, true );
		add_image_size( '645x266', 645, 266, true );
		add_image_size( '312x184', 312, 184, true );
		add_image_size( '223x400', 223, 400, true );
		add_image_size( '180x180', 180, 180, true );
		add_image_size( '100x100', 100, 100, true );
		add_image_size( '80x80', 80, 80, true );
	}
	add_action('after_setup_theme', 'tamanhos_thumbs');



?>