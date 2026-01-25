<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>


<?php get_header(); ?>
	<div class="page-content">
		<h1 class="page-title"><?php echo get_the_title(get_option( 'page_for_posts' )); ?></h1>
		<div class="wp-block-columns max-w-[1440px] mx-auto px-4 is-layout-flex wp-container-core-columns-is-layout-9d6595d7 wp-block-columns-is-layout-flex">
			<div class="blog-section">
				<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
					<div class="overflow-hidden bg-white rounded shadow-md text-slate-500 shadow-slate-200">
						<?php echo get_the_post_thumbnail(get_the_id(), "Full", false, ""); ?>

						<div class="p-6">
							<header class="flex gap-4 mb-4">
							<a href="#" class="relative inline-flex items-center justify-center w-12 h-12 text-white rounded-full">
								<img src="" alt="user name" title="user name" width="48" height="48" class="max-w-full rounded-full" />
							</a>
							<div>
								<h3 class="text-xl font-medium text-slate-700"><?php the_title(); ?></h3>
								<p class="text-sm text-slate-400"><i><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></i>
								</p>
								
							</div>
							</header>
							<p>
							<?php the_excerpt(); ?>
							</p>
						</div>
						<!-- Action base sized link button -->
						<div class="flex justify-end gap-2 p-2 pt-0">
							<a href="<?php esc_url( the_permalink() ); ?>" title="Read more of <?php the_title(); ?>" rel="bookmark" class="inline-flex items-center justify-center h-10 gap-2 px-5 text-sm font-medium tracking-wide transition duration-300 rounded justify-self-center whitespace-nowrap text-emerald-500 hover:bg-emerald-100 hover:text-emerald-600 focus:bg-emerald-200 focus:text-emerald-700 focus-visible:outline-none disabled:cursor-not-allowed disabled:text-emerald-300 disabled:shadow-none disabled:hover:bg-transparent">
							<span>Read more</span>
							</a>
						</div>
					</div>
				<?php } ?>
				<?php } else { ?>
				<p>No posts to display</p>
				<?php } ?>
			</div>
			<div class="sidebar-section"><?php dynamic_sidebar('sidebar-blog-archive'); ?></div>
		</div>
	</div>
<?php get_footer(); ?>