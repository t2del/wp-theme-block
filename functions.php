<?php
	/**
	 * denn functions and definitions
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 	 * @package 	WordPress
 	 * @subpackage 	denn
 	 * @since 		denn 1.0
	 */
	
	define("INC_PATH", get_template_directory().'/includes');
    define("BLOCK_PATH", get_template_directory().'/block');
	define("ASSETS_PATH", get_template_directory_uri().'/assets');
	define("JS_PATH", ASSETS_PATH.'/js');
	define("CSS_PATH", ASSETS_PATH.'/css');
	define("IMAGES_PATH", ASSETS_PATH.'/images');
	
	/* ========================================================================================================================
	Required external files
	======================================================================================================================== */
	
	// Utilities
	//require_once INC_PATH.'/denn-utilities.php';
	
	// Register Menus
	function register_my_menus() {
	  register_nav_menus(
		array(
		  'header-menu' => __( 'Header Menu' ),
		  'footer-menu' => __( 'Footer Menu' )
		)
	  );
	}
	add_action( 'init', 'register_my_menus' );

	// Enqueue Scripts and Styles
	function denn_scripts() {
		wp_enqueue_style('theme-style', 		ASSETS_PATH.'/css/styles.css');
		wp_enqueue_style('theme-font-style', 	ASSETS_PATH.'/css/fontawesome-all.min.css');
		
		wp_enqueue_script('theme-script', 		JS_PATH.'/main.js');
		
		wp_enqueue_script('glide-script', 		JS_PATH.'/tailwind/glide.js');
		wp_enqueue_script('tailwind-script', 	JS_PATH.'/tailwind/tailwind.js');
		
    }
	add_action('wp_enqueue_scripts', 'denn_scripts');

	// Register Sidebar
	require INC_PATH.'/reg-sidebar.php';

	// Ajax Forms

	// Block Register
	require BLOCK_PATH.'/register-blocks.php';


	// Dequeue scripts
	require INC_PATH.'/dequeue-scripts.php';

		
	/* ========================================================================================================================
	Theme specific settings
	======================================================================================================================== */

	// Add support for Block Styles.
	//add_theme_support( 'wp-block-styles' );
	add_theme_support('post-thumbnails');
	add_theme_support( 'title-tag' );

	function themename_custom_logo_setup() {
		$defaults = array(
			'height'               => 70,
			'width'                => 300,
			'flex-height'          => true,
			'flex-width'           => true,			
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

	/* ========================================================================================================================
	Actions and Filters
	===============================================================================================================================================================================================================================================
	Author Scripts
	======================================================================================================================== */
	

// // //[get_layout layout="nav-bar" my_variable="some value" var1="some value" var2="some value"]
function include_layouts( $args ) {
    $path = get_stylesheet_directory_uri();
    $layout = isset( $args['layout'] ) ? 'layouts/' . $args['layout'] . '.php' : '';
    $check_file = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "{$layout}";

    $myVariable = isset( $args['my_variable'] ) ? $args['my_variable'] : '';
    $var1 = isset( $args['var1'] ) ? $args['var1'] : '';
    $var2 = isset( $args['var2'] ) ? $args['var2'] : '';

    ob_start();
    if ( ! empty( $layout ) && file_exists( $check_file ) ) {
        include $layout;
    } else {
        echo '<strong>Invalid Layout!</strong>';
    }
    return ob_get_clean();   
}
add_shortcode( 'get_layout', 'include_layouts' );

function debug( $x ){
    echo '<pre>';
    var_dump($x);
    echo '</pre>';
}



function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );


// Add custom class to menu li items
function so_37823371_menu_item_class( $classes, $item, $args, $depth ){
    $classes[] = 'cs-li relative group';
    return $classes;
}
add_filter( 'nav_menu_css_class', 'so_37823371_menu_item_class', 10, 4 );


// Add custom class to menu a items
function add_menu_link_class( $atts, $item, $args, $depth ) {
    $atts['class'] = 'flex items-center gap-2 py-2 transition-colors duration-300 hover:text-emerald-500 focus:text-emerald-600 focus:outline-none focus-visible:outline-none lg:px-4'; // Add your custom class name here
    // Append to existing classes if necessary, instead of overwriting
    // $atts['class'] = (!empty($atts['class'])) ? $atts['class'] . ' nav-link' : 'nav-link';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 10, 4 );



class Custom_Submenu_Walker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker_Nav_Menu::start_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth Depth of menu item. Used for padding.
     * @param array  $args An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        
        // --- Custom Class Insertion Point ---
        $classes = array( 'sub-menu', ' absolute top-full left-0 mt-0 w-48 bg-white shadow-lg rounded-lg border border-gray-100 hidden group-hover:block z-50 py-1' ); // Add your desired classes here
        $class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        
        $output .= "{$n}{$indent}<ul class=\"$class_names\">{$n}";
    }
}

// Remove p tags from content
remove_filter( 'the_content', 'wpautop' );
// Remove p tags from excerpt
remove_filter( 'the_excerpt', 'wpautop' );


function menu_to_display() {
	$menu_items = wp_get_nav_menu_items('header-menu');
	$menu_to_display = array();
    foreach( $menu_items as $item ) {
        if($item->menu_item_parent == 0) {
            $menu_to_display[] = array(
                "post_name" => $item->post_name,
                "title" => $item->title,
                "url" => $item->url,
                "ID" => $item->ID,
                "children" => array(),
            );
        } else {
            // Find parent and add as child
            foreach( $menu_to_display as &$parent ) {
                if( $parent['ID'] == $item->menu_item_parent ) {
                    $parent['children'][] = array(
                        "post_name" => $item->post_name,
                        "title" => $item->title,
                        "url" => $item->url,
                        "ID" => $item->ID,
                        "children" => array(),
                    );
                    break;
                } else {
                    // Check if item is grandchild
                    foreach( $parent['children'] as &$child ) {
                        if( $child['ID'] == $item->menu_item_parent ) {
                            $child['children'][] = array(
                                "post_name" => $item->post_name,
                                "title" => $item->title,
                                "url" => $item->url,
                                "ID" => $item->ID,
                            );
                            break 2;
                        }
                    }
                }
            }
        }
    }
	return $menu_to_display;
}