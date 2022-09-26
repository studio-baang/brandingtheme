<?php $fields = get_fields();  ?>
<section class="studio-baang-cover">
    <?php
    if($fields["background-color"]) : ?>
    <span aria-hidden="true" class="studio-baang-cover__background-color <?php if($fields["background"]) { echo 'studio-baang-cover__background-color--with-image'; }; ?>" style="background-color: <?=$fields["background-color"]?>"></span>
    <?php endif; ?>
        
    <?php if($fields["background"]) : ?>
    <img  aria-hidden="true"  class="studio-baang-cover__image studio-baang-cover__image--cover" src="<?=$fields["background"]["url"]?>" alt="">
    <?php endif; ?>
    
    <?php if($fields["logo-image"]) : ?>
    <div class="studio-baang-cover__image studio-baang-cover__image--logo">
        <img src="<?=$fields["logo-image"]["url"]?>" alt="<?=$fields["logo-image"]["description"]?>">
    </div>
    <?php endif; ?>

	<span class="studio-baang-cover__copyright">design by studio baang</span>
</section>