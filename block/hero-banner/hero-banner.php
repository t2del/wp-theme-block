<?php

/**
 * Block - Hero - Banner (Single Image)
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 * 
 * Block - Hero - Banner (Single Image)
*/

$header          = get_field( 'header' );
$banner       = get_field( 'banner' ); 
$max_height       = get_field( 'max_height' ) ? get_field( 'max_height' ) : '50';
$header       = get_field( 'header' ) ? get_field( 'header' ) : 'Main Heading';
$sub_header      = get_field( 'sub_header' ) ? get_field( 'sub_header' ) : 'Sub Heading';
$cta_button     = get_field( 'cta_button' );
$text_alignment = get_field( 'text_alignment' ) ? get_field( 'text_alignment' ) : 'left';
// $postion_x       = get_field( 'postion_x' ) ? get_field( 'postion_x' ) : '50';
$position_x       = get_field( 'position_x' ) ? get_field( 'position_x' ) : '50';
$position_y       = get_field( 'position_y' ) ? get_field( 'position_y' ) : '50';
?>

<section id="hero-banner-<?php echo $block['id']; ?>" class="relative bg-gray-900 h-[<?php echo $max_height; ?>vh] flex items-center">
    <div class="absolute inset-0 opacity-50 bg-black">
        <?php
        if ( $banner && is_array( $banner ) ) {
            echo wp_get_attachment_image(
                $banner['ID'],
                'full',
                false,
                array(
                    'class' => 'w-full h-full object-cover',
                    'style' => 'object-position: ' . $position_x . '% ' . $position_y . '%',
                    'alt'   => $banner['alt'] ? $banner['alt'] : 'Hero Banner Image',
                )
            );
        }
        ?>
    </div>
    <div class="container mx-auto px-4 relative z-10 text-white text-<?php echo $text_alignment; ?>">
        <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $header; ?></h1>
        <p class="text-xl mb-8"><?php echo $sub_header; ?></p>
        <div class="flex space-x-4 justify-<?php echo $text_alignment; ?>">
            <a href="#" class="bg-teal-600 px-8 py-3 rounded-md font-bold hover:bg-teal-700">Meet the Team</a>
            <a href="#" class="bg-white text-teal-900 px-8 py-3 rounded-md font-bold hover:bg-gray-100">Our Services</a>
        </div>
    </div>
</section>