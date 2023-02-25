<?php

	add_action( 'cmb2_admin_init', 'metaboxes_trabalhos' );

	function metaboxes_trabalhos() {
		$trabalhos_item = new_cmb2_box( array(
			'id'            => 'trabalhos_item',
			'title'         => __( 'Detalhes deste trabalho' ),
			'object_types'  => array( 'trabalhos', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$trabalhos_item->add_field( array(
			'name'       => __( 'Link do vídeo' ),
			'id'         => 'wsg_trabalhos_item_video',
			'type'       => 'text',
		) );
		$trabalhos_item->add_field( array(
			'name'       => __( 'conteúdo do trabalho' ),
			'id'         => 'wsg_trabalhos_item_conteudo',
			'type'       => 'wysiwyg',
		) );

	}

?>