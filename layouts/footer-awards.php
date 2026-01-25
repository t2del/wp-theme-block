<?php
$images = get_field('footer_awards', 'option');
if($images) {
?>
	<div class="slider">
		<div class="slide-track">
			<?php foreach($images as $k => $image) { ?>	
				<div class="slide">

					<img src="<?php echo esc_url($image['sizes']['large']); ?>"  height="150" width="250" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_html($image['caption']); ?>"/>
				</div>
			<?php } ?>
			<?php if (count($images) < 10) {?>
				<?php foreach($images as $k => $image) { ?>	
					<div class="slide">
					<img src="<?php echo esc_url($image['sizes']['large']); ?>"  height="150" width="250" alt="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_html($image['caption']); ?>"/>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
<?php } ?>
<style>
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
	transform: translateX(calc(-220px * 7));
  }
}

.slider {
    margin: auto;
    overflow: hidden;
    position: relative;
    width: 100%;
	padding: 10px;
}


.slider .slide-track {
	animation: scroll 50s linear infinite;
    display: flex;
    width: calc(250px * 14);
    gap: 10px;
}

.slider .slide-track:hover {
    animation-play-state: paused;
}

.slider .slide {
	/* height: 130px;
    width: 250px; */
	height: 100px;
    width: 180px;
	border-radius: 10px;
	overflow: hidden;
}
.slider .slide img {
	height: 100%;
    width: 100%;
	object-fit: fill;
}
</style>