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




$header          = get_field( 'header' );
$accordion       = get_field( 'accordion' ); 
// debug($accordion);
?>

<section id="accordion-<?php echo $block['id']; ?>">
    <div class="container">
        <?php if ($header) : ?>
            <div class="color-primary-teal text-center">
                <h2 class="text-xl font-bold mb-3"><?php echo $header; ?></h2>
            </div>
        <?php endif; ?>
        
        <?php if ($accordion) : ?>
            <div class="accordion" id="accordion-<?php echo $block['id']; ?>-accordion">
                <?php foreach ($accordion as $counter => $accordion_set) : //debug($grids['right']['image']); ?>
                    <details class="group [&amp;_summary::-webkit-details-marker]:hidden rounded-lg border border-gray-200 m-2 relative">
                        <summary class="flex cursor-pointer items-center justify-between gap-4 rounded-lg  px-4 py-3 font-medium text-gray-900 hover:bg-gray-50 text-lg font-bold">
                            <span><?php echo $accordion_set['question']; ?></span>

                            <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700 max-w-3xl mx-auto">
                                <?php echo $accordion_set['answers']; ?>
                            </p>
                        </div>
                    </details>
                <?php endforeach; ?>             
            </div>
        <?php endif; ?>
    </div>
</section>