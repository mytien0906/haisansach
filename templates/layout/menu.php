<?php

?>
<div class="header-cachtop">
    <div class="header">
        <div class="header background-head">
            <div class="top-header">
                <div class="container">
                    <form action="tim-kiem" method="get" class="form-inline my-2 my-lg-0 frm_timkiem">
                        <input name="keyword" autocomplete="off" type="text" class="input" id="keyword" placeholder="Bạn tìm gì hôm nay" onkeypress="doEnter(event,'keyword');">
                        <button type="submit" value="" class="nut_tim" onclick="onSearch('keyword');"><i class="fal fa-search"></i></button>

                    </form>
                </div>
            </div>
            <div class="fixwidth d-flex justify-content-between flex-wrap">
                <!-- <div class="header_left align-self-center">
                    <a class="header_logo" href=""><img
                            onerror="this.src='thumbs/0x85x2/assets/images/noimage.png';"
                            src="thumbs/0x85x2/upload/photo/hshglogo-removebg-preview-2193.png" /></a>
                </div> -->
                <div class="boxmenu_middle align-self-center ">

                </div>
                <!-- <div class="boxmenu_right d-flex align-self-center justify-content-between">

                <div class="icon-head d-flex align-self-center">
                    <div class="icon-img align-self-center"><i class="fas fa-phone-volume"></i></div>
                    <div class="icon-info align-self-center">
                        <div>Đặt hàng nhanh</div>
                        <div><strong>0965 949 779</strong></div>
                    </div>
                </div>
            </div> -->
            </div>
        </div>
        <div class="bottom-header" id="myHeader">
            <div class="fixwidth">
                <div class="header_left align-self-center">
                    <a class="header_logo" href=""><img onerror="this.src='<?= THUMBS ?>/0x100x2/assets/images/noimage.png';" src="<?= THUMBS ?>/0x100x2/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>

                </div>
                <div class="menu_mobi_add"></div>
                <div class="menu_mobi align-self-center">
                    <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>
                    <p class="menu_baophu"></p>
                    <a href="" class="home_mobi">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="boxmenu_right d-flex align-self-center justify-content-between flex-wrap">
                    <div class="menu">
                        <ul class="menu_cap_cha nav">
                            <li class=" <?= $source == 'index' ? 'active' : '' ?>"><a href="" title="TRANG CHỦ">Trang chủ</a></li>
                            <li class=" <?= $com == 'gioi-thieu' ? 'active' : '' ?>"><a href="gioi-thieu" title="Giới thiệu">Giới thiệu
                                </a>
                            </li>

                            <li class=" <?= $com == 'san-pham' ? 'active' : '' ?>"><a href="san-pham" title="Sản phẩm">Sản phẩm
                                    <?php if ($splistmenu) { ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?>
                                </a>
                                <?php if ($splistmenu) { ?>
                                    <ul class="sub-menu-list">
                                        <?php foreach ($splistmenu as $key => $value) {
                                            $spcatemenu = $d->rawQuery("select ten$lang, tenkhongdau$lang, id,photo,type from #_product_cat where type = ? and #_product_cat.id_list = ? and  hienthi > 0 order by stt,id desc", array('san-pham', $value['id']));
                                        ?>
                                            
                                            <li class="sub-menu-item">
                                                <a href="<?= $value[$sluglang] ?>?idl=<?= $value['id'] ?>"><?= $value['ten' . $lang] ?></a>
                                                <?php if (isset($spcatemenu) && count($spcatemenu) > 0) {
                                                ?>
                                                    <ul class="sub-menu-cat">
                                                        <?php foreach ($spcatemenu as $k => $v) { ?>
                                                            <li>
                                                                <a href="<?= $value[$sluglang] ?>?idl=<?= $value['id'] ?>&idc=<?= $v['id'] ?>"><?= $v['ten' . $lang] ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>

                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>

                            <li class=" <?= $com == 'khuyen-mai' ? 'active' : '' ?>"><a href="khuyen-mai" title="Khuyến mãi">Khuyến mãi
                                </a>
                            </li>
                            <li style="cursor: default;">
                                <a href="#" title="Dịch vụ">Dịch vụ
                                    <?php if ($dvlistmenu) {
                                    ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?>
                                </a>
                                <?php if (isset($dvlistmenu) || isset($dkythanhvien) || isset($chinhsachkh) || isset($chinhsachbm)) { ?>
                                    <ul class="sub-menu-list">
                                        <li class="sub-menu-item">
                                            <a href="dich-vu">Chính sách quy định chung</a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="<?= $chinhsachkh['type']  ?>">Chính sách khách hàng thân thiết</a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="<?= $chinhsachbm['type']  ?>">Chính sách bảo mật thông tin</a>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li class=" <?= $com == 'tin-tuc' ? 'active' : '' ?>"><a href="tin-tuc" title="TIN TỨC">Tin tức
                                    <?php if ($ttlistmenu) { ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?>
                                </a>
                                <?php if ($ttlistmenu) { ?>
                                    <ul class="">
                                        <?php foreach ($ttlistmenu as $c => $cat) { ?>
                                            <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li class=" <?= $com == 'lien-he' ? 'active' : '' ?>"><a href="lien-he" title="LIÊN HỆ">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>