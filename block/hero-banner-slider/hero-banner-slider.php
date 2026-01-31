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
 * 
 * SCF - Block - Hero - Banner - Slider (Multiple Image)
 */
$hero_banner_slider = get_field( 'hero_banner_slider' );
$max_height       = get_field( 'max_height' ) ? get_field( 'max_height' ) : '50';

?>

<section id="hero-banner-slider-<?php echo $block['id']; ?>" class="relative bg-gray-900 h-[<?php echo $max_height; ?>vh] flex items-center">

    <div class="relative w-full glide-hero-banner-slider max-h-[<?php echo $max_height; ?>vh]" >
    <!-- Slides -->
    <div class="overflow-hidden h-full" data-glide-el="track">
        <ul class="relative w-full h-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform] max-h-[<?php echo $max_height; ?>vh]">
            <?php foreach($hero_banner_slider as $counter => $slide): ?> 
                <li class="w-full h-full relative <?php echo "slide-". $counter; ?>" >
                    <div class="absolute inset-0 opacity-50 bg-black" >
                        <img src="<?= $slide['banner']['url'];?>" class="w-full h-[<?php echo $max_height; ?>vh] object-cover object-[<?= $slide['position_x'];?>%_<?= $slide['position_y'];?>%]"  alt="<?php echo "counter-". $counter; ?> <?php echo ($slide['banner']['alt']) ? $slide['banner']['alt'] : 'Hero Banner Image';?>">
                    </div>
                    <div class="container mx-auto px-4 relative z-999 text-white flex flex-col items-<?php echo $slide['text_alignment']; ?> justify-center h-[<?php echo $max_height; ?>vh]">
                        <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo $slide['header']; ?></h1>
                        <span class="text-xl mb-8"><?php echo $slide['sub_header']; ?></span>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-teal-600 px-8 py-3 rounded-md font-bold hover:bg-teal-700">Meet the Team</a>
                            <a href="#" class="bg-white text-teal-900 px-8 py-3 rounded-md font-bold hover:bg-gray-100">Our Services</a>
                        </div>
                    </div>    
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- Indicators -->
    <div class="absolute bottom-0 flex items-center justify-center w-full gap-2" data-glide-el="controls[nav]">
        <?php foreach($hero_banner_slider as $counter => $slide): ?> 
            <button class="p-4 group" data-glide-dir="=<?php echo $counter; ?>" aria-label="goto slide <?php echo $counter; ?>"><span class="block w-2 h-2 transition-colors duration-300 rounded-full ring-1 ring-slate-700 bg-white/20 focus:outline-none"></span>
        </button>
        <?php endforeach; ?>
    </div>
</section>

<script>
    var glide03 = new Glide('.glide-hero-banner-slider', {
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