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
	<div class="page-content">
		<div class="container">
			<h1 class="page-title">Search Results for '<?php echo get_search_query(); ?>'</h1>
			<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<article>
					<h2 class="page-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			<?php else: ?>
			<p>No results found for '<?php echo get_search_query(); ?>'</p>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>