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


$article_category           = get_field( 'article_category' );
?>

<section id="blog-posts-<?php echo $block['id']; ?>-section" class="tab-section">
    <div class="-mb-px ">
        <div role="tablist" class="flex gap-1" id="tabs-<?php echo $block['id']; ?>-button">
            <button role="tab" aria-selected="true" data-tab="0" class="text-blue-600 border-blue-600 px-4 py-2 text-sm font-medium transition-colors hover:text-blue-700">
                    All
            </button>
            <?php if ($article_category) : ?>
                <?php foreach ($article_category as $counter => $tabs_set) : 
                    //debug($grids['right']['image']); ?>
                    <button role="tab" aria-selected="false" data-tab="<?php echo $tabs_set->term_id; ?>" class=" border-transparent border-blue-600 px-4 py-2 text-sm font-medium transition-colors hover:text-blue-700">
                    <?php echo $tabs_set->name; ?>
                    </button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    
    <div role="tabpanel" class="mt-4" data-panel="0" >
        <div class="grid grid-cols-2 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
        <?php 
            $args_all = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'post_status' => array( 'publish' ),
                
            );
            $query_all = new WP_Query( $args_all );
            if ( $query_all->have_posts() ) :
                while ( $query_all->have_posts() ) :
                    $query_all->the_post();    
        ?>
                        <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'h-46 w-full object-cover', 'alt' => get_the_title() ) ); ?>
                            </a>

                            <div class="bg-white p-4 sm:p-6">
                                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>" class="block text-xs text-gray-500"><?php echo get_the_date( 'jS M Y' ); ?></time>

                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="mt-0.5 text-lg text-gray-900">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>

                                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
        </div>
        <div class="flex items-center justify-center m-4">
            <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="bg-gray-100 hover:bg-gray-200 text-teal-900 px-8 py-3 rounded-md font-bold ">All Articles</a>
        </div>
    </div>
    <?php if ($article_category) : ?>
        <?php foreach ($article_category as $counter => $tabs_set_article) : 
            //debug($grids['right']['image']); ?>
            <div role="tabpanel" class="mt-4" data-panel="<?php echo $tabs_set_article->term_id; ?>" hidden>
                <div class="grid grid-cols-2 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                    <?php
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post_status' => array( 'publish' ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'term_id',
                                    'terms'    => $tabs_set_article->term_id,
                                    ),
                                ),
                        );

                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) :
                            while ( $query->have_posts() ) :
                                $query->the_post();
                                ?>
                                <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'full', array( 'class' => 'h-46 w-full object-cover', 'alt' => get_the_title() ) ); ?>
                                    </a>

                                    <div class="bg-white p-4 sm:p-6">
                                        <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>" class="block text-xs text-gray-500"><?php echo get_the_date( 'jS M Y' ); ?></time>

                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="mt-0.5 text-lg text-gray-900">
                                                <?php the_title(); ?>
                                            </h3>
                                        </a>

                                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                                            <?php the_excerpt(); ?>
                                        </p>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                </div>
                <div class="flex items-center justify-center m-4">
                    <a href="<?php echo get_category_link( $tabs_set_article->term_id ); ?>" class="bg-gray-100 hover:bg-gray-200 text-teal-900 px-8 py-3 rounded-md font-bold ">More of <?php echo get_cat_name( $tabs_set_article->term_id ); ?></a>
                </div>
                
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>