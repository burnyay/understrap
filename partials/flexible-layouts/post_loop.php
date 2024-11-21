<div class="wrapper post-loop <?php the_sub_field('css_class'); ?>">
  <div class="container ">
    <div class="row cards-wrapper">
       <? if(get_sub_field('search_bar')): ?>
          <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
          <div class="search-category-bar">
            <?php dynamic_sidebar('right-sidebar'); ?>
          </div>
          <?php endif; ?>
        <? endif; ?>
      <div class="column col-12">
        <? the_sub_field('content_before'); ?>
          <div class="post-wrapper">
          <?php
              $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
              $posts_per_page = get_sub_field('posts_per_page');
              $category__in = get_sub_field('category__in');
	  	        $category__not_in = get_sub_field('category__not_in');
              $custom_tax = get_sub_field('custom_tax_slug');
  		   	    $order = get_sub_field('order');
  		  	    $orderby = get_sub_field('orderby');
              $card_columns = get_sub_field('card_columns');
              $post_type = get_sub_field('post_type');
              $loop_template = get_sub_field('loop_template');
              $offset = get_sub_field('offset');

              $args = array( 
                  'posts_per_page' => $posts_per_page, 
                  'paged' => $paged,
                  'offset' => $offset,
                  'post_type' => $post_type,
  				        'order' => $order,
  				        'orderby' => $orderby,
                  'tax_query'         => array(),
              );

              if ($category__not_in): 
                $args['category__not_in'] = array($category__not_in);
              endif;
  		  
  		  	if ($category__in && !$custom_tax): 
                $args['category__in'] = array($category__in);
              elseif ($category__in && $custom_tax):
                $args['tax_query']['terms'] = array(
                    'taxonomy' => $custom_tax,
                    'field'    => 'id',
                    'terms'    => $category__in,
                  );
              endif;

              $cpt_query = new WP_Query($args);
          ?>

          <?php if ($cpt_query->have_posts()) : while ($cpt_query->have_posts()) : $cpt_query->the_post(); 
          
          $image = get_the_post_thumbnail_url('', 'medium'); 
          $title = get_the_title();
          $text = wp_trim_words( get_the_content(), 40, '...' );
          $card_link = get_the_permalink();
          $card_button_text = 'Read More';
          
          ?>

            <?php 

            if ($loop_template == null ) {
              include(locate_template('loop-templates/content-post.php'));
            } else {
              include(locate_template($loop_template));
            }


          ?>

          <?php endwhile; endif; ?>
          </div>
           <?php if (get_sub_field('paginate')) : ?>
            <div class="pagination">
            <? echo paginate_links( array(
                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                'total'        => $cpt_query->max_num_pages,
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'format'       => '?paged=%#%',
                'show_all'     => false,
                'type'         => 'plain',
                'end_size'     => 2,
                'mid_size'     => 1,
                'prev_next'    => false,
                'add_args'     => false,
                'add_fragment' => '',
            ) ); ?>
          </div>
          <? endif;

          wp_reset_postdata(); ?>
          <? the_sub_field('content_after'); ?>
      </div> <!--end column-->
    </div> <!--end row-->
  </div> <!--end container-->
</div><!--end wrapper-->

