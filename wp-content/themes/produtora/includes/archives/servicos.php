<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes deste serviço' ),
			'object_types'  => array( 'servicos', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		// $servico_item->add_field( array(
		// 	'name'       => __( 'Modelo do serviço' ),
		// 	'desc'       => __( 'Por padrão a página usa o modelo 1.' ),
		// 	'id'         => 'wsg_servico_item_modelo',
		// 	'type'             => 'radio',
		// 	'show_option_none' => false,
		//     'options'          => array(
		//         'modelo1'	=> __( 'Modelo 1' ),
		//         'modelo2'	=> __( 'Modelo 2' ),
		//     ),
		// ) );

		$servico_item->add_field( array(
			'name'       => __( 'Ícone do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>180x180</strong>' ),
			'id'         => 'wsg_servico_item_icone',
			'type' => 'file',
			'preview_size' => array( 180/1, 180/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$servico_item->add_field( array(
			'name'       => __( 'imagem de fundo do serviço na listagem da home' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x310</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 310/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$servico_item->add_field( array(
			'name'       => __( 'imagem de fundo do serviço na interna' ),
			'desc'       => __( 'Tamanho recomendado <strong>2000x1500</strong>' ),
			'id'         => 'wsg_servico_item_bg',
			'type' => 'file',
			'preview_size' => array( 2000/5, 1500/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Galeria de imagens do serviço' ),
			'desc'       => __( 'Tamanho recomendado <strong>900x374</strong>' ),
			'id'         => 'wsg_servico_item_galeria',
			'type' => 'file_list',
			'preview_size' => array( 900/2, 374/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Resumo do serviço' ),
			'id'         => 'wsg_servico_item_resumo',
			'type'       => 'wysiwyg',
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Conteúdo do serviço' ),
			'id'         => 'wsg_servico_item_conteudo',
			'type'       => 'wysiwyg',
		) );
		$servico_item->add_field( array(
			'name'       => __( 'título ao lado do conteúdo do serviço' ),
			'id'         => 'wsg_servico_item_titulo',
			'type'       => 'text',
		) );

	}

?>