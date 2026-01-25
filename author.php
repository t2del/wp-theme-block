<?php
/**
 * The template for displaying Author Archive pages
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>
<?php get_header(); ?>
	<div class="page-content">
		<div class="container">
			<h1 class="page-title">Author Archives: <?php echo get_the_author() ; ?></h1>
			<?php if ( have_posts() ): the_post(); ?>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h2>About <?php echo get_the_author() ; ?></h2>
			<?php the_author_meta( 'description' ); ?>
			<?php endif; ?>
			<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
				<article>
					<h1 class="page-title"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
			<?php else: ?>
			<p>No posts to display for <?php echo get_the_author() ; ?></p>	
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>