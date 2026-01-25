<?php

$args = array(
    'post_type'      => $myVariable,
    'posts_per_page' => -1, // Replace -1 with the number of posts you want to display per page
    // Add any additional parameters or conditions you require
);

$custom_query = new WP_Query( $args );
?>
<div class="team-list grid-3 grid ">
<?php
if ( $custom_query->have_posts() ) {
	//debug($custom_query);
    while ( $custom_query->have_posts() ) {
        $custom_query->the_post();
		$thumbnail = '';
        // Display the post content or perform any custom actions	
		if ( has_post_thumbnail() ) {
				//$thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'full' ); // Display the featured image
				$thumbnail = get_the_post_thumbnail( get_the_ID(), array( 300, 450),  array( 'class' => 'photo' ) ); // Display the featured image
			}
			$name = get_the_title(); // Example: Display the post title
			$position = get_field( "position" ); 
		$url = get_the_permalink();
		global $post;
    	$post_slug = $post->post_name;;
	?>
	<div class="card azure">
		<div class="card-container">
			<a href="<?=$url?>">
				<div class="photo"><?=$thumbnail?></div>
				<h3 class="name"><?=$name?></h3>
				<h4 class="position"><?=$position?></h4>
			</a>	
		</div>	
	</div>
	<div class="card astro">
		<div class="card-container">
			<a href="../<?=$myVariable?>/<?=$post_slug?>">
				<div class="photo"><?=$thumbnail?></div>
				<h3 class="name"><?=$name?></h3>
				<h4 class="position"><?=$position?></h4>
			</a>	
		</div>	
	</div>
	<?php  
}
    
    wp_reset_postdata(); // Restore original post data
} else {
    // No posts found
} ?>

</div>

<style>
body.elementor-page .card.astro {
	display: none;
}
.card {
	text-align: center;
}
.card .card-container .name {
	color: var(--e-global-color-27f36a7);
	font-size: 1.5rem;
    font-weight: var(--e-global-typography-accent-font-weight);
}

.card .card-container .position {
	color: var(--e-global-color-7b2e377);
	font-size: 1.2rem;
}

.card .card-container .photo img {
	border-radius: 80px;
}
.card .card-container .photo {
	opacity: 0.9;
	width: 100%;
}
.card .card-container .photo:hover {
	opacity: 1;
    	filter: brightness( 100% ) contrast( 105% ) saturate( 100% ) blur( 0px ) hue-rotate( 0deg );
}
.card .card-container {
	max-width: 280px;
	margin: 0 auto;
}


.grid {
	display: grid;
	grid-column-gap: 40px;
    	grid-row-gap:  40px;
}
.grid-3 {
	grid-template-columns: repeat(3,1fr);
}
@media (max-width: 991px) {
	.grid-3 {
		grid-template-columns: repeat(3,1fr);
		grid-column-gap: 20px;
    	grid-row-gap: 20px;
	}
	.card .card-container .name {
		font-size: 1.2rem;
	}
	.card .card-container .position {
		font-size: 1rem;
	}
}
@media (max-width: 767px) {
	.grid-3 {
		grid-template-columns: repeat(2,1fr);
	}
}
@media (max-width: 450px) {
	.grid-3 {
		grid-template-columns: repeat(1,1fr);
	}
}


</style>