<?php

// Meus posts types
	function meus_post_types(){

		// Serviços
		register_post_type('equipe',
			array(
				'labels' 			=> array(
					'name' 			=> __('Equipe'),
					'singular_name' => __('membro')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-groups',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);
		// Serviços
		register_post_type('servicos',
			array(
				'labels' 			=> array(
					'name' 			=> __('Serviços'),
					'singular_name' => __('serviço')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);
		// Serviços
		register_post_type('trabalhos',
			array(
				'labels' 			=> array(
					'name' 			=> __('Trabalhos'),
					'singular_name' => __('trabalho')
				),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>