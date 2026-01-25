<?php 
// top - right - left
$dir = 'top';
?>
<!doctype html>
<html lang="en" >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">

        
		<?php wp_head(); ?>
        
        <?php if(get_field('ga', 'options')) { echo get_field('ga', 'options'); }  ?>
        <!-- <meta name="view-transition" content="same-origin" />
        <script>
            function handleClick(e) {
                // Fallback for browsers that don't support this API:
                if (!document.startViewTransition) {
                updateTheDOMSomehow();
                return;
                }
            
                // With a View Transition:
                document.startViewTransition(() => updateTheDOMSomehow());
            }

        </script>
        <script>
        const basePath = '/';
            const profilePagePattern = new URLPattern(`${basePath}/`, window.origin);
            const isProfilePage = (url) => {
                return profilePagePattern.exec(url);
            }
            // OLD PAGE LOGIC
            window.addEventListener('pageswap', async (e) => {
                if (e.viewTransition) {
                const targetUrl = new URL(e.activation.entry.url);
            
                // Navigating to a profile page
                if (isProfilePage(targetUrl)) {
                    const profile = extractProfileNameFromUrl(targetUrl);
            
                    // Set view-transition-name values on the clicked row
                    document.querySelector(`#${profile} span`).style.viewTransitionName = 'name';
                    document.querySelector(`#${profile} img`).style.viewTransitionName = 'avatar';
            
                    // Remove view-transition-names after snapshots have been taken
                    // (this to deal with BFCache)
                    await e.viewTransition.finished;
                    document.querySelector(`#${profile} span`).style.viewTransitionName = 'none';
                    document.querySelector(`#${profile} img`).style.viewTransitionName = 'none';
                }
                }
            });
        
            // NEW PAGE LOGIC
            window.addEventListener('pagereveal', async (e) => {
                if (e.viewTransition) {
                const fromURL = new URL(navigation.activation.from.url);
                const currentURL = new URL(navigation.activation.entry.url);
            
                // Navigating from a profile page back to the homepage
                if (isProfilePage(fromURL) && isHomePage(currentURL)) {
                    const profile = extractProfileNameFromUrl(currentURL);
            
                    // Set view-transition-name values on the elements in the list
                    document.querySelector(`#${profile} span`).style.viewTransitionName = 'name';
                    document.querySelector(`#${profile} img`).style.viewTransitionName = 'avatar';
            
                    // Remove names after snapshots have been taken
                    // so that we're ready for the next navigation
                    await e.viewTransition.ready;
                    document.querySelector(`#${profile} span`).style.viewTransitionName = 'none';
                    document.querySelector(`#${profile} img`).style.viewTransitionName = 'none';
                }
                }
            });
        </script>
        <style>
            @view-transition {
                navigation: auto;
            }
        </style> -->
    </head>
    <body <?php body_class($dir); ?>>


    <header class="theme-header header <?=$dir?> fixed" id="header-sroll">
        <div class="desk-menu">
            <div class="logo ">            
                    <?php echo get_custom_logo(); ?>
            </div>
            <nav class="box-menu">
                <div class="menu-container">
                    <div class="menu-head">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="menu-header-container">
                        <?php 
                            wp_nav_menu(
                                array(
                                //'theme_location'  => 'menu-1', // elementor
                                'theme_location'  => 'header-menu', // custom 
                                'menu_class'      => 'menu-wrapper',
                                
                                'items_wrap'      => '<ul id="cd-primary-nav" class="menu %2$s">%3$s</ul>',
                                'fallback_cb'     => false,
                                )
                            );
                        ?>                    
                    </div>
                    <div class="menu-foot">
                        <?php if(get_field('social_icon', 'option')) {?>
                            <div class="social">
                                <?php foreach(get_field('social_icon', 'option') as $social_icon) { ?>
                                    <a href="<?=$social_icon['url']?>" target="_blank"><img src="<?=$social_icon['logo']?>" alt="<?=$social_icon['social_media']?>" title="<?=$social_icon['social_media']?>"></a>
                                <?php } ?>
                            </div>
                            <hr/>
                            <address>
                                <?php if(get_field('additional_information', 'option')) { echo get_field('additional_information', 'option'); } ?>
                            </address>
                        <?php } ?>
                    </div>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </nav>
        </div>
    </header>
