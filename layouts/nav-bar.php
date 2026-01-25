<?php 
$dir = 'left';
if($myVariable) {
    $dir = $myVariable;
}
?>
<!-- <header class="header <?=$dir?>" id="header-sroll"> -->
			<div class="container">
				<div class="row">
						<div class="desk-menu">
							<div class="logo hide">
								<h1 class="logo-adn">
									<a title="Fullerton Health" href="<?=site_url();?>">
                                    <?=get_bloginfo( 'name' );?>
									</a>
								</h1>
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
                                    'theme_location'  => 'header-menu', // custom FHG
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

				</div>
			</div>
<!-- </header> -->



<script>
//     (function($) {
//     var size;
	
// 		//SMALLER HEADER WHEN SCROLL PAGE
//     function smallerMenu() {
//         var sc = $(window).scrollTop();
//         if (sc > 40) {
//             $('#header-sroll').addClass('small');
//         }else {
//             $('#header-sroll').removeClass('small');
//         }
//     }

//     // VERIFY WINDOW SIZE
//     function windowSize() {
//         size = $(document).width();
//         if (size >= 991) {
//             $('body').removeClass('open-menu');
//             $('.hamburger-menu .bar').removeClass('animate');
//         }
//     };

//      // ESC BUTTON ACTION
//     $(document).keyup(function(e) {
//         if (e.keyCode == 27) {
//             $('.bar').removeClass('animate');
//             $('body').removeClass('open-menu');
//             $('header .desk-menu .menu-container .menu .menu-item-has-children a ul').each(function( index ) {
//                 $(this).removeClass('open-sub');
//             });
//         }
//     });

//     $('#cd-primary-nav > li').hover(function() {
//         $whidt_item = $(this).width();
//         $whidt_item = $whidt_item-8;

//         $prevEl = $(this).prev('li');
//         $preWidth = $(this).prev('li').width();
//         var pos = $(this).position();
//         pos = pos.left+4;
//         $('header .desk-menu .menu-container .menu>li.line').css({
//             width:  $whidt_item,
//             left: pos,
//             opacity: 1
//         });
//     });

//      // ANIMATE HAMBURGER MENU
//     $('.hamburger-menu').on('click', function() {
//         $('.hamburger-menu .bar').toggleClass('animate');
//         if($('body').hasClass('open-menu')){
//             $('body').removeClass('open-menu');
//         }else{
//             $('body').toggleClass('open-menu');
//         }
//     });

//     $('header .desk-menu .menu-container .menu .menu-item-has-children ul').each(function(index) {
//         $(this).append('<li class="back"><a href="#">Back</a></li>');
//     });

//     // RESPONSIVE MENU NAVIGATION
//     $('header .desk-menu .menu-container .menu .menu-item-has-children > a').on('click', function(e) {
//         e.preventDefault();
//         if(size <= 991){
//             $(this).next('ul').addClass('open-sub');
//         }
//     });

//     // CLICK FUNCTION BACK MENU RESPONSIVE
//     $('header .desk-menu .menu-container .menu .menu-item-has-children ul .back').on('click', function(e) {
//         e.preventDefault();
//         $(this).parent('ul').removeClass('open-sub');
//     });

//     $('body .over-menu').on('click', function() {
//         $('body').removeClass('open-menu');
//         $('.bar').removeClass('animate');
//     });

//     $(document).ready(function(){
//         windowSize();
//         $('body').addClass('<?=$dir?>');
//     });

//     $(window).scroll(function(){
//         //smallerMenu();
//     });

//     $(window).resize(function(){
//         windowSize();
//     });

// })(jQuery);
</script>
