<!-- <div class="title-index">
   <span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span>
</div> -->
<?php var_dump($static['noidungvi']).die(); ?>
<div class="content-main w-clear"><?=(isset($static['noidung'.$lang]) && $static['noidung'.$lang] != '') ? htmlspecialchars_decode($static['noidung'.$lang]) : ''?></div>
<div class="share">
	<b><?=chiase?>:</b>
	<div class="social-plugin w-clear">
        <div class="addthis_inline_share_toolbox_qj48"></div>
        <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
    </div>
</div>