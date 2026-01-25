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
$faqs       = get_field( 'faqs' ); // ACF's images.
?>

<section id="accordion-<?php echo $block['id']; ?>" class="<?php echo esc_attr($class_name); ?> ">
    <div class="container">
        <?php if ($header) : ?>
            <div class="color-primary-teal text-center">
                <h2><?php echo $header; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($faqs) : ?>
            <div class="accordion" id="accordion-<?php echo $block['id']; ?>-accordion">
                <?php foreach ($faqs as $counter => $faq) : //debug($grids['right']['image']); ?>
                    <details class="group [&amp;_summary::-webkit-details-marker]:hidden rounded-lg border border-gray-200 m-2 relative">
                        <summary class="flex cursor-pointer items-center justify-between gap-4 rounded-lg  px-4 py-3 font-medium text-gray-900 hover:bg-gray-50">
                            <span><?php echo $faq['question']; ?></span>

                            <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </summary>

                        <div class="p-4">
                            <p class="text-gray-700">
                                <?php echo $faq['answers']; ?>
                            </p>
                        </div>
                    </details>
                <?php endforeach; ?>             
            </div>
        <?php endif; ?>
    </div>
    <div class="space-y-2">
  
  
</div>
</section>