<div class="wrapper video-banner__wrapper <?php the_sub_field('css_class'); ?>" >  
	<?php if (get_sub_field('background_video')) {?>
		<div class="video-background">
			<video autoplay muted loop> <source src="<?php the_sub_field('background_video'); ?>" type="video/mp4"></video>
		</div>
	<?php }?>
		<?php if (get_sub_field('background_image_row')) {?>
		<div class="background" style="background-image:url(<?php the_sub_field('background_image_row'); ?>)"></div>
	<?php }?>
	<div class="container">
		<div class="row">
			<?php 
			if( have_rows('column') ):
				while ( have_rows('column') ) : the_row();
			
					$css_class = get_sub_field('css_class');
					$wysiwyg_or_plain_html = get_sub_field('wysiwyg_or_plain_html'); 
					
					if ($wysiwyg_or_plain_html == "Plain HTML") {
						$content = get_sub_field('content', false, false);
					} else {
						$content = get_sub_field('content');
					}

					?>
						<div class="column <?php the_sub_field('css_class'); ?>" <?php if (get_sub_field('background_image_column')) {?>style="background-image:url(<?php the_sub_field('background_image_column'); ?>)" <?php } ?>>
							<div class="column-content">
								<?php 
									echo $content ; 
								?>
							</div>
						</div>

				<?php endwhile;
			endif;	
			?>
		</div> <!----row---->
	</div> <!----container---->
</div> <!----wrapper---->