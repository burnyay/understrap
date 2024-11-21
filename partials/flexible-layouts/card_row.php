<div class="card-funnel wrapper <?php the_sub_field('css_class'); ?>">
	<div class="container">
		<? if (get_sub_field('before_content')): ?>
			<div class="row before-content">
				<div class="column col-12">
					<div class="column-content">
						<? the_sub_field('before_content'); ?>
					</div>
				</div>
			</div>
		<? endif; ?>
		<div class="row cards-wrapper">
			<?php

			$card_columns = get_sub_field('card_columns');

			if( have_rows('card') ):

				while ( have_rows('card') ) : the_row();

					$image = get_sub_field('card_image');
					$title = get_sub_field('card_title');
					$text = get_sub_field('card_text');
					$card_link = get_sub_field('card_link');
					$card_button_text = get_sub_field('card_button_text');
					$card_css_class = get_sub_field('card_css_class');
					?>
				
				<?php include(locate_template('loop-templates/content-card.php')); ?>

				<?php endwhile;
			endif;
			?>
		</div>
		<? if (get_sub_field('after_content')): ?>
			<div class="row after-content">
				<div class="column col-12">
					<div class="column-content">
						<? the_sub_field('after_content'); ?>
					</div>
				</div>
			</div>
		<? endif; ?>
	</div>
</div>