<?php $cats = get_categories(); 

$count = 4;
if($myVariable) {
    $count = $myVariable;
}
?>
<div class="blog-list-catnav">
    <div class="cat-nav">
        <?php
            foreach ($cats as $k => $cat) {
                if($cat->name != 'Uncategorized') { 
                    ?>
                        <a id="<?=$cat->cat_ID?>" class="btn <?php if($k == 0) { echo 'active'; } ?>"><?=$cat->name?></a>
                    <?php
                }
            }
        ?>
    </div>
<?php
foreach ($cats as $k => $cat) {
    if($cat->name != 'Uncategorized') { 
    $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $cat->cat_ID,
                ),
            ),
        'posts_per_page' => $count,
    );
    $custom_query = new WP_Query($args);
?>
    <div class="boxes term-<?=$cat->cat_ID;?> <?php if($k == 0) { echo 'active'; } ?>">
        <?php
        if ( $custom_query->have_posts() ) {
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
            ?>
                
                    <div class="box">	
                        <div class="image">
                            <a href="<?=$url?>"><?=$thumbnail?></a>
                        </div>
                        <div class="info">
                            <div class="header">
                                <div class="meta"><?=get_the_date( get_option( 'date_format' ), get_the_ID() )?></div>
                                <a href="<?=$url?>"><h2 class="title"><?=$title?></h2></a>
                            </div>
                            
                            <div class="excerpt"><?=$excerpt?></div>
                            <div class="read-more"><a href="<?=$url?>" class="elementor-button elementor-button-link elementor-size-sm btn">Read More</a></div>
                        </div>			
                    </div>	
                
            <?php  
            }
    
            wp_reset_postdata(); // Restore original post data
        } else {
            // No posts found
        } 
?>
    </div>
<?php
    }
}
?>

</div>


<script language="javaScript"  src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
<script >
    var $ = jQuery.noConflict();
    $( document ).ready(function( $ ) {
        $('.cat-nav a').click(function () {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $('.blog-list-catnav .boxes').removeClass('active');
            $('.blog-list-catnav .boxes.term-'+$(this).attr('id')).addClass('active');
            $('.cat-nav a').removeClass('active');
            $('.cat-nav #'+$(this).attr('id')).addClass('active');
        });        
    });
</script>