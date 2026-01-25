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

<section id="faqs-<?php echo $block['id']; ?>" class="<?php echo esc_attr($class_name); ?> ">
    <div class="container">
        <?php if ($header) : ?>
            <div class="color-primary-teal text-center">
                <h2><?php echo $header; ?></h2>
            </div>
        <?php endif; ?>
        <?php if ($faqs) : ?>
            <div class="accordion" id="faqs-<?php echo $block['id']; ?>-accordion">
                <?php foreach ($faqs as $counter => $faq) : //debug($grids['right']['image']); ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $counter; ?>" aria-expanded="<?php $counter == 0 ? "True" : "False"; ?>" aria-controls="collapse-<?php echo $counter; ?>">
                            <?php echo $faq['question']; ?>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $counter; ?>" class="accordion-collapse collapse <?php $counter == 0 ? "show" : ""; ?>" data-bs-parent="#faqs-<?php echo $block['id']; ?>-accordion">
                            <div class="accordion-body">
                                <?php echo $faq['answers']; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>             
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    #faqs-<?php echo $block['id']; ?> {
        display: flex;
        justify-content: center;
    }

    #faqs-<?php echo $block['id']; ?> img {
        width: 100%;
    }
    .accordion-button:focus {
        z-index: 3;
        outline: 0;
        box-shadow: none !important;
    }
</style>