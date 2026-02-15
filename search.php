<?php
/**
 * Search results page
 * Please see /external/denn-utilities.php for info on denn_utilities::get_template_parts()
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>
<?php get_header(); ?>
	<div class="page-content max-w-[1600px!important] mx-auto">
		<div class="container">
			<h1 class="page-title">Search Results for '<?php echo get_search_query(); ?>'</h1>
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<article class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs mb-8 transition hover:shadow-sm">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'full', array( 'class' => 'h-46 w-full object-cover', 'alt' => get_the_title() ) ); ?>
					</a>

					<div class="p-4 sm:p-6">
						<a href="<?php the_permalink(); ?>">
						<h3 class="text-lg font-medium text-gray-900">
							<?php the_title(); ?>
						</h3>
						</a>

						<p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
						<?php the_excerpt(); ?>
						</p>

						<a href="<?php the_permalink(); ?>" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
						Find out more <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">→</span>
						</a>
					</div>
				</article>
			<?php endwhile; ?>
			<?php else: ?>
			<p>No results found for '<?php echo get_search_query(); ?>'</p>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>