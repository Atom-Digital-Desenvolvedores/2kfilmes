<?php

	add_action( 'cmb2_admin_init', 'metaboxes_contato' );

	function metaboxes_contato() {

		// Método de especificação de página
		$contato_Page = get_page_by_path( 'contato', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($contato_Page && $contato_Page->ID != $post_id){
			return;
		}

		// Metabox Contato
		$contato_01 = new_cmb2_box( array(
			'id'            => 'contato_01',
			'title'         => __( 'Contatos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$contato_01->add_field( array(
			'name'       => __( 'Ícone do fomulário' ),
			'desc'       => __( 'Tamanho recomendado <strong>180x180</strong>' ),
			'id'         => 'wsg_contato_01_img',
			'type' => 'file',
			'preview_size' => array( 180/1, 180/1 ),
			'query_args' => array( '4type' => 'image' ),
		) );

		$contato_01->add_field( array(
			'name'       => __( 'Texto abaixo do ícone' ),
			'id'         => 'wsg_contato_01_texto',
			'type'       => 'text',
		) );
		$contato_01_items = $contato_01->add_field( array(
			'id'            => 'contato_01_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );

		$contato_01->add_group_field( $contato_01_items, array(
			'name'       => __( 'Imagem do item' ),
			'desc'       => __( 'Tamanho recomendado <strong>80x80</strong>' ),
			'id'         => 'wsg_contato_01_items_img',
			'type' => 'file',
			'preview_size' => array( 80/1, 80/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$contato_01->add_group_field( $contato_01_items, array(
			'name'       => __( 'Titulo do item' ),
			'id'         => 'wsg_contato_01_items_titulo',
			'type'       => 'text',
		) );
		$contato_01->add_group_field( $contato_01_items, array(
			'name'       => __( 'texto do item' ),
			'id'         => 'wsg_contato_01_items_texto',
			'type'       => 'textarea',
		) );
		$contato_01->add_group_field( $contato_01_items, array(
			'name'       => __( 'Link do item' ),
			'id'         => 'wsg_contato_01_items_link',
			'type'       => 'text',
		) );


		// Metabox contato_recaptcha
		$contato_recaptcha = new_cmb2_box( array(
			'id'            => 'contato_recaptcha',
			'title'         => __( 'Recaptcha' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Configurações do ReCaptcha' ),
			'desc'			=> __( 'Essas configurações não são obrigatórias, porém recomendadas para evitar ataques.' ),
			'id'			=> 'wsg_contato_recaptcha_titulo',
			'type'			=> 'title',
		) );

		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Secret Key' ),
			'id'			=> 'wsg_contato_secret_key',
			'type'			=> 'textarea',
		) );
		$contato_recaptcha->add_field( array(
			'name'			=> __( 'Código WidGet - (Site Key)' ),
			'id'			=> 'wsg_contato_widget',
			'type'			=> 'textarea',
		) );


	}

?>