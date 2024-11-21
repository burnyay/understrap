
<div class="wrapper slider <?php the_sub_field('css_class'); ?>">
  <div class="row slider" >
    <div class="container">
      <div class="column col-12">
        <div class="slider-items">
          <?php

          // Check rows exists.
          if( have_rows('slides') ):

              // Loop through rows.
              while( have_rows('slides') ) : the_row();

                  // Load sub field value.
                  $image = get_sub_field('image'); ?>
                  
                  <div class="slider-item">
                    <img src="<?php the_sub_field('image'); ?>">
                  </div>

              <?php // End loop.
              endwhile;

          // No value.
          else :
              // Do something...
          endif; ?>
        </div>
        <div class="slider__pagination"></div>
      </div>
    </div>
  </div>
</div>