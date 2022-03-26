<?php
session_start();
?>
<!-- San pham moi nhat -->
<div class="new-product">
    <div class="fixwidth">
        <div class="tabbed-content">
            <h3>Sản phẩm mới nhất</h3>
        </div>
        <div class="row list-product">
            <?php
            foreach ($newproduct as $key => $value) {
            ?>
                <div class="col-2 cover-content">

                    <a href="<?= $value[$sluglang]?>" class="image">
                        <img src="/upload/product/<?= $value['photo'] ?>" alt="">
                    </a>
                    <a href="<?php  echo $value['tenkhongdauvi']?>">
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
                            <p><?= $value['gia'] ?></p>
                            <p class="price-discount"><?= $value['giamoi'] ?></p>
                        </div>
                        <div class="discount"><?= $value['giakm'] ?>%</div>
                    </div>
                    <button class="buy">Liên hệ</button>
                </div>
            <?php }  ?>


        </div>
    </div>
</div>
<!-- San pham noi bat -->
<div class="new-product">
    <div class="fixwidth">
        <div class="tabbed-content">
            <h3>Sản phẩm phổ biến</h3>
        </div>
        <div class="row list-product">
            <?php
            foreach ($popularproduct as $key => $value) {
            ?>
                <div class="col-2 cover-content">
                    <div class="product-img">
                        <a href="<?php $value['tenkhongdauvi'] ?>" class="image">
                            <img src="/upload/product/<?= $value['photo'] ?>" alt="">
                        </a>
                        <img class="img-tag" src="/upload/product/ghe-xanh-loai-1_10de2b42-6e90-4228-a574-025c9fe5961d-removebg-preview.png" alt="">
                    </div>
                    <a href="$value['tenkhongdauvi']">
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
                            <p><?= $value['gia'] ?></p>
                            <p class="price-discount"><?= $value['giamoi'] ?></p>
                        </div>
                        <div class="discount"><?= $value['giakm'] ?>%</div>
                    </div>
                    <button class="buy">Liên hệ</button>
                </div>
            <?php }  ?>
        </div>
    </div>
</div>
<!-- Danh muc -->
<div class="category-block">
    <div class="tabbed-content">
        <h3>Danh mục</h3>
    </div>
    <div class="row">
        <?php foreach ($splistmenu as $key => $value) {
            // var_dump($splistmenu).die();
        ?>
            <div class="col-md-3 cover-content">
                <div class="product-img">
                    <a href="<?php $value['tenkhongdauvi'] ?>" class="image">
                        <img src="/upload/product/<?= $value['photo'] ?>" alt="">
                    </a>
                </div>
                <a href="$value['tenkhongdauvi']" class="product-name">
                    <h6><?= $value["tenvi"] ?></h6>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Banner tieu chi -->
<div class="banner-tieu-chi">
    <div class="fixwidth">
        <div class="row">
            <?php foreach ($criteria_list as $key => $value) { ?>
                
                <div class="col-md-3">
                        <a href="" class="link-tieu-chi">
                            <img src="/upload/photo/<?= $value['photo'] ?>" alt="">
                        </a>
                </div>
        <?php } ?>
        </div>
    </div>
</div>


<!-- <div class="box-thongke-container" id="background-thong-ke">
    <div class="fixwidth" id="background-tieuchi">
        <div class="title-tk clearfix">XÂY DỰNG NHÀ XANH VIỆT NAM</div>
        <div id="counter" class="loadkhung_thongke_index">
            <?php foreach ($thongke as $k => $v) { ?>
            <div class="item-thongke">
                <div class="counter-value" data-count="<?= $v['solieu'] ?>">0</div>
                <div class="counter-name"><?= $v['ten' . $lang] ?></div>
                <div class="counter-name"><img
                            onerror="this.src='<?= THUMBS ?>/710x300x2/assets/images/noimage.png';"
                            src="<?= THUMBS ?>/710x300x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>"
                            title="<?= $v['ten' . $lang] ?>" /></div>                
            </div>
            <?php } ?>
        </div>
    </div>
</div> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>