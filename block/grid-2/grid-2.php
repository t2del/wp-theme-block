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
$grid       = get_field( 'grid' ); // ACF's images.

?>

<section id="grid2-<?php echo $block['id']; ?>" class="section cmh-thumbnail-wrapper <?php echo esc_attr($class_name); ?>">
    <div class="container custom-width-1">
        <?php if ($header) : ?>
            <div class="color-primary-teal text-center">
                <h2><?php echo $header; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($grid) : ?>
            <div class="row justify-content-center color-primary-teal text-sm-center">
                <?php foreach ($grid as $grids) : //debug($grids['right']['image']); ?>
                    <div class="cmh-thumbnail-item col-sm-6 col-md-6 col-xs-12">                        
                        <div class="cmh-thumbnail-img">
                            <img src="<?php echo $grids['left']['image_left']['url']; ?>" alt="<?php echo $grids['left']['image_left']['alt']; ?>"  class="img-responsive" loading="eager">
                        </div>
                        <div class="cmh-thumbnail-label">
                            <h2><?php echo $grids['left']['title']; ?></h2>
                            <p><?php echo $grids['left']['description']; ?></p>
                        </div>
                    </div>

                    <div class="cmh-thumbnail-item col-sm-6 col-md-6 col-xs-12">                        
                        <div class="cmh-thumbnail-img">
                            <img src="<?php echo $grids['right']['image_right']['url']; ?>" alt="<?php echo $grids['right']['image_right']['alt']; ?>"  class="img-responsive" loading="eager">
                        </div>
                        <div class="cmh-thumbnail-label">
                            <h2><?php echo $grids['right']['title']; ?></h2>
                            <p><?php echo $grids['right']['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    #grid2-<?php echo $block['id']; ?> {
        display: flex;
        justify-content: center;
    }

    #grid2-<?php echo $block['id']; ?> img {
        width: 100%;
    }
</style>