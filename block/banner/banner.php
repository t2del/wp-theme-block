<?php
/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$banner            = get_field( 'banner' );
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

<div id="banner-<?php echo $block['id']; ?>" <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <?php if ( $banner ) : ?>
        <?php if($full_width == false) :?> <div class="container"> <?php endif; ?>
        <!-- <div class="banner__col"> -->
            <?php echo wp_get_attachment_image( $banner['ID'], 'full', '', array( 'class' => 'banner__img' ) ); ?>
        <!-- </div> -->
        <?php if($full_width == false) :?> </div> <?php endif; ?>
    
    <?php endif; ?>
</div>
<style>
    <?php echo '#banner-'.$block['id'].' img'; ?> {
        width: 100%;
        height: 100%;
    }
<?php if($height > 0 && $full_width) {?>
    <?php echo '#banner-'.$block['id']; ?>  {
        height: <?php echo $height;?>vh;
    }
    <?php echo '#banner-'.$block['id']; ?> img {
        object-fit: cover;
    }
<?php } ?>
</style>