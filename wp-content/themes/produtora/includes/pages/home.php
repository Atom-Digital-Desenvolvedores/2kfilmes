<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banner' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner->add_field( array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x740</strong>' ),
			'id'         => 'wsg_banner_items_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 740/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$banner->add_field( array(
			'name'       => __( 'Título do banner' ),
			'id'         => 'wsg_banner_items_titulo',
			'type'       => 'text',
		) )
		;$banner->add_field( array(
			'name'       => __( 'Subtítulo do banner' ),
			'id'         => 'wsg_banner_items_subtitulo',
			'type'       => 'text',
		) );
		$banner->add_field( array(
			'name'       => __( 'Link do vídeo' ),
			'id'         => 'wsg_banner_items_btn_link',
			'type'       => 'text',
		) );
		// Metabox Sobre
		$sobre = new_cmb2_box( array(
			'id'            => 'sobre',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_titulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'Resumo sobre nós' ),
			'id'         => 'wsg_sobre_conteudo',
			'type'       => 'wysiwyg',
		) );


		// Metabox Galeria
		$galeria_1 = new_cmb2_box( array(
			'id'            => 'galeria_1',
			'title'         => __( 'Galeria 1' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$galeria_1->add_field( array(
			'name'       => __( 'Imagens' ),
			'desc'       => __( 'Tamanho recomendado <strong>1000x580</strong>' ),
			'id'         => 'wsg_galeria_1_imgs',
			'type' => 'file_list',
			'preview_size' => array( 1000/3, 580/3 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Listagem de serviços
		$servicos = new_cmb2_box( array(
			'id'            => 'servicos',
			'title'         => __( 'Listagem de serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$servicos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_titulo',
			'type'       => 'text',
		) );
		$servicos->add_field( array(
			'name'       => __( 'Imagem abaixo da listagem' ),
			'desc'       => __( 'Tamanho recomendado <strong>2000x1500</strong>' ),
			'id'         => 'wsg_servicos_img',
			'type' => 'file',
			'preview_size' => array( 2000/5, 1500/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Listagem de trabalhos
		$trabalhos = new_cmb2_box( array(
			'id'            => 'trabalhos',
			'title'         => __( 'Listagem de trabalhos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$trabalhos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_trabalhos_titulo',
			'type'       => 'text',
		) );


		// Metabox Últimas do blog
		$galeria_2 = new_cmb2_box( array(
			'id'            => 'galeria_2',
			'title'         => __( 'Galeria 2' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$galeria_2->add_field( array(
			'name'       => __( 'Imagens' ),
			'desc'       => __( 'Tamanho recomendado <strong>1000x580</strong>' ),
			'id'         => 'wsg_galeria_2_imgs',
			'type' => 'file_list',
			'preview_size' => array( 1000/3, 580/3 ),
			'query_args' => array( 'type' => 'image' ),
		) );

	}

?>