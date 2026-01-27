<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$quote             = !empty(get_field( 'quote' )) ? get_field( 'quote' ) : 'Your quote here...';
$author            = get_field( 'author' );
$quote_attribution ='';
$author_role       = '';
if ( $author ) {
    $quote_attribution .= '<footer class="testimonial__attribution">';
    $quote_attribution .= '<cite class="testimonial__author">' . $author . '</cite>';

    if ( $author_role ) {
        $quote_attribution .= '<span class="testimonial__role">' . $author_role . '</span>';
    }

    $quote_attribution .= '</footer><!-- .testimonial__attribution -->';
}

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

?>

<div id="quote-<?php echo $block['id']; ?>" <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>" >
        
            <blockquote class="text-xl italic font-semibold tracking-tight text-heading">
                <?php echo $quote; ?>
            </blockquote>
            
                <?php if ( !empty( $quote_attribution ) ) : ?>
                    <?php echo wp_kses_post( $quote_attribution ); ?>
                <?php endif; ?>
        
</div>
