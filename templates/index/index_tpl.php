<?php
session_start();
?>
<div class="fixwidth">
    <div class="project">
        <div class="section-title-container">
            <h2 class="section-title section-title-normal"><b></b><span class="section-title-main"><i class="fa fa-star"
                        aria-hidden="true"></i>dự án</span><b></b></h2>
        </div>
    </div>
    <div class="tabbed-content">
        <!-- <ul class="nav nav-tabs nav-uppercase nav-size-normal nav-center">
            <li class="tab active has-icon"><a href="#tab_thiết-kế-kiến-trúc">Thiết kế kiến trúc</a>
            </li>
            <li class="tab has-icon"><a href="#tab_thi-công-xây-dựng">Thi công xây dựng</a></li>
            <li class="tab has-icon"><a href="#tab_trang-trí-nội-thất">trang trí nội thất</a></li>
            <li class="tab has-icon"><a href="#tab_sửa-chữa-cải-tạo">Sửa chữa cải tạo</a></li>
        </ul>
        <div class="row tab-panels">
            <div class="col-md-3 col-6">
                <h5 class="tab-icon uppercase">
                    biệt thự
                </h5>
            </div>
            <div class="col-md-3 col-6">
                <h5 class="tab-icon uppercase">
                    Nhà phố
                </h5>
            </div>
            <div class="col-md-3 col-6">
                <h5 class="tab-icon uppercase">
                    Nhà xưởng
                </h5>
            </div>
            <div class="col-md-3 col-6">
                <h5 class="tab-icon uppercase">
                    Cao ốc
                </h5>
            </div>
        </div> -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <?php foreach($nmlistmenu as $key => $item) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if($key == 0) {
                    echo "active";
                    $_SESSION['cate_id'] = $item['id'];
                    } ?>" id="category_<?= $item['id'] ?>"
                    id-category="<?= $item['id'] ?>" data-toggle="tab" href="#" role="tab" aria-controls=""
                    type-ne="<?= $item['type'] ?>"
                    aria-selected=" <?php if($key == 0) {echo "true";}else{echo "false";} ?>"><?= $item['tenvi'] ?></a>
            </li>

            <?php } ?>
            <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Contact</a>
            </li> -->
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fad show active" id="" role="tabpanel" aria-labelledby="">
                <div class="row tab-panels tab-content-2">
                
                </div>
            </div>
        </div>

    </div>
</div>
<?php if(count($duan)>0){ ?>
<div class="box-nhamau-container">
    <div class="fixwidth">
        <div class="grid_duan">
            <?php foreach($duan as $k=>$v){
					if($k==2){
						$albums_width='570x530';
					}else{
						$albums_width='285x265';
					}
					?>

            <?php if($k<=5){?>
            <div class="album_item">
                <a href="<?=$v['tenkhongdauvi']?>"><img
                        onerror="this.src='<?=THUMBS?>/<?=$albums_width?>x2/assets/images/noimage.png';"
                        src="<?=THUMBS?>/<?=$albums_width?>x1/<?=UPLOAD_NEWS_L.$v['photo']?>" />
                    <span><?=$v['ten'.$lang]?></span>
                </a>
            </div>

            <?php }?>
            <?php }?>
        </div>
    </div>
</div>
<?php }?>

<?php if(count($baogia)>0){ ?>
<div class="wrap_socialpage">
    <div class="fixwidth">
        <div class="title-index">BÁO GIÁ</div>
        <div class="owl-carousel owl-theme auto_social">
            <?php foreach($baogia as $v) { ?>
            <div class="socialpage">
                <div class="socialpage-img">
                    <a href="<?=$v['link']?>" target="_blank" title="<?=$v['ten'.$lang]?>"><img
                            onerror="this.src='<?=THUMBS?>/100x100x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/0x100x2/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"
                            title="<?=$v['ten'.$lang]?>" /></a>
                </div>
                <div class="socialpage-name">
                    <a href="<?=$v['link']?>" target="_blank" title="<?=$v['ten'.$lang]?>"><?=$v['ten'.$lang]?></a>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php }?>

<?php if(count($socialpage)>0){ ?>
<div class="wrap_socialpage">
    <div class="fixwidth">
        <div class="title-index">SOCIAL MEDIA</div>
        <div class="owl-carousel owl-theme auto_social1">
            <?php foreach($socialpage as $v) { ?>
            <div class="socialpage1">
                <div class="socialpage1-img">
                    <a href="<?=$v['link']?>" target="_blank" title="<?=$v['ten'.$lang]?>"><img
                            onerror="this.src='<?=THUMBS?>/415x300x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/415x300x2/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"
                            title="<?=$v['ten'.$lang]?>" /></a>
                </div>

            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php }?>

<?php if(count($dv)>0){ ?>
<div class="wrap_dichvu">
    <div class="fixwidth d-flex flex-wrap justify-content-between">
        <div class="left-dv">
            <div class="title-dv clearfix"><span><i class="fa fa-star" aria-hidden="true"> </i></span>DỊCH VỤ</div>
            <div class="title-dv1">MỘT SỐ DỊCH VỤ CỦA XÂY DỰNG NHÀ XANH</div>
            <div class=" d-flex flex-wrap justify-content-between">
                <?php foreach($dv as $v) { ?>
                <div class="dc-itm" data-img="<?=THUMBS?>/525x280x1/<?=UPLOAD_NEWS_L.$v['photo']?>">
                    <a href="<?=$v['tenkhongdau'.$lang]?>" title="<?=$v['ten'.$lang]?>"><i class="far fa-building"></i>
                        <?=$v['ten'.$lang]?></a>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="right-dv">
            <img class="img_dv" onerror="this.src='<?=THUMBS?>/525x280x2/assets/images/noimage.png';"
                src="<?=THUMBS?>/525x280x1/<?=UPLOAD_NEWS_L.$dv[0]['photo']?>" alt="<?=$dv[0]['ten'.$lang]?>"
                title="<?=$dv[0]['ten'.$lang]?>" />
        </div>
    </div>
</div>
<?php }?>
<?php if(count($tt)>0){ ?>
<div class="wrap_socialpage news-blocks">
    <div class="fixwidth">
        <?php foreach($tt as $k => $v) {
					$ttnb = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo,mota$lang,ngaytao from #_news where type = ? and id_list=".$v['id']." and noibat > 0 and hienthi > 0 order by stt,id desc",array('tin-tuc'));
				 ?>
        <div class="title-news-blocks"><?=$v['ten'.$lang]?></div>
        <div class="slideshow sl-blocks">
            <p class="control-slideshow prev-slideshow transition"><i class="fas fa-chevron-left"></i></p>
            <div id="slider" class="owl-carousel owl-theme owl-slideshow2">
                <?php foreach($ttnb as $k1 => $v1) {?>
                <div class="item_slider">
                    <div class="border-slider">
                        <a href="<?=$v1['tenkhongdauvi']?>" target="_blank" title="<?=$v1['ten'.$lang]?>"><img
                                onerror="this.src='<?=THUMBS?>/910x380x2/assets/images/noimage.png';"
                                src="<?=THUMBS?>/710x300x1/<?=UPLOAD_NEWS_L.$v1['photo']?>" alt="<?=$v1['ten'.$lang]?>"
                                title="<?=$v1['ten'.$lang]?>" /></a>
                        <?php if($v1['ten'.$lang]!=''){?>
                        <?php }?>
                        <h4 class="entry-title"><a href="<?=$v1['tenkhongdauvi']?>"
                                title="<?=$v1['ten'.$lang]?>"><?=$func->catchuoi($v1['ten'.$lang],30)?></a></h4>
                        <div class="news-date-block">
                            <div class="item_news_big_date"><?=date('d/m/Y',$v1['ngaytao'])?></div>
                            <div class="item_news_big_desc"><?=$func->catchuoi($v1['mota'.$lang],40)?></div>
                        </div>
                        <a href="<?=$v1['tenkhongdauvi']?>" class="see-more">Xem thêm
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="svg-next">
                                <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M256 0C114.6 0 0 114.6 0 256c0 141.4 114.6 256 256 256s256-114.6 256-256C512 114.6 397.4 0 256 0zM406.6 278.6l-103.1 103.1c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25L306.8 288H128C110.3 288 96 273.7 96 256s14.31-32 32-32h178.8l-49.38-49.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l103.1 103.1C414.6 241.3 416 251.1 416 256C416 260.9 414.6 270.7 406.6 278.6z" />
                            </svg>

                        </a>
                    </div>
                </div>
                <?php }?>

            </div>
            <p class="control-slideshow next-slideshow transition"><i class="fas fa-chevron-right"></i></p>
        </div>
        <?php } ?>
        <!-- <div class="loadkhung_news_index">
            <?php foreach($tt as $k => $v) {
					$ttnb = $d->rawQuery("select ten$lang, tenkhongdauvi, id,photo,mota$lang,ngaytao from #_news where type = ? and id_list=".$v['id']." and noibat > 0 and hienthi > 0 order by stt,id desc",array('tin-tuc'));
				 ?>
                <div class="box_news_index">
                    <div class="title-news"><span><?=$v['ten'.$lang]?></span></div>
                    <?php foreach($ttnb as $k1 => $v1) {?>
                    <?php if($k1==0){?>
                    <div class="item_news_big">
                        <a href="<?=$v1['tenkhongdauvi']?>" title="<?=$v1['ten'.$lang]?>"><img
                                onerror="this.src='<?=THUMBS?>/710x300x2/assets/images/noimage.png';"
                                src="<?=THUMBS?>/710x300x1/<?=UPLOAD_NEWS_L.$v1['photo']?>" alt="<?=$v1['ten'.$lang]?>"
                                title="<?=$v1['ten'.$lang]?>" /></a>
                        <div class="item_news_big_name"><a href="<?=$v1['tenkhongdauvi']?>"
                                title="<?=$v1['ten'.$lang]?>"><?=$v1['ten'.$lang]?></a></div>
                        <div class="item_news_big_date"><?=date('d/m/Y',$v1['ngaytao'])?></div>
                        <div class="item_news_big_desc"><?=$v1['mota'.$lang]?></div>
                    </div>
                    <?php }else{?>
                    <div class="item_news_big2">
                        <a href="<?=$v1['tenkhongdauvi']?>" class="post-link"
                            title="<?=$v1['ten'.$lang]?>"><span><?=date('d/m/Y',$v1['ngaytao'])?></span>
                            <span class="name-news"><?=$v1['ten'.$lang]?></span></a>
                    </div>
                    <?php }?>
                    <?php }?>


                </div>
            <?php }?>
        </div> -->
    </div>
</div>
<?php }?>

<!-- <div class="box-thongke-container" id="background-thong-ke">
    <div class="fixwidth" id="background-tieuchi">
        <div class="title-tk clearfix">XÂY DỰNG NHÀ XANH VIỆT NAM</div>
        <div id="counter" class="loadkhung_thongke_index">
            <?php foreach($thongke as $k=>$v){?>
            <div class="item-thongke">
                <div class="counter-value" data-count="<?=$v['solieu']?>">0</div>
                <div class="counter-name"><?=$v['ten'.$lang]?></div>
                <div class="counter-name"><img
                            onerror="this.src='<?=THUMBS?>/710x300x2/assets/images/noimage.png';"
                            src="<?=THUMBS?>/710x300x1/<?=UPLOAD_NEWS_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"
                            title="<?=$v['ten'.$lang]?>" /></div>                
            </div>
            <?php }?>
        </div>
    </div>
</div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
    integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    showNews();
    $('[id-category]').click(function() {
        var id = $(this).attr('id-category');
        var type = $(this).attr('type-ne');

        $.ajax({
            url: "ajax/ajax_house.php",
            method: "POST",
            data: {
                id: id,
                type: type,
            },
            success: function(data) {
                $('.tab-content-2').html(data);
            }

        });
    });

    function showNews(){
        var id = "<?= $_SESSION['cate_id']; ?>";
        var type = 'nha-mau';

        $.ajax({
            url: "ajax/ajax_house.php",
            method: "POST",
            data: {
                id: id,
                type: type,
            },
            success: function(data) {
                $('.tab-content-2').html(data);
            }

        });
    }
})
</script>