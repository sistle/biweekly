<?php  
/*
 Template name: Home
 Template post type: page
 */
?>

<?php get_header(); ?>


<section class="staff">
   <div class="container">
		<div class="staff__top">
         <?php  
            $staff_subtitle = get_field('subtitle');
            $staff_title = get_field('title');
            $staff_desc = get_field('desc');
            
         ?>
         <?php  if (!empty($staff_subtitle)): ?>
            <span><?php   echo $top_subtitle; ?> </span>
         <?php  endif; ?>
         <?php  if (!empty($staff_title)): ?>
            <h1><?php   echo $top_title; ?></h1>
         <?php  endif; ?>
         <?php  if (!empty($staff_desc)): ?>
            <p><?php   echo $top_title; ?></p>
         <?php  endif; ?>
      </div>


		<div class="staff__grid">
         <?php  
            $args = array(
               'post_type' => 'staff',
               'posts_per_page' => -1,
               'order' => 'ASC'
            )

            $staff_query = new WP_Query($args);
         ?>
            <?php if ($block_event->have_posts()):?>
               <?php while ($block_event->have_posts()):  ?>
                  <?php $block_event->the_post(); ?>
            <?php  
               $card_desc = get_field('desc');
               $card_align = get_field('card_align');
            ?>

            <div class="staff__card <?php echo 'staff__card--align-' . $card_align;?>">
               <a href="<?php the_permalink(); ?>" class="staff__card-img">
                  <?php if (has_post_thumbnail()){
                     the_post_thumbnail();
                  } ?>
               </a>
               <div class="staff__card-content">
                  <?php  if(!empty($staff_desc)): ?>
                     <span><?php  echo $card_desc ?></span>
                  <?php  endif; ?>
                  <p><?php the_title(); ?></p>
               </div>
            </div>

         <?php endwhile;?>
         <?php wp_reset_postdata(); ?>
         <?php  endif; ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>