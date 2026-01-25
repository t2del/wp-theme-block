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
// debug($grid_4 );
//debug($grid);
// debug( $block['metadata']['name']);
?>

<section id="grid4-<?php echo $block['id']; ?>" class="section cmh-thumbnail-wrapper " >
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
                        <div class="cmh-thumbnail-item col-lg-3 col-md-6 col-sm-6 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['one']['image_one']['url']; ?>" alt="<?php echo $grids['one']['image_one']['alt']; ?>"  class="img-responsive">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['one']['title']; ?></h2>
                                <p><?php echo $grids['one']['description']; ?></p>
                            </div>
                        </div>

                        <div class="cmh-thumbnail-item col-lg-3 col-md-6 col-sm-6 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['two']['image_two']['url']; ?>" alt="<?php echo $grids['two']['image_two']['alt']; ?>"  class="img-responsive">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['two']['title']; ?></h2>
                                <p><?php echo $grids['two']['description']; ?></p>
                            </div>
                        </div>

                        <div class="cmh-thumbnail-item col-lg-3 col-md-6 col-sm-6 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['three']['image_three']['url']; ?>" alt="<?php echo $grids['three']['image_three']['alt']; ?>"  class="img-responsive">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['three']['title']; ?></h2>
                                <p><?php echo $grids['three']['description']; ?></p>
                            </div>
                        </div>

                        <div class="cmh-thumbnail-item col-lg-3 col-md-6 col-sm-6 col-xs-12">                        
                            <div class="cmh-thumbnail-img">
                                <img src="<?php echo $grids['four']['image_four']['url']; ?>" alt="<?php echo $grids['four']['image_four']['alt']; ?>"  class="img-responsive">
                            </div>
                            <div class="cmh-thumbnail-label">
                                <h2><?php echo $grids['four']['title']; ?></h2>
                                <p><?php echo $grids['four']['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
    #grid4-<?php echo $block['id']; ?> {
        display: flex;
        justify-content: center;
    }

    #grid4-<?php echo $block['id']; ?> .cmh-thumbnail-img img {
        width: 100%;
    }
</style>