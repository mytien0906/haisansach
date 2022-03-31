<div class="tabbed-content">
    <h3>

        <?= (@$title_cat != '') ? $title_cat : @$title_crumb ?>
    </h3>
</div>
<div class="content-main w-clear">
    <?php if (isset($list_all_products) && count($list_all_products) > 0) { ?>
        <div class="row list-product">
            <?php foreach ($list_all_products as $key => $value) { ?>
                <div class="col-2 cover-content">
                    <a href="<?= $value[$sluglang] ?>" class="image">
                        <span>
                            <img onerror="this.src='<?= THUMBS ?>/380x270x2/assets/images/noimage.png';" windown.location.href="<?php $value[$sluglang] ?>" src="/upload/product/<?= $value['photo'] ?>" alt="<?= $value['ten' . $lang] ?>" /></span>
                    </a>
                    <a href="<?php echo $value['tenkhongdauvi'] ?>">
                        <h6><?= $value["tenvi"] ?></h6>
                    </a>
                    <?php if ($value['motanganvi']) { ?>
                        <div class="product-des-wrap">
                            <p><?php echo htmlspecialchars_decode($value['motanganvi']) ?>
                            </p>
                        </div>
                    <?php } ?>
                    <div class="price">
                        <div>
                            <p><?= $func->convertPrice($value['gia']) ?></p>
                            <p class="price-discount"><?= $func->convertPrice($value['giamoi']) ?></p>
                        </div>
                        <div class="discount"><?= $func->convertPrice($value['giakm']) ?>%</div>
                    </div>
                    <button class="buy">Liên hệ</button>
                </div>
            <?php } ?>
        </div>
    <?php } else if (isset($pro_list) && count($pro_list) > 0) { ?>
        <div class="row list-product">
            <?php foreach ($pro_list as $key => $value) { ?>
                <div class="col-2 cover-content">
                    <a href="<?= $value[$sluglang] ?>" class="image">
                        <span>
                            <img onerror="this.src='<?= THUMBS ?>/380x270x2/assets/images/noimage.png';" windown.location.href="<?php $value[$sluglang] ?>" src="/upload/product/<?= $value['photo'] ?>" alt="<?= $value['ten' . $lang] ?>" /></span>
                    </a>
                    <a href="<?php echo $value['tenkhongdauvi'] ?>">
                        <h6><?= $value["tenvi"] ?></h6>
                    </a>
                    <?php if ($value['motanganvi']) { ?>
                        <div class="product-des-wrap">
                            <p><?php echo htmlspecialchars_decode($value['motanganvi']) ?>
                            </p>
                        </div>
                    <?php } ?>
                    <div class="price">
                        <div>
                            <p><?= $func->convertPrice($value['gia']) ?></p>
                            <p class="price-discount"><?= $func->convertPrice($value['giamoi']) ?></p>
                        </div>
                        <div class="discount"><?= $func->convertPrice($value['giakm']) ?>%</div>
                    </div>
                    <button class="buy">Liên hệ</button>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="alert alert-warning" role="alert">
            <strong><?= khongtimthayketqua ?></strong>
        </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div>
</div>
<?php if ($noidung_page != '') { ?>
    <div class="noidung_page_product">
        <div class="meta-toc">
            <div class="box-readmore">
                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
            </div>
        </div>
        <!-- <div id="toc-content"><?= htmlspecialchars_decode($noidung_page) ?></div> -->
    </div>
<?php } ?>