<?php
$count = -1;
if($myVariable) {
    $count = $myVariable;
}
$args = array(
    'post_type'      => 'career',
    'post_status' => array( 'publish' ),
    'posts_per_page' => $count, // Replace -1 with the number of posts you want to display per page
    // Add any additional parameters or conditions you require
);

$custom_query = new WP_Query( $args );
?>
<div class="career-list">
<?php
if ( $custom_query->have_posts() ) {
    while ( $custom_query->have_posts() ) {
        $custom_query->the_post();
	    $thumbnail = get_field('placeholder_image', 'option');
        $excerpt = '';
        // Display the post content or perform any custom actions	
	    if ( has_post_thumbnail() ) {
            //$thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' ); // Display the featured image
             $thumbnail = get_the_post_thumbnail( get_the_id(), array('500','500'),  array( 'class' => 'photo img-responsive' ) ); // Display the featured image
            //$thumbnail = get_the_post_thumbnail_url( $post_id ); // Display the featured image
        }
        $title = get_the_title(); // Example: Display the post title
        $position = get_field( "position" ); 
	    $url = get_the_permalink();
        $excerpt = get_the_excerpt();
	?>
	<div class="boxes">
		<div class="box">	
			<div class="image">
                    <a href="<?=$url?>"><?=$thumbnail?></a>                    
            </div>
            <div class="info">
                <a href="<?=$url?>"><h2 class="title"><?=$title?></h2></a>
                <div class="excerpt hide"><?=$excerpt?></div>
            </div>			
		</div>	
	</div>
	<?php  
}
    
    wp_reset_postdata(); // Restore original post data
} else {
    // No posts found
} ?>

</div>