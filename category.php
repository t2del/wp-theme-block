<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>
<?php get_header(); ?>
	<div class="page-content">
		<div class="container">
			<h1 class="page-title">Blog</h1>
				<div class="blog-section">
					<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
						<article>
							<?php echo wp_get_attachment_image(get_the_id(), "Full", false, $attr); ?>
							<h1 class="page-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Read more of <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
							<i><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
							</i>

						</article>
					<?php } ?>
					<?php } else { ?>
					<p>No posts to display</p>
					<?php } ?>
				</div>
				<div class="sidebar-section"><?php get_sidebar('sidebar-blog-archive'); ?></div>
		</div>
	</div>
<?php denn_utilities::get_template_parts( array( 'parts/html-footer') ); ?>