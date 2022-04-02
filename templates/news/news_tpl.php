<h3 class="tabbed-content title"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h3>
<div class="row">
    <?php if (count($news) > 0) {
    ?>
        <div class="col-md-12 show-new-page">
            <?php foreach ($news as $k => $v) { ?>
                <div class="row mb-10 ">
                    <div class="col-md-4">
                        <p class="pic-news scale-img">
                            <a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/320x240x1/assets/images/noimage.png';" src="<?= THUMBS ?>/320x240x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>">
                            </a>
                        </p>
                    </div>
                    <div class="col-md-7">

                        <div class="info-news">
                            <h3 class="name-news"><a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['ten' . $lang] ?>"><?= $v['ten' . $lang] ?></a></h3>
                            <p class="time-news"><?= ngaydang ?>: <?= date("d/m/Y h:i A", $v['ngaytao']) ?></p>
                            <div class="desc-news text-split"><?= $v['mota' . $lang] ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="load-more" id="btn_xt">
            Xem thêm
        </div>

        <div class="clear"></div>
        <!-- <div cladss="paging-product"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?= khongtimthayketqua ?></strong>
        </div>
    <?php } ?>
    <!-- <div class="alert alert-warning" role="alert">
        <strong id="alert_kq"></strong>
    </div> -->

</div>
<?php if ($noidung_page != '') { ?>
    <div class="noidung_page">
        <div class="meta-toc">
            <div class="box-readmore">
                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
            </div>
        </div>
        <div id="toc-content"><?= htmlspecialchars_decode($noidung_page) ?></div>
    </div>
<?php } ?>
<script>
</script>