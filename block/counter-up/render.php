<?php

/**
 * Image & Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */




$data_target    = (get_field( 'data_target' )) ? get_field( 'data_target' ) : '1000' ;
$string         = (get_field( 'string' )) ? get_field( 'string' ) : '+' ;
$description    = get_field( 'description' ); 
?>

<section id="counter-up-<?php echo $block['id']; ?>">
    <div class="container">
        <div class="container-counter text-accent-base text-center py-2 text-5xl font-bold flex justify-center items-center">  
            <span class="counter-<?php echo $block['id']; ?> title ml-2 md:top-4 md:z-20" data-target="<?php echo $data_target; ?>">0</span> 
            <span class="string" ><?php echo $string; ?></span>    
        </div>
        <div class="description text-accent-base text-center ">
            <h4 class="message text-xl m-2 font-bold"><?php echo $description; ?></h4>
        </div>    
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter-<?php echo $block['id']; ?>');

    const animateCounter = (counterSpan) => {
      const target = +counterSpan.getAttribute('data-target');
      const increment = target / 600; // Adjust for desired animation speed

      let current = 0;
      const updateCounter = () => {
        if (current < target) {
          current += increment;
          counterSpan.innerText = Math.ceil(current);
          requestAnimationFrame(updateCounter);
        } else {
          counterSpan.innerText = target; // Ensure it lands on the exact target
        }
      };
      updateCounter();
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // If the counter is on screen, start the animation
          animateCounter(entry.target);
          // Stop observing once animation has started for this counter
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.5 // Trigger when 50% of the element is visible
    });

    counters.forEach(counterSpan => {
      observer.observe(counterSpan);
    });
  });
</script>