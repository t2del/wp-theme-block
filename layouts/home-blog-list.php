<?php
$count = 4;
if($myVariable) {
    $count = $myVariable;
}
$args = array(
    'post_type'      => 'post',
    'post_status' => array( 'publish' ),
    'posts_per_page' => $count, // Replace -1 with the number of posts you want to display per page
    // Add any additional parameters or conditions you require
);
$box_class = '';

$custom_query = new WP_Query( $args );
?>
<div class="blog-list">
<?php
if ( $custom_query->have_posts() ) {
    $ctr = 1;
    while ( $custom_query->have_posts() ) {
        $custom_query->the_post();
	    $thumbnail = '<img loading="lazy" src="https://www.fullertonhealth.com/wp-content/uploads/2023/07/placeholder-4.png" class="photo img-responsive wp-post-image" alt="Placeholder Image" title="Placeholder Image">';
        
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
        if($ctr % 2 == 0){ 
            $box_class = 'notshow fromleft';
        } 
        else{ 
            $box_class = 'notshow fromright';
        } 
        $ctr++;
	?>
	<div class="boxes notshow blur">
		<div class="box">	
			<div class="image">
                    <a href="<?=$url?>"><?=$thumbnail?></a>                    
            </div>
            <div class="info">
                <div class="meta"><?=get_the_date( get_option( 'date_format' ), get_the_ID() )?></div>
                <a href="<?=$url?>"><h2 class="title"><?=$title?></h2></a>
                <div class="excerpt hide"><?=$excerpt?></div>
                <div class="read-more"><a href="<?=$url?>" class="elementor-button elementor-button-link elementor-size-sm btn">Read More</a></div>
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