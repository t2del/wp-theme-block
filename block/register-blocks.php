<?php
/**
 * We use WordPress's init hook to make sure
 * our blocks are registered early in the loading
 * process.
 *
 * @link https://developer.wordpress.org/reference/hooks/init/
 */
function register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( get_template_directory() . '/block/quote' );
    register_block_type( get_template_directory() . '/block/banner-slider' );
    register_block_type( get_template_directory() . '/block/hero-banner' );
    register_block_type( get_template_directory() . '/block/hero-banner-slider' );
    register_block_type( get_template_directory() . '/block/accordion' );
    register_block_type( get_template_directory() . '/block/tabs' );
    register_block_type( get_template_directory() . '/block/profile-slider' );
    register_block_type( get_template_directory() . '/block/counter-up' );
    register_block_type( get_template_directory() . '/block/blog-posts' );
}
// Here we call our register_acf_blocks() function on init.
add_action( 'init', 'register_acf_blocks' );


// Enqueue styles and scripts in the admin area
add_action('admin_enqueue_scripts', 'admin_enqueue');

function admin_enqueue() {
    global $pagenow;
    if (($pagenow === 'post.php' || $pagenow === 'post-new.php') && in_array(get_post_type(), ['page', 'post'])) {
        wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/css/admin_style.css', array());
		// wp_enqueue_style('fhg-style', ASSETS_PATH.'/less/block.css');
        wp_enqueue_script('glide-script', JS_PATH.'/tailwind/glide.js');
		wp_enqueue_script('tailwind-script', JS_PATH.'/tailwind/tailwind.js');
    }
}