<?php
/**
 * The Template for displaying all single posts
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>
<?php get_header(); ?>
	<div class="page-content">
		
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Back to blog</a>
			<div class="article-section">
			<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
				<!-- <article>
					<?php echo get_the_post_thumbnail(get_the_id(), "Full", false, ""); ?>
					<h1 class="page-title"><?php the_title(); ?></h1>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
					<?php the_content(); ?>			
					<?php if ( get_the_author_meta( 'description' ) ) { ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h2>About <?php echo get_the_author() ; ?></h2>
					<?php the_author_meta( 'description' ); ?>
					<?php } ?>
					<?php //echo do_shortcode('[anycomment]'); 
					//comments_template( '', true ); ?>
				</article> -->
				<article><?php the_content(); ?>	</article>
			<?php } } ?>
			
			<div class="sidebar-section"><?php dynamic_sidebar('sidebar-single-post'); ?></div>
			</div>
	</div>
<?php get_footer(); ?>