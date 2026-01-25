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
$grid_4     = get_field( 'grid' ); // ACF's images.
//debug($grid );
//debug($grid);
// debug( $block['metadata']['name']);
?>

<section id="grid3-<?php echo $block['id']; ?>" class="section cmh-thumbnail-wrapper " >
    <div class="cmh-thumbnail <?php echo esc_attr($class_name); ?>" >
        <div class="container custom-width-1">
            <?php if ($header) : ?>
                <div class="color-primary-teal text-center">
                    <h2><?php echo $header; ?></h2>
                </div>
            <?php endif; ?>
            <?php if ($grid_4) : ?>
                <div class="row justify-content-center color-primary-teal text-sm-center">
                    <?php foreach ($grid_4 as $grids) : //debug($grids['right']['image']); ?>
                        <div class="cmh-thumbnail-item col-sm-4 col-md-4 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['left']['image_left']['url']; ?>" alt="<?php echo $grids['left']['image']['alt']; ?>"  class="img-responsive" loading="eager">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['left']['title']; ?></h2>
                                <p><?php echo $grids['left']['description']; ?></p>
                            </div>
                        </div>

                        <div class="cmh-thumbnail-item col-sm-4 col-md-4 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['mid']['image_mid']['url']; ?>" alt="<?php echo $grids['mid']['image']['alt']; ?>"  class="img-responsive" loading="eager">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['mid']['title']; ?></h2>
                                <p><?php echo $grids['mid']['description']; ?></p>
                            </div>
                        </div>

                        <div class="cmh-thumbnail-item col-sm-4 col-md-4 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['right']['image_right']['url']; ?>" alt="<?php echo $grids['right']['image']['alt']; ?>"  class="img-responsive" loading="eager">
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
    </div>
</section>

<style>
    #grid3-<?php echo $block['id']; ?> {
        display: flex;
        justify-content: center;
    }

    #grid3-<?php echo $block['id']; ?> .cmh-thumbnail-img img {
        width: 100%;
    }
</style>