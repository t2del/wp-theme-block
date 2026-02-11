<?php
/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$images            = get_field( 'images' );
$max_height       = get_field( 'max_height' ) ? get_field( 'max_height' ) : '50'; 

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

<!-- Component: Slider with indicators & controls inside -->
<div class="relative w-full glide-03 max-h-[<?php echo $max_height; ?>vh]" >
    <!-- Slides -->
    <div class="overflow-hidden h-full" data-glide-el="track">
        <ul class="relative w-full h-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform] max-h-[<?php echo $max_height; ?>vh]">
            <?php foreach($images as $counter => $images_item)  { ?> 
                <li class="h-full">
                    <?php echo wp_get_attachment_image( $images_item['ID'], 'full', false, array( 'class' => 'w-full h-full object-cover', 'alt' => 'slider-image-' . $counter ) ); ?>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- Controls -->
    <div class="absolute left-0 flex items-center justify-between w-full h-0 px-4 top-1/2 hidden" data-glide-el="controls">
        <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full lg:w-12 lg:h-12 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <title>prev slide</title>
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
            </svg>
        </button>
        <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full lg:w-12 lg:h-12 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <title>next slide</title>
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
        </button>
    </div>
    <!-- Indicators -->
    <div class="absolute bottom-0 flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
        <?php foreach($images as $counter => $images_item)  { ?> 
            <button class="p-4 group" data-glide-dir="=<?php echo $counter; ?>" aria-label="goto slide <?php echo $counter; ?>"><span class="block w-2 h-2 transition-colors duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span>
        </button>
        <?php } ?>
    </div>
</div>

<script>
    var glide03 = new Glide('.glide-03', {
        type: 'slider',
        focusAt: 'center',
        perView: 1,
        autoplay: 6000,
        animationDuration: 900,
        gap: 0,
        classes: {
            activeNav: '[&>*]:bg-slate-700',
        },

    });

    glide03.mount();
</script>
<!-- End Slider with indicators & controls inside -->