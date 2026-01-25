<?php
	function denn_widgets_init() {
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Single Post - Sidebar', 'denn' ),
				'id'            => 'sidebar-single-post',
				'description'   => esc_html__( 'Add widgets here.', 'denn' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar( 
			array(
				'name'          => esc_html__( 'Blog Archive - Sidebar', 'denn' ),
				'id'            => 'sidebar-blog-archive',
				'description'   => esc_html__( 'Add widgets here.', 'denn' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		
	}
	add_action( 'widgets_init', 'denn_widgets_init' );