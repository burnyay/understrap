<div class="card-wrapper">
  <div class="card  <? echo $card_css_class; ?>">
    <? if($image):?><img src="<?php echo $image['sizes']['medium']; ?>" class="card-img-top"><? endif; ?>
    <div class="card-body">
      <? if($title):?><h3 class="card-title"><?php echo $title; ?></h3><? endif; ?>
      <div class="card-text"><?php echo $text; ?></div>
      <?php if ($card_link) { ?> <a href="<?php echo $card_link ?>" class="btn btn-primary"><?php echo $card_button_text ?></a> <?php } ?>
    </div>
  </div>
</div>