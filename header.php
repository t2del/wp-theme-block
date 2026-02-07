<!doctype html>
<html lang="en" >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">        
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<?php wp_head(); ?>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
        /* Custom Styles for non-Tailwind specific overrides or components */
        /* This ensures the mobile menu is fixed and takes full height */
        #mobile-menu {
            transition: transform 0.3s ease-in-out;
            transform: translateX(100%); /* Start hidden off-screen */
        }
        #mobile-menu.active {
            transform: translateX(0); /* Slide in */
        }
        /* Mobile menu specific styles to emulate the image */
        .mobile-dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .mobile-dropdown-content.active {
            max-height: 500px; /* Arbitrary large height to allow content to show */
        }
    </style>
    </head>
    <body <?php body_class(); ?>>

<?php
$menu_to_display = array();
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$menu_items = wp_get_nav_menu_items('header-menu');
// debug($menu_items)
foreach( $menu_items as $item ) {
    if($item->menu_item_parent == 0) {
        $menu_to_display[] = array(
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
// debug($menu_to_display);
?>
<!-- Topbar -->
    <div class="bg-gray-100 py-2 border-b text-sm text-white w-full">
        <div class="container mx-auto px-4 flex justify-between items-center text-sm text-gray-600">
            <div class="flex space-x-4">
                <span>📞 +65 8816 1244</span>
                <span>📧 info@urban-rehab.org</span>
            </div>
            <div class="hidden md:block">
                <span>Mon–Fri: 08:30 – 20:00 | Sat: 08:30 – 15:00</span>
            </div>
        </div>
    </div>
    <div class="text-center font-medium py-2 bg-gradient-to-r from-violet-500 via-[#9938CA] to-[#E0724A] text-sm text-white w-full">
       <p>Exclusive Price Drop! Hurry, <span class="underline underline-offset-2">Offer Ends Soon!</span></p>
    </div>
<!-- Topbar -->

<!-- Header -->
<header class="relative z-20 w-full border-b shadow-lg  border-slate-200 bg-white/90 shadow-slate-700/5 after:absolute after:top-full after:left-0 after:z-10 after:block after:h-px after:w-full after:bg-slate-200 lg:border-slate-200 lg:backdrop-blur-sm lg:after:hidden sticky top-0 shadow bg-white">
        <div class="max-w-[1650px] mx-auto flex justify-between items-center h-20 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-4 text-sm font-medium">            
                <a id="WindUI" aria-label="WindUI logo" aria-current="page" class="flex items-center gap-2 py-3 text-lg whitespace-nowrap focus:outline-none " href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-8 w-auto" />
                </a>
            </div>
            <div class="flex items-center space-x-8">
            
                <nav class="flex space-x-4 text-sm font-semibold text-gray-700 max-[1200px]:hidden">
                    <ul class="flex space-x-4">
                        <?php foreach( $menu_to_display as $item ) : ?>
                            <li class="relative group">
                                <?php if (empty($item['children'])) : ?>
                                <a href="<?php echo $item['url']; ?>" class="hover:text-blue-600"><?php echo $item['title']; ?></a>
                                <?php endif; ?>
                                <?php if (!empty($item['children'])) : ?>
                                    <button class="flex items-center hover:text-blue-600 focus:outline-none">
                                        <?php echo $item['title']; ?> <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                                    </button>
                                    <ul class="absolute left-0 top-full mt-0 w-64 bg-white shadow-xl border border-gray-100 z-20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-1">
                                        <?php foreach ($item['children'] as $child) : ?>
                                            <li class="relative group/nested">
                                                <a href="<?php echo $child['url']; ?>" class="flex justify-between items-center px-4 py-2 hover:bg-gray-50"><?php echo $child['title']; ?> <i class="fas fa-chevron-right text-xs"></i></a>
                                                <?php if (!empty($child['children'])) : ?>
                                                    <ul class="absolute left-full top-0 w-64 bg-white shadow-xl border border-gray-100 z-30 opacity-0 invisible group-hover/nested:opacity-100 group-hover/nested:visible transition-all duration-300 py-1">
                                                        <?php foreach ($child['children'] as $grandchild) : ?>
                                                            <li>
                                                                <a href="<?php echo $grandchild['url']; ?>" class="block px-4 py-2 hover:bg-gray-50"><?php echo $grandchild['title']; ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                
                            </li>
                        <?php endforeach; ?>
                        
                        <li class="relative group">
                            <button class="flex items-center hover:text-blue-600 focus:outline-none">
                                SERVICES <i class="fas fa-chevron-down ml-1 text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                            </button>
                            <ul class="absolute left-0 top-full mt-0 w-64 bg-white shadow-xl border border-gray-100 z-20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 py-1">
                                <li class="relative group/nested" id="desktop-gp-plus-dropdown">
                                    <a href="#" class="flex justify-between items-center px-4 py-2 hover:bg-gray-50">
                                        GP+ <i class="fas fa-chevron-right text-xs"></i>
                                    </a>
                                    <ul class="absolute left-full top-0 w-64 bg-white shadow-xl border border-gray-100 z-30 opacity-0 invisible group-hover/nested:opacity-100 group-hover/nested:visible transition-all duration-300 py-1">
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">HUB @ HOUGANG GREEN</a></li>
                                        <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">HUB @ PASIR RIS</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">GP</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">HOME CARE & NURSING</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-50">SPECIALTY CARE</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>

                
            </div>
            
            <div class="flex items-center space-x-4 text-sm font-medium">
                <div class="flex items-center space-x-4 text-sm font-medium max-[800px]:hidden">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded text-xs font-bold hover:bg-blue-700 transition duration-150">
                        Book Health Screening
                    </button>
                    <!-- <i class="fab fa-whatsapp text-2xl text-green-500 cursor-pointer"></i>
                    <i class="fas fa-shopping-cart text-xl text-gray-700 cursor-pointer"></i>
                    <i class="fas fa-user-circle text-xl text-gray-700 cursor-pointer"></i> -->
                </div>

                <!-- Bottom icon navigation for screens <= 800px -->
                <div class="hidden  max-[800px]:fixed max-[800px]:bottom-0 max-[800px]:left-0 max-[800px]:right-0 max-[800px]:bg-white max-[800px]:border-t max-[800px]:border-gray-200 max-[800px]:py-2  max-[800px]:flex max-[800px]:justify-around max-[800px]:items-center max-[800px]:z-50">
                    <button aria-label="WhatsApp" class="text-green-500 text-2xl focus:outline-none">
                        <i class="fab fa-whatsapp"></i>
                    </button>

                    <button aria-label="Cart" class="text-gray-700 text-xl focus:outline-none">
                        <i class="fas fa-shopping-cart"></i>
                    </button>

                    <button aria-label="Book Health Screening" class="bg-blue-600 text-white p-3 rounded-full shadow-lg -mt-3 focus:outline-none">
                        <i class="fas fa-notes-medical"></i>
                    </button>

                    <button aria-label="Account" class="text-gray-700 text-xl focus:outline-none">
                        <i class="fas fa-user-circle"></i>
                    </button>
                </div>
                

                <button id="mobile-menu-toggle" class="text-gray-700 text-2xl p-2 focus:outline-none hidden max-[1200px]:block">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
        </div>
    </header>


    <div id="mobile-menu" class="fixed top-0 right-0 h-full bg-white shadow-2xl z-50 min-[1200px]:hidden overflow-y-auto" style="width:320px;">
        <div class="flex justify-between items-center h-16 px-4 border-b border-gray-200">
            <img src="https://www.fullertonhealth.com/sg/wp-content/uploads/2021/06/logo-fullerton-health-small.png" alt="Fullerton Health" class="h-10">
            <button id="mobile-menu-close" class="text-gray-700 text-2xl p-2 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="py-2 text-sm font-semibold text-gray-700">
            <ul class="mobile-menu-list">
                <li><a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">ABOUT US</a></li>
                
                <li class="mobile-dropdown border-b border-gray-100" id="mobile-services-dropdown">
                    <button class="flex justify-between items-center w-full px-4 py-3 hover:bg-gray-50 focus:outline-none">
                        SERVICES <i class="fas fa-chevron-right text-xs transform transition-transform duration-300"></i>
                    </button>
                    <ul class="mobile-dropdown-content bg-gray-50">
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">GP+</a></li>
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">GP</a></li>
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">CLINICS</a></li>
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">FULLERTON HEALTH @ NTU</a></li>
                    </ul>
                </li>
                
                <li class="mobile-dropdown border-b border-gray-100" id="mobile-gp-plus-dropdown">
                    <button class="flex justify-between items-center w-full px-4 py-3 hover:bg-gray-50 focus:outline-none">
                        GP+ <i class="fas fa-chevron-right text-xs transform transition-transform duration-300"></i>
                    </button>
                    <ul class="mobile-dropdown-content bg-gray-50">
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">HUB @ HOUGANG GREEN</a></li>
                        <li><a href="#" class="block pl-8 py-2 text-sm font-normal border-b border-gray-100">HUB @ PASIR RIS</a></li>
                    </ul>
                </li>

                <li><a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">HOME CARE & NURSING</a></li>
                <li><a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">SPECIALTY CARE</a></li>
                <li><a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">MIGRANT WORKER CARE</a></li>
            </ul>
        </nav>
        
        <div class="mt-8 px-4 flex space-x-4 justify-start">
            <i class="fab fa-facebook text-xl text-gray-700 hover:text-blue-600"></i>
            <i class="fab fa-linkedin text-xl text-gray-700 hover:text-blue-600"></i>
            <i class="fab fa-instagram text-xl text-gray-700 hover:text-blue-600"></i>
        </div>
    </div>

    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black opacity-0 pointer-events-none transition-opacity duration-300 z-40 min-[1200px]:hidden"></div>