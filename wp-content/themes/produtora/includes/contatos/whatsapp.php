<?php

	// add_action( 'cmb2_admin_init', 'metaboxes_whatsapp' );

	function metaboxes_whatsapp() {

		// Página de configurações da logo
		$page_atual = get_page_by_path( 'whatsapp', OBJECT, 'contatos' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($page_atual && $page_atual->ID != $post_id){
			return;
		}

		// Metabox cores principais
		$whatsapp = new_cmb2_box( array(
			'id'            => 'whatsapp',
			'title'         => __( 'Números' ),
			'object_types'  => array( 'contatos', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
		) );

		$whatsapp_items = $whatsapp->add_field( array(
			'id'			=> 'wsg_whatsapp_items',
			'type'			=> 'group',
			'options'       => array(
				'group_title'   => __( 'Número 0{#}' ),
				'add_button'    => __( 'Adicionar novo número' ),
				'remove_button' => __( 'Remover número' ),
			),
		) );

		$whatsapp->add_group_field($whatsapp_items, array(
			'name'			=> __( 'Número do whatsapp' ),
			'id'			=> 'wsg_whatsapp_nmr',
			'type'			=> 'text',
		) );

		$whatsapp->add_group_field($whatsapp_items, array(
			'name'			=> __( 'Link do whatsapp' ),
			'desc'			=> __( 'Este campo é editável para que você possa colocar um link diferente, exemplo link para rastreamento de lead.' ),
			'id'			=> 'wsg_whatsapp_link',
			'type'			=> 'textarea_small',
			'default'		=> 'https://api.whatsapp.com/send?1=pt_BR&phone=5562999999999'
		) );

	}

?>