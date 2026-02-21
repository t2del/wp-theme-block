<?php
/**
 * The Template for displaying all single posts
 * @package 	WordPress
 * @subpackage 	denn
 * @since 		denn 1.0
 */
?>
<?php get_header(); ?>
	<div class="page-content max-w-[1600px!important] mx-auto">
		<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Back to blog</a>
		<div class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-xs transition hover:shadow-sm">
			<?php echo get_the_post_thumbnail(get_the_id(), "Full", array("class" => "w-full h-auto object-cover max-h-90")); ?>
		</div>
		<div class=" grid grid-cols-[80%_18%] gap-4 py-3">
			
				<div class="article-section">
				<?php //if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
					<article >
						
						<h1 class="text-lg font-medium text-gray-900"><?php the_title(); ?></h1>
						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
						<div class="mt-2 text-sm/relaxed text-gray-500"><?php the_content(); ?></div>
						<?php if ( get_the_author_meta( 'description' ) ) { ?>
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						<h2>About <?php echo get_the_author() ; ?></h2>
						<p class="mt-2 text-sm/relaxed text-gray-500"><?php the_author_meta( 'description' ); ?></p>
						<?php } ?>
						<?php //echo do_shortcode('[anycomment]'); 
						//comments_template( '', true ); ?>
					</article>
					
				<?php// } } ?>
					</div>
				<div class="sidebar-section"><?php dynamic_sidebar('sidebar-single-post'); ?></div>
			</div>
		</div>	
	</div>
<?php get_footer(); ?>