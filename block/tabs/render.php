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
$tabs       = get_field( 'tabs' ); 
// debug($accordion);
?>

<section id="tab-<?php echo $block['id']; ?>-section">
    <div class="container">
        <div class="-mb-px border-b border-gray-200">
            <div role="tablist" class="flex gap-1" id="tabs-<?php echo $block['id']; ?>-button">
                <?php if ($tabs) : ?>
                    <?php foreach ($tabs as $counter => $tabs_set) : //debug($grids['right']['image']); ?>
                        <button role="tab" aria-selected="<?php echo $counter === 0 ? 'true' : 'false'; ?>" data-tab="<?php echo $counter; ?>" class="border-b-2 <?php echo $counter === 0 ? 'text-blue-600' : 'border-transparent '; ?> border-blue-600 px-4 py-2 text-sm font-medium transition-colors hover:text-blue-700">
                        <?php echo $tabs_set['question']; ?>
                        </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($tabs) : ?>
            <?php foreach ($tabs as $counter => $tabs_set) : //debug($grids['right']['image']); ?>
                <div role="tabpanel" class="mt-4" data-panel="<?php echo $counter; ?>" <?php echo $counter !== 0 ? 'hidden' : ''; ?>>
                    <p class="text-gray-700">
                        <?php echo $tabs_set['answers']; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


    </div>
    <script>
            document.getElementById('tabs-<?php echo $block['id']; ?>-button').addEventListener('click', function(e) {
                if (e.target.getAttribute('role') === 'tab') {
                    var tabIndex = e.target.getAttribute('data-tab');
                    
                    // Remove active state from all tabs and panels
                    document.querySelectorAll('[role="tab"]').forEach(function(tab) {
                    tab.setAttribute('aria-selected', 'false');
                    tab.classList.remove('border-blue-600', 'text-blue-600');
                    tab.classList.add('border-transparent', 'text-gray-600');
                    });
                    document.querySelectorAll('[role="tabpanel"]').forEach(function(panel) {
                    panel.setAttribute('hidden', '');
                    });
                    
                    // Add active state to clicked tab and corresponding panel
                    e.target.setAttribute('aria-selected', 'true');
                    e.target.classList.remove('border-transparent', 'text-gray-600');
                    e.target.classList.add('border-blue-600', 'text-blue-600');
                    document.querySelector('[data-panel="' + tabIndex + '"]').removeAttribute('hidden');
                }
            });
        </script>
</section>