<div class="boxfooter_container">
    <div class="fixwidth d-flex justify-content-between flex-wrap">
        <div class="boxfooter_left">
            <p class="boxfooter_title">GIỚI THIỆU</p>
            <div class="boxbaiviet_list">
                <?php foreach ($gtlistmenu as $key => $v) {?>
                <div class="box_chinhsach_item"><a href="<?=$v['tenkhongdauvi']?>" title="<?=$v['tenvi']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="itro-icon">
                            <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M246.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L178.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C47.63 444.9 55.81 448 64 448s16.38-3.125 22.62-9.375l160-160C259.1 266.1 259.1 245.9 246.6 233.4zM438.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L370.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C239.6 444.9 247.8 448 256 448s16.38-3.125 22.62-9.375l160-160C451.1 266.1 451.1 245.9 438.6 233.4z" />
                        </svg>
                        <?=$v['tenvi']?></a></div>

                <?php }?>

            </div>
        </div>
        <div class="boxfooter_center">
            <p class="boxfooter_title">THÔNG TIN</p>
            <div class="boxbaiviet_list">
                <?php foreach ($tht as $key => $v) {?>

                <div class="box_chinhsach_item"><a href="<?=$v['tenkhongdauvi']?>" title="<?=$v['tenvi']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="itro-icon">
                            <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M246.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L178.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C47.63 444.9 55.81 448 64 448s16.38-3.125 22.62-9.375l160-160C259.1 266.1 259.1 245.9 246.6 233.4zM438.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L370.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C239.6 444.9 247.8 448 256 448s16.38-3.125 22.62-9.375l160-160C451.1 266.1 451.1 245.9 438.6 233.4z" />
                        </svg>
                        <?=$v['tenvi']?></a></div>
                <?php }?>
                <div class="box_chinhsach_item"><a href="/video" title="video">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="itro-icon">
                            <!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M246.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L178.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C47.63 444.9 55.81 448 64 448s16.38-3.125 22.62-9.375l160-160C259.1 266.1 259.1 245.9 246.6 233.4zM438.6 233.4l-160-160c-12.5-12.5-32.75-12.5-45.25 0s-12.5 32.75 0 45.25L370.8 256l-137.4 137.4c-12.5 12.5-12.5 32.75 0 45.25C239.6 444.9 247.8 448 256 448s16.38-3.125 22.62-9.375l160-160C451.1 266.1 451.1 245.9 438.6 233.4z" />
                        </svg>
                        Video clips</a></div>
            </div>
            <p class="boxfooter_title mgt-20">ĐĂNG KÝ NHẬN TIN</p>
            <form method="post" name="frm" class="frm validation-newsletter" action="" enctype="multipart/form-data">
                <div class="item-position">
                    <input name="email-newsletter" type="email" id="email-newsletter" data-key="email-newsletter"
                        class="input_check" placeholder="Email" />
                    <div class="error_mes" id="error-email-newsletter"></div>
                </div>
                <button type="submit" name="submit-newsletter" class="click_ajax">Gửi đi</button>
                <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
            </form>
        </div>

        <div class="clear boxfooter_right">
            <p class="boxfooter_title">LIÊN HỆ</p>
            <div class="boxfooter_info"><?=htmlspecialchars_decode($footer['noidung'.$lang])?></div>
            <p class="boxfooter_title mgt-20">KẾT NỐI VỚI CHÚNG TÔI</p>
            <div class="social2">
                <?php foreach($social1 as $v) { ?>
                <a href="<?=$v['link']?>" class="ftmxh" target="_blank" title="<?=$v['ten'.$lang]?>"><img
                        onerror="this.src='<?=THUMBS?>/45x45x2/assets/images/noimage.png';"
                        src="<?=THUMBS?>/45x45x2/<?=UPLOAD_PHOTO_L.$v['photo']?>" alt="<?=$v['ten'.$lang]?>"
                        title="<?=$v['ten'.$lang]?>" /></a>
                <?php }?>
            </div>
        </div>
    </div>
</div>