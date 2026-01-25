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


// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'image-text-block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

$classes = explode(' ', $class_name);

$header     = get_field( 'header' );
$images     = get_field( 'images' ); // ACF's images.

// debug($block);
// debug( $block['metadata']['name']);
?>

<div id="image-grid-<?php echo $block['id']; ?>" class="section cmh-thumbnail-wrapper  blockname-<?php echo $block['metadata']['name']; ?>" >
    <div class="cmh-thumbnail <?php echo esc_attr($class_name); ?>" >
        <div class="container custom-width-1">
            <?php if ($header) : ?>
                <div class="color-primary-teal text-center">
                    <h2><?php echo $header; ?></h2>
                </div>
            <?php endif; ?>
            <?php if ($images) : ?>
                <div class="row justify-content-center color-primary-teal text-sm-center">
                    <?php foreach ($images as $image) : ?>
                        <div class="cmh-thumbnail-item col-6 col-sm-6 col-md-3 align-items-center">                            
                                <div class="cmh-thumbnail-img"><img src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
                                <div class="cmh-thumbnail-label">
                                    <h2><?php echo $image['title']; ?></h2>
                                    <p><?php echo $image['description']; ?></p>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    #image-grid-<?php echo $block['id']; ?> {
        display: flex;
        justify-content: center;
    }
</style>