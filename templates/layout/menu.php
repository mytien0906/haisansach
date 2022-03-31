<style>
    .temmp {
        position: absolute;
        right: -100%;
        width: 100%;
        top: 100%;
        transition: all ease 0.5s;
        z-index: 99;
        display: none;
    }

    .menu_cap_con:hover .temmp {
        display: block;
    }
</style>
<div class="header-cachtop">


    <div class="header">
        <div class="header background-head">
            <div class="top-header">
                <div class="container">
                    <form class="form-inline my-2 my-lg-0 frm_timkiem">
                        <input autocomplete="off" type="text" class="input" id="keyword" placeholder="Bạn tìm gì hôm nay" onkeypress="doEnter(event,'keyword');">
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
            <div class="fixwidth d-flex justify-content-between flex-wrap">
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
                        <ul class="menu_cap_cha d-flex justify-content-center">
                            <li class="menulicha <?= $source == 'index' ? 'active' : '' ?>"><a href="" title="TRANG CHỦ">Trang chủ</a></li>
                            <li class="menulicha <?= $com == 'gioi-thieu' ? 'active' : '' ?>">
                                <a href="gioi-thieu" title="GIỚI THIỆU">Giới thiệu</a>
                                <!-- <?php if ($gtlistmenu) { ?>
                                    <ul class="menu_cap_con">
                                        <?php foreach ($gtlistmenu as $c => $cat) { ?>
                                            <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a>
                                                <ul class="temmp">
                                                    <li><a href="">hello</a></li>
                                                    <li><a href="">hello</a></li>
                                                    <li><a href="">hello</a></li>
                                                    <li><a href="">hello</a></li>
                                                </ul>
                                            </li>
                                        <?php } ?>
                                    </ul> -->
                            <?php } ?>
                            </li>
                            <li class="menulicha"><a href="san-pham" title="Sản phẩm">Sản phẩm
                                    <?php if ($splistmenu) {
                                    ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?>
                                    <?php
                                    if (isset($splistmenu)) { ?>
                                        <ul class="menu_cap_con">
                                            <?php foreach ($splistmenu as $key => $value) { ?>
                                                <li><a href="<?= $value[$sluglang] ?>?idl=<?= $value['id'] ?>"><?= $value['ten' . $lang] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </a>

                            </li>

                            <li class="menulicha <?= $com == 'khuyen-mai' ? 'active' : '' ?>"><a href="khuyen-mai" title="KHUYẾN MÃI">Khuyến mãi
                                    <!-- <?php if ($splistmenuhouse) { ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?> -->
                                </a>
                                <!-- <?php if ($splistmenuhouse) { ?>
                                    <ul class="menu_cap_con">
                                        <?php foreach ($splistmenuhouse as $c => $cat) { ?>
                                            <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?> -->
                            </li>

                            <li class="menulicha" style="cursor:default"><a title="DỊCH VỤ">Dịch vụ
                                    <?php
                                    if (isset($dvlistmenu) || isset($dkythanhvien) || isset($chinhsachkh) || isset($chinhsachbm)) { ?>
                                        <ul class="menu_cap_con">
                                            <li><a href="<?= $dkythanhvien['type'] ?>">Đăng ký thẻ thành viên</a></li>
                                            <li><a href="dich-vu">Chính sách quy định chung</a></li>
                                            <li><a href="<?= $chinhsachkh['type'] ?>">Chính sách khách hàng thân thiết</a></li>
                                            <li><a href="<?= $chinhsachbm['type'] ?>">Chính sách bảo mật thông tin</a></li>
                                        </ul>
                                    <?php } ?>


                                </a>

                            </li>
                            <li class="menulicha <?= $com == 'tin-tuc' ? 'active' : '' ?>"><a href="tin-tuc" title="TIN TỨC">Tin tức
                                    <?php if ($ttlistmenu) { ?>
                                        <i class="desktop-li fal fa-angle-down"></i>
                                    <?php } ?>
                                </a>
                                <?php if ($ttlistmenu) { ?>
                                    <ul class="menu_cap_con">
                                        <?php foreach ($ttlistmenu as $c => $cat) { ?>
                                            <li><a title="<?= $cat['ten' . $lang] ?>" href="<?= $cat[$sluglang] ?>"><?= $cat['ten' . $lang] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <li class="menulicha <?= $com == 'lien-he' ? 'active' : '' ?>"><a href="lien-he" title="LIÊN HỆ">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>