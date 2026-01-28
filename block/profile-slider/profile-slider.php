<?php

/**
 * Image & Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

$custom_post       = get_field( 'custom_post' ); 

?>

<section id="profile-slider-<?php echo $block['id']; ?>">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 lg:grid-cols-6">
            <?php foreach($custom_post as $counter => $post): ?>
            <?php $position = (get_field('position', $post)) ? get_field('position', $post) : 'Product Designer';?>   
                <div>
                    <img src="<?php echo (get_the_post_thumbnail_url( $post)) ? get_the_post_thumbnail_url( $post) : get_template_directory_uri().'/assets/images/no-profile.jpg'; ?>" alt="" class="aspect-square rounded-full object-cover">

                    <div class="mt-4 text-center">
                        <h3 class="text-lg/tight font-semibold text-gray-900"><?php echo get_the_title( $post ); ?></h3>

                        <p class="mt-0.5 text-sm text-gray-700"><?php echo $position; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>