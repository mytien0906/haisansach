<div class="title-index"><?=(@$title_cat!='')?$title_cat:@$title_crumb?></div>
<?php if($mota_page!=''){?>
<div class="mota_page"><?=htmlspecialchars_decode($mota_page)?></div>
<?php }?>
<div class="content-main w-clear">
    <?php if(count($news)>0) {?>
        <div class="loadkhung_product">
            <?php foreach($news as $k=>$v){?>
                <div class="boxproduct_item">
                    <a class="boxproduct_img" href="<?=$v['tenkhongdauvi']?>"><img onerror="this.src='<?=THUMBS?>/270x185x1/assets/images/noimage.png';" src="<?=THUMBS?>/270x185x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"/>
                        <span class="inner"> <span class="btn btn-arrow"><span class="text">Chi tiết</span></span> </span>
                    </a>
                    <div class="boxproduct_info">
                        <div class="boxproduct_name"><a href="<?=$v['tenkhongdauvi']?>" title="<?=$v['tenvi']?>"><?=$v['ten'.$lang]?></a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
        <div class="clear"></div>
        <div class="pagination-home"><?=(isset($paging) && $paging != '') ? $paging : ''?></div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?=khongtimthayketqua?></strong>
        </div>
    <?php } ?>
    
</div>
<?php if($noidung_page!=''){?>
<div class="noidung_page">
    <div class="meta-toc">
        <div class="box-readmore">
            <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
        </div>
    </div>
    <div id="toc-content"><?=htmlspecialchars_decode($noidung_page)?></div>
</div>
<?php }?>