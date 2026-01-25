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
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();  ?>
			<h1 class="page-title hide"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>	
<?php get_footer(); ?>