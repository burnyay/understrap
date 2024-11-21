<div class="wrapper team-loop">
  <div class="container">
    <div class="row cards-wrapper">
    <?php
      $teamLoop = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'team',
        'orderby' => 'date',
        'order' => 'asc',
      ));

      $card_columns = get_sub_field('card_columns');
  
      while($teamLoop->have_posts()) {
        $teamLoop->the_post();

        $image = get_the_post_thumbnail_url('', 'medium');
        $title = get_the_title();
        $card_link = get_the_permalink();
        $card_button_text = 'Read More';

        include(locate_template('loop-templates/content-team.php'));
      }
  
      wp_reset_postdata()
    ?>
    </div><!--end row-->
  </div><!--end container-->
</div><!--end wrapper-->