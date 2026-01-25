<?php
/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$banner            = get_field( 'banner_carousel' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.
$full_width        = get_field( 'full_width' ); // ACF's Toggle.
$height            = get_field( 'max_height' ); // ACF's Toggle.

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'banner';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Build a valid style attribute for background and text colors.
$styles = array( );
$style  = implode( '; ', $styles );

?>

<div id="banner-carousel-<?php echo $block['id']; ?>" <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <?php if ( $banner ) : ?>
        <?php if($full_width == false) :?> <div class="container"> <?php endif; ?>

        <?php if($full_width == false) :?> </div> <?php endif; ?>
            <div id="banner-carousel-<?php echo $block['id']; ?>-list" class="carousel slide">
                <div class="carousel-indicators">
                    <?php foreach($banner as $counter => $banner_item)  { ?>                      
                        <button type="button" data-bs-target="#banner-carousel-<?php echo $block['id']; ?>-list" data-bs-slide-to="<?php echo $counter; ?>" class="<?php if($counter  == 0 ) { echo 'active'; } ?>" aria-current="true" aria-label="Slide <?php echo $counter; ?>"></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach($banner as $counter => $banner_item)  { ?>
                        <div class="carousel-item <?php if($counter  == 0 ) { echo 'active'; } ?>">
                            <img src="<?=$banner_item['banner']['url'];?>" alt="<?=$banner_item['banner']['alt'];?>" clas="banner__img d-block w-100">
                            <h2 class="hide"><?=$banner_item['title'];?></h2>
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#banner-carousel-<?php echo $block['id']; ?>-list" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#banner-carousel-<?php echo $block['id']; ?>-list" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
    <?php endif; ?>
</div>
<style>
    <?php echo '#banner-carousel-'.$block['id'].' img'; ?> {
        width: 100%;
        height: 100%;
    }
<?php if($height > 0 && $full_width) {?>
    <?php echo '#banner-carousel-'.$block['id']; ?>  {
        height: <?php echo $height;?>vh;
    }
    <?php echo '#banner-carousel-'.$block['id']; ?> img {
        object-fit: cover;
    }
<?php } ?>
</style>