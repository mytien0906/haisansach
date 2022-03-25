<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
<?php if (count($slider)) { ?>
    <div class="wrap_slider">
        <div class=" d-flex justify-content-between display-blocks">
            <!-- <div class="catagory-list">
                <?php if ($splistmenu) { ?>
                    <ul>
                        <?php foreach ($splistmenu as $c => $cat) { ?>
                            <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><img src="assets/images/img-data/list.png"> <?= $cat['ten' . $lang] ?></a>
                                <?php
                                $spcatmenu = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo from #_product_cat where type = ? and id_list = ? and hienthi > 0 order by stt,id desc", array('san-pham', $cat['id']));
                                if (count($spcatmenu) > 0) { ?>

                                    <ul id="cat2_<?= $cat['id'] ?>">
                                        <?php foreach ($spcatmenu as $c1 => $cat1) { ?>
                                            <li><a title="<?= $cat1['ten' . $lang] ?>" href="<?= $cat1[$sluglang] ?>">- <?= $cat1['ten' . $lang] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <div class="frm_timkiem">
                    <input type="text" class="input" id="keyword" placeholder="Tìm kiếm" onkeypress="doEnter(event,'keyword');" >
                    <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword');"><i class="far fa-search"></i></button>
                </div>
            </div> -->
            <div class="slideshow">
                <div class="autoplay">
                    <?php foreach ($slider as $v) { ?>
                        <div>
                            <a href="<?= $v['link'] ?>" target="_blank" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/910x380x2/assets/images/noimage.png';" src="<?= THUMBS ?>/910x380x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>

                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<?php /*if($banner!='') { ?>
<div class="banner-in">
    <img onerror="this.src='<?=THUMBS?>/1920x506x2/assets/images/noimage.png';" src="<?=THUMBS?>/1920x506x1/<?=UPLOAD_SEOPAGE_L.$banner?>" alt="<?=$v['ten'.$lang]?>" title="<?=$v['ten'.$lang]?>"/>
</div>  
<?php }*/ ?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>