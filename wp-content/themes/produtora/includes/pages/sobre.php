<?php

	add_action( 'cmb2_admin_init', 'metaboxes_sobre' );

	function metaboxes_sobre() {

		// Método de especificação de página
		$sobrePage = get_page_by_path( 'sobre', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($sobrePage && $sobrePage->ID != $post_id){
			return;
		}

		// Metabox Sobre nós
		$sobre_01 = new_cmb2_box( array(
			'id'            => 'sobre_01',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_01_titulo',
			'type'       => 'text',
		) );
		$sobre_01->add_field( array(
			'name'       => __( 'Conteudo sobre nós' ),
			'id'         => 'wsg_sobre_01_conteudo',
			'type'       => 'wysiwyg',
		) );


		// Metabox Listagem de equipe
		$sobre_02 = new_cmb2_box( array(
			'id'            => 'sobre_02',
			'title'         => __( 'Listagem de equipe' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre_02->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_02_titulo',
			'type'       => 'text',
		) );

		// Metabox Resumo do rodapé
		$sobre_03 = new_cmb2_box( array(
			'id'            => 'sobre_03',
			'title'         => __( 'Missão, Visão e Valores' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre_03_items = $sobre_03->add_field( array(
			'id'            => 'sobre_03_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );

		$sobre_03->add_group_field( $sobre_03_items, array(
			'name'       => __( 'Imagem do item' ),
			'desc'       => __( 'Tamanho recomendado <strong>80x80</strong>' ),
			'id'         => 'wsg_sobre_03_items_img',
			'type' => 'file',
			'preview_size' => array( 80/1, 80/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$sobre_03->add_group_field( $sobre_03_items, array(
			'name'       => __( 'Titulo do item' ),
			'id'         => 'wsg_sobre_03_items_titulo',
			'type'       => 'text',
		) );
		$sobre_03->add_group_field( $sobre_03_items, array(
			'name'       => __( 'texto do item' ),
			'id'         => 'wsg_sobre_03_items_texto',
			'type'       => 'wysiwyg',
		) );


	}

?>