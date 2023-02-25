<?php

// Minhas taxonomies
	function minhas_taxonomies(){

		// Na home
		register_taxonomy( 'is_home_servicos', array( 'servicos' ), array(
			'hierarchical' => true,
			'label' => __( 'Colocar na home?' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'servicos/is_home_servicos',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => false,
					'edit_terms' => false,
					'delete_terms' => false,
				)
			)
		);
		// Na home
		register_taxonomy( 'is_home_trabalhos', array( 'trabalhos' ), array(
			'hierarchical' => true,
			'label' => __( 'Colocar na home?' ),
			'show_ui' => true,
			'show_in_tag_cloud' => false,
			'query_var' => true,
				'rewrite' => array(
					'slug' => 'trabalhos/is_home_trabalhos',
					'with_front' => true,
				),
				'capabilities' => array(
					'manage_terms' => false,
					'edit_terms' => false,
					'delete_terms' => false,
				)
			)
		);

	}
	add_action('init', 'minhas_taxonomies');

?>