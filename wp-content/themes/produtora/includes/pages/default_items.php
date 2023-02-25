<?php
	function create_posttype_paginas() {
		/*
			$the_query = new WP_Query(array( 'post_type' => 'gerais', 'posts_per_page' => -1 , 'field' => 'ids'));
			echo $the_query->post_count;
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo get_the_ID() . ', ';
				wp_delete_post( get_the_ID() );
			}
		return;
		*/
		if(!get_page_by_path( 'home', OBJECT, 'page' )){
			$dataToInsert = array(
				'post_title'	=> 'Home',
				'post_name'		=> 'home',
				'post_status'	=> 'publish',
				'post_type'		=> 'page'
			);
			$postRecordID = wp_insert_post($dataToInsert);
		}
		if(!get_page_by_path( 'sobre', OBJECT, 'page' )){
			$dataToInsert = array(
				'post_title'	=> 'Sobre',
				'post_name'		=> 'sobre',
				'post_status'	=> 'publish',
				'post_type'		=> 'page'
			);
			$postRecordID = wp_insert_post($dataToInsert);
		}
		if(!get_page_by_path( 'o-que-fazemos', OBJECT, 'page' )){
			$dataToInsert = array(
				'post_title'	=> 'O que fazemos',
				'post_name'		=> 'o-que-fazemos',
				'post_status'	=> 'publish',
				'post_type'		=> 'page'
			);
			$postRecordID = wp_insert_post($dataToInsert);
		}
		if(!get_page_by_path( 'slug-trabalhos', OBJECT, 'page' )){
			$dataToInsert = array(
				'post_title'	=> 'Trabalhos',
				'post_name'		=> 'slug-trabalhos',
				'post_status'	=> 'publish',
				'post_type'		=> 'page'
			);
			$postRecordID = wp_insert_post($dataToInsert);
		}
		if(!get_page_by_path( 'contato', OBJECT, 'page' )){
			$dataToInsert = array(
				'post_title'	=> 'Contato',
				'post_name'		=> 'contato',
				'post_status'	=> 'publish',
				'post_type'		=> 'page'
			);
			$postRecordID = wp_insert_post($dataToInsert);
		}
	}
	// Hooking up our function to theme setup
	add_action( 'init', 'create_posttype_paginas' );
?>
