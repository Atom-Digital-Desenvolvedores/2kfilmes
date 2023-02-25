<?php
/* WIDGETS */

// if (function_exists('register_sidebar'))
// {
//     register_sidebar(array(
//         'name'          => 'Sidebar',
//         'before_widget' => '<div class="widget">',
//         'after_widget'  => '</div>',
//         'before_title'  => '<h3>',
//         'after_title'   => '</h3>',
//     ));
// }
function arphabet_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar do blog',
		'id'            => 'sidebar_blog',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
	/** /
	register_sidebar( array(
		'name'          => 'Sidebar de benefícios',
		'id'            => 'sidebar_beneficios',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
	register_sidebar( array(
		'name'          => 'Sidebar de eventos',
		'id'            => 'sidebar_eventos',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
	register_sidebar( array(
		'name'          => 'Sidebar de capacitações',
		'id'            => 'sidebar_capacitacao',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	));
	/**/
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

Class WQ_Widget_Search extends WP_Widget_Search {
	function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : "";
		?>
				<div class="wsg-buscar">
					<form method="get" action="<?php echo home_url(); ?>">
						<input type="text" placeholder="<?php echo $title; ?>" name="s">
						<button type="submit" class="flaticon-search-1"></button>
					</form>
				</div>
		<?php
	}
}



/**/
Class WQ_Widget_Recent_Posts extends WP_Widget_Recent_Posts {
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>

	<div class="wsg-posts-popular">
		<?php echo $args['before_widget']; ?>
		<h3>
		<?php if ( $title ) {
			echo $title;
		} ?>
		</h3>
		<?php $itens = 0; while ( $r->have_posts() ) : $r->the_post();
				$attachID = get_post_thumbnail_id(get_the_ID());
				$author_id = get_post_field ('post_author', get_the_ID());
				$display_name = get_the_author_meta( 'first_name' , $author_id );
				if ($itens == $number) {
					break;
				}
				$itens++;
			?>

				<a href="<?php the_permalink(); ?>">
					<h2><?php get_the_title() ? the_title() : the_ID(); ?></h2>
					<span><?php echo get_the_date('d', $item->ID); ?> de <?php echo get_the_date('F', $item->ID); ?> de <?php echo get_the_date('Y', $item->ID); ?></span>
				</a>

		<?php endwhile; ?>
		<?php echo $args['after_widget']; ?>
	</div>


		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}


/*
    function widget( $args, $instance ) {
	?>
			<div class="wq-leia">
				<h4>Leia Também</h4>
				<?php
					$args = array (
						'post_type'         => 'post',
						'posts_per_page'    => 4
					);
					$query = new WP_Query( $args );
					$posts = $query->get_posts();
					foreach ($posts as $key => $post) {
						$attachID = get_post_thumbnail_id( $post->ID );
						$author_id=$post->post_author;
						?>
							<div class="wq-conteudo">
								<figure>
									<?php getImageThumb($attachID, 'img-blog-list-sidebar'); ?>
								</figure>
								<div class="wq-texto">
									<p class="data"><?php echo get_the_date('d.m.Y', $post->ID); ?> | Por: <span class="autor"><?php echo get_the_author_meta('first_name', $author_id); ?></span></p>
									<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h2>
								</div>
							</div>
						<?php
					}
				?>
			</div>
	<?php
    }

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}
/**/

Class WQ_Widget_Tag_Cloud extends WP_Widget_Tag_Cloud {
    function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
	?>
		<div class="wsg-tags">
			<h3><?php echo $title; ?></h3>
			<ul class="wsg-lista-inline">
			<?php
				$tags = get_terms('post_tag', array(
					'hide_empty' => true,
				));
				foreach ($tags as $key => $tag) {
					?>
						<li><a href="<?php echo get_term_link( $tag->term_id, 'post_tag' ); ?>"><?php echo $tag->name; ?></a></li>
					<?php
				}
			?>
			</ul>
		</div>

	<?php
    }
}

/** /
class WQ_Widget_NewSletter extends WP_Widget
{
	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'wq_newsletter',
			// Widget name will appear in UI
			"NewSletter",
			// Widget description
			""
			// array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wq_newsletter_domain' ), )
		);
	}
	// Creating widget front-end

	public function widget( $args, $instance ) {
		$idContato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;
		$title = $instance['title'];
		$emails = $instance['emails'];

		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		// if ( ! empty( $title ) )

		$pos = strpos($title, "{NAME_PAGE}");
		if ($pos !== false) {
			$title = str_replace("{NAME_PAGE}", get_the_title(), $title);
			$title = mb_strtoupper($title);
		}
		// This is where you run the code and display the output
		// echo __( 'Hello, World!', 'wq_newsletter_domain' );
		?>
			<div class="wq-inscricao_box">
				<?php
					if (is_singular('eventos192')) {
						if ($title !== NULL && strlen($title) > 0) {
							?>
								<figure>
									<img src="<?php bloginfo('template_url'); ?>/img/servico-sidebar.jpg" alt="" title="">
									<figcaption>
										<h3><?php echo $title; ?></h3>
									</figcaption>
								</figure>
							<?php
						}else{
							$date_hour_start_list_eventos = get_post_meta(get_the_ID(), 'date_hour_start_list_eventos', true);
							$date_hour_end_list_eventos = get_post_meta(get_the_ID(), 'date_hour_end_list_eventos', true);
							?>
								<div class="wq-data-hora">
									<h3><?php echo strftime('%d.%B', $date_hour_start_list_eventos); ?></h3>
									<p><?php echo date('H', $date_hour_start_list_eventos); ?>h - <?php echo date('H', $date_hour_end_list_eventos); ?>h</p>
								</div>
							<?php
						}
					}else{
						?>
							<figure>
								<img src="<?php bloginfo('template_url'); ?>/img/servico-sidebar.jpg" alt="" title="">
								<figcaption>
									<h3><?php echo $title; ?></h3>
								</figcaption>
							</figure>
						<?php
					}
				?>
				<form action="<?php bloginfo('template_url') ?>/send-mail-captcha.php" method="POST" class="contact-form">

					<input type="hidden" name="subject_email" value="Enviado pelo site">
					<input type="hidden" name="title_email" value="Newsletter enviado pelo site">

					<input type="hidden" name="email" value="<?php echo $emails; ?>">

					<input type="hidden" name="label-send-data-name" value="Nome">
					<input name="send-data-name" type="text" placeholder="Qual é o seu nome?">

					<?php if (!is_singular('eventos192')) { ?>
						<input type="hidden" name="label-send-data-business" value="Empresa">
						<input name="send-data-business" type="text" placeholder="Qual é o nome da sua empresa?">
					<?php } ?>

					<input type="hidden" name="label-send-data-email" value="Email">
					<input name="send-data-email" type="email" placeholder="Qual é o seu melhor email?">

					<input type="hidden" name="label-send-data-whatsapp" value="WhatsApp">
					<input name="send-data-whatsapp" type="text" placeholder="(62) 5555-5555" class="inputphone">

					<div class="wq-dir">
						<?php
							$idContato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;
							$code_recaptcha_form_contato_page = get_post_meta($idContato, 'code_recaptcha_form_contato_page', true);
							if ($code_recaptcha_form_contato_page !== NULL && strlen($code_recaptcha_form_contato_page) > 0) {
								?>
									<button id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" type="submit" class="wq-btn wq-btn_peq g-recaptcha invisible-recaptcha" data-sitekey="<?php echo $code_recaptcha_form_contato_page; ?>">
										<span>Enviar</span>
									</button>
								<?php
							}else{
								?>
									<button type="submit" class="wq-btn wq-btn_peq">
										<span>Enviar</span>
									</button>
								<?php
							}
						?>
					</div>
				</form>
			</div>
		<?php
		echo $args['after_widget'];
	}

	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'INSCREVA-SE', 'wq_newsletter_domain' );
		}
		if ( isset( $instance[ 'emails' ] ) ) {
			$emails = $instance[ 'emails' ];
		} else {
			$emails = "email@domain.com;email2@domain.com";
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'emails' ); ?>">Emails</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'emails' ); ?>" name="<?php echo $this->get_field_name( 'emails' ); ?>" type="text" value="<?php echo esc_attr( $emails ); ?>" />
		</p>
		<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['emails'] = ( ! empty( $new_instance['emails'] ) ) ? strip_tags( $new_instance['emails'] ) : '';
		return $instance;
	}
} // Class wq_newsletter ends here
/**/

Class WQ_Categories_Widget extends WP_Widget_Categories {
	function widget( $args, $instance ) {

		static $first_dropdown = true;

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$c = ! empty( $instance['count'] ) ? '1' : '0';
		$h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
		$d = ! empty( $instance['dropdown'] ) ? '1' : '0';

		echo $args['before_widget'];
		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => $c,
			'hierarchical' => $h,
		);
		?>
			<div class="wsg-categorias">
				<?php
					if ( $title ) {
						?>
							<h3><?php echo $title; ?></h3>
						<?php
					}
				?>
				<ul>
					<?php
						$cat_args['title_li'] = '';
						wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );
					?>
				</ul>
			</div>
		<?php
		echo $args['after_widget'];
	}
	/**
	 * Outputs the settings form for the Categories widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = sanitize_text_field( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy' ); ?></label></p>

		<?php
	}
}
/*
Class WQ_Categories_Widget extends WP_Widget_Categories {
    function widget( $args, $instance ) {
	?>
	<div class="wsg-listagem">
		<h3>Categorias</h3>
		<ul>
			<?php
				$tags = get_terms('category', array(
					'hide_empty' => true,
				));
				foreach ($tags as $key => $tag) {
					?>
						<li><a href="<?php echo get_term_link( $tag->term_id, 'category' ); ?>"><?php echo $tag->name; ?></a></li>
					<?php
				}
			?>
		</ul>
	</div>

	<?php
    }
}
*/

function my_categories_widget_register() {
	unregister_widget( 'WP_Widget_Search' );
	register_widget( 'WQ_Widget_Search' );

	unregister_widget( 'WP_Widget_Categories' );
	register_widget( 'WQ_Categories_Widget' );

	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'WQ_Widget_Recent_Posts' );

	unregister_widget( 'WP_Widget_Tag_Cloud' );
	register_widget( 'WQ_Widget_Tag_Cloud' );

	//register_widget( 'WQ_Widget_NewSletter' );
}
add_action( 'widgets_init', 'my_categories_widget_register' );

function remove_calendar_widget() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	// unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	// unregister_widget('WP_Widget_Custom_HTML');
	// unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	// unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');

	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Audio');
	// unregister_widget('WP_Widget_Pages');
	// unregister_widget('WP_Widget_Calendar');
	// unregister_widget('WP_Widget_Archives');
	// unregister_widget('WP_Widget_Links');
	// unregister_widget('WP_Widget_Meta');
	// // unregister_widget('WP_Widget_Search');
	// unregister_widget('WP_Widget_Text');
	// // unregister_widget('WP_Widget_Categories');
	// unregister_widget('WP_Widget_Recent_Posts');
	// unregister_widget('WP_Widget_Recent_Comments');
	// unregister_widget('WP_Widget_RSS');
	// unregister_widget('WP_Widget_Tag_Cloud');
	// unregister_widget('WP_Nav_Menu_Widget');
}
add_action( 'widgets_init', 'remove_calendar_widget' );
/*
'wp_widget_pages',
70	        'wp_widget_pages_control',
71	        'wp_widget_calendar',
72	        'wp_widget_calendar_control',
73	        'wp_widget_archives',
74	        'wp_widget_archives_control',
75	        'wp_widget_links',
76	        'wp_widget_meta',
77	        'wp_widget_meta_control',
78	        'wp_widget_search',
79	        'wp_widget_recent_entries',
80	        'wp_widget_recent_entries_control',
81	        'wp_widget_tag_cloud',
82	        'wp_widget_tag_cloud_control',
83	        'wp_widget_categories',
84	        'wp_widget_categories_control',
85	        'wp_widget_text',
86	        'wp_widget_text_control',
87	        'wp_widget_rss',
88	        'wp_widget_rss_control',
89	        'wp_widget_recent_comments',
90	        'wp_widget_recent_comments_control'
*/
?>