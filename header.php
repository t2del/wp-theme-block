<!doctype html>
<html lang="en" >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php wp_head(); ?>  
    </head>
    <body <?php body_class(); ?>>

<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

?>
<!-- Header -->
<header class="relative z-20 w-full border-b shadow-lg  border-slate-200 bg-white/90 shadow-slate-700/5 after:absolute after:top-full after:left-0 after:z-10 after:block after:h-px after:w-full after:bg-slate-200 lg:border-slate-200 lg:backdrop-blur-sm lg:after:hidden sticky top-0">
  <div class="text-sm text-white w-full">
    <div class="text-center font-medium py-2 bg-gradient-to-r from-violet-500 via-[#9938CA] to-[#E0724A]">
       <p>Exclusive Price Drop! Hurry, <span class="underline underline-offset-2">Offer Ends Soon!</span></p>
    </div>
   <nav class="relative h-[70px] flex items-center justify-between px-4 md:px-4 lg:px-4 xl:px-4 py-4 bg-white text-gray-900 transition-all shadow">

        <a id="WindUI" aria-label="WindUI logo" aria-current="page" class="flex items-center gap-2 py-3 text-lg whitespace-nowrap focus:outline-none " href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-8 w-auto" />
        </a>
      
        <ul class="md:hidden lg:flex items-center space-x-4 ">
           <?php 
                wp_nav_menu(
                    array(
                    //'theme_location'  => 'menu-1', // elementor
                    'theme_location'  => 'header-menu', // custom
                    'container'       => false,
                    'menu_class'      => 'menu-wrapper',
                    
                    'items_wrap'      => '%3$s',
                    'fallback_cb'     => false,
                    )
                );
            ?>   
        </ul>
       
        <div class="flex items-center justify-between gap-2">
            <button class="md:inline hidden bg-white hover:bg-gray-50 border border-gray-300  px-5 py-2 rounded-full active:scale-95 transition-all">Get started</button>

       <button aria-label="menu-btn" type="button" class="menu-btn inline-block lg:hidden active:scale-90 transition">
           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
               <path d="M3 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zm0 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2zm0 7a1 1 0 1 0 0 2h24a1 1 0 1 0 0-2z"/>
           </svg>
       </button>
        </div>   
       

       <div class="mobile-menu absolute top-[70px] left-0 w-full bg-white shadow-sm p-6 hidden lg:hidden animate-slide-in-down">
           <ul class="flex flex-col space-y-4 text-lg">
               <?php 
                  wp_nav_menu(
                      array(
                      //'theme_location'  => 'menu-1', // elementor
                      'theme_location'  => 'header-menu', // custom
                      'container'       => false,
                      'menu_class'      => 'menu-wrapper',
                      
                      'items_wrap'      => '%3$s',
                      'fallback_cb'     => false,
                      )
                  );
              ?>   
           </ul>

           <button type="button" class="bg-white text-gray-600 border border-gray-300 mt-6 text-sm hover:bg-gray-50 active:scale-95 transition-all w-40 h-11 rounded-full">
               Get started
           </button>
       </div>
   </nav>
</div>
</header>
<!-- End Navbar with Topbar-->