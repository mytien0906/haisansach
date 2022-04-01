<!-- Js Config -->
<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var CONFIG_BASE = '<?= $config_base ?>';
    var WEBSITE_NAME = '<?= (isset($setting['ten' . $lang]) && $setting['ten' . $lang] != '') ? $setting['ten' . $lang] : '' ?>';
    var TIMENOW = '<?= date("d/m/Y", time()) ?>';
    var SHIP_CART = <?= (isset($config['order']['ship']) && $config['order']['ship'] == true) ? 'true' : 'false' ?>;
    var GOTOP = 'assets/images/top.png';
    var LANG = {
        'no_keywords': "<?= chuanhaptukhoatimkiem ?>",
        'delete_product_from_cart': "<?= banmuonxoasanphamnay ?>",
        'no_products_in_cart': "<?= khongtontaisanphamtronggiohang ?>",
        'wards': "<?= phuongxa ?>",
        'back_to_home': "<?= vetrangchu ?>",
    };
</script>

<!-- Js Files -->
<?php
$js->setCache("cached");
$js->setJs("./assets/js/jquery.min.js");
$js->setJs("./assets/bootstrap/bootstrap.js");
$js->setJs("./assets/js/wow.min.js");
$js->setJs("./assets/owlcarousel2/owl.carousel.js");
//$js->setJs("./assets/magiczoomplus/magiczoomplus.js");
//$js->setJs("./assets/simplyscroll/jquery.simplyscroll.js");
//$js->setJs("./assets/slick/slick.js");
$js->setJs("./assets/fancybox3/jquery.fancybox.js");
$js->setJs("./assets/toc/toc.js");
$js->setJs("./assets/js/lazyload.min.js");
$js->setJs("./assets/js/functions.js");
// <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
// 	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
// 	<script src="assets/slick/slick.min.js"></script>
$js->setJs("./assets/slick/slick.min.js");
$js->setJs("./assets/js/apps.js");
echo $js->getJs();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./assets/js/lazyload.min.js"></script>
<script>
    var myLazyLoad = new LazyLoad({
        elements_selector: ".lazy"
    });
</script>
<?php if ($source == 'index') { ?>
    <script type='text/javascript' src='assets/js/jquery.animateNumber.min.js'></script>
    <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
<?php } ?>
<?php /*if($template=='index/index'){?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dc-itm').hover(function() {
                let img= $(this).attr('data-img'); 
                $('.img_dv').attr('src',img);
            });

            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 7,
                slidesToScroll: 1,
                infinite: true,
                autoPlay:true,
                centerPadding: '0px',
                asNavFor: '.slider-for',
                dots: false,
                centerMode: true,
                focusOnSelect: true,
                responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
                ]           
            });
        });
    </script>

<?php }*/ ?>
<script type="text/javascript">
    
</script>
<?php if ($template == 'tinhgia/tinhgia') { ?>
    <script type='text/javascript' src='./assets/js/thicong.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.custom-tab-menu3 a').click(function() {
                $('.custom-tab-menu3 a').removeClass('tabsel');
                $(this).addClass('tabsel');
                let id = $(this).attr('data-id');
                $('.stepcontent').css({
                    'display': 'none'
                });
                $('#' + id).css({
                    'display': 'block'
                });
            });
        });
    </script>
<?php } ?>
<?php if ($template == 'duan/news_detail') { ?>
    <script type='text/javascript' src='./assets/unitegallery/js/unitegallery.min.js'></script>
    <script type='text/javascript' src='./assets/unitegallery/themes/compact/ug-theme-compact.js'></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#gallery").unitegallery({

            });
        });
    </script>
<?php } ?>


<script type="text/javascript">
    $(document).ready(function() {
        var page = 1;
        $('#btn_xt').click(function(){
            page = page + 1;
            $.ajax({
                type: "GET",
                url: "ajax/ajax_ppage.php",
                data: {page:page},
                success: function(data){
                    if(data.length == 0){
                        $('#alert_kq').html("Đã xem hết tin tức")
                        $('#btn_xt').hide();
                        return;
                    }
                    $('.show-new-page').append(data);
                }
            });
        });

        jQuery(document).ready(function() {
            var page = 1;
            var type = "<?= $com ?>"
            // document.querySelector(".alert-warning").style.display="none";
            $('#btn_xt').click(function() {
                page = page + 1;
                $.ajax({
                    type: "GET",
                    url: "ajax/ajax_ppage.php",
                    data: {
                        page: page,
                        type: type,
                    },
                    // beforeSend: function(data) {
                    //     $('#alert_kq').hide();
                    // },
                    success: function(data) {
                        if (data.length == 0) {
                            // $('#alert_kq').html("Đã xem hết tin tức")
                            $('#btn_xt').hide();
                            // document.querySelector(".alert-warning").style.display="block";
                            return;
                        }
                        $('.show-new-page').append(data);
                    }
                });
            });
            jQuery('.catagory-title').on("click", function() {
                if ($('.catagory-list__fix').css('display') == 'none') {
                    $('.catagory-list__fix').animate({
                        height: 'show'
                    }, 400);
                } else {
                    $('.catagory-list__fix').animate({
                        height: 'hide'
                    }, 200);
                }
            });
            jQuery('.catagory-list__fix li span').on("click", function() {
                let id = $(this).attr('data-id');
                if ($('#cat2__fix_' + id).css('display') == 'none') {
                    $('#cat2__fix_' + id).animate({
                        height: 'show'
                    }, 400);
                } else {
                    $('#cat2__fix_' + id).animate({
                        height: 'hide'
                    }, 200);
                }
            });
            jQuery('.catagory-list li span').on("click", function() {
                let id = $(this).attr('data-id');
                if ($('#cat2_' + id).css('display') == 'none') {
                    $('#cat2_' + id).animate({
                        height: 'show'
                    }, 400);
                } else {
                    $('#cat2_' + id).animate({
                        height: 'hide'
                    }, 200);
                }
            });
        });
    });
    $(document).ready(function() {

        // $('.support-content').hide();

        // $('a.btn-support').click(function(e) {
        //     e.stopPropagation();
        //     $('.support-content').slideToggle();
        // });
        // $('.support-content').click(function(e) {
        //     e.stopPropagation();
        // });
        // $(document).click(function() {
        //     $('.support-content').slideUp();
        // });

        $('.tailvideo_item_owl').click(function() {
            let id = $(this).attr('data-src');
            let img = $(this).attr('data-image');
            let name = $(this).attr('data-name');
            $('.pic-video').attr('data-src', id);
            $('.pic-video img').attr('src', img);
            $('.name-video').html(name);
        });
    });

    $(document).on('click', '.menu_mobi .menulicha', function(event) {
        $('.close_menu').trigger('click');
        return false;
    });

    var menu_mobi = $('.menu_cap_cha').html();
    $('.menu_mobi_add').append('<span class="close_menu">X</span><ul>' + menu_mobi + '</ul>');

    $('.menu_mobi_add ul li ul').removeClass('menu_cap_con');
    $('.menu_mobi_add ul li ul').css({
        'display': 'none'
    });
    $('.menu_mobi_add ul li ul li ul').removeClass('menu_cap_2');
    $('.menu_mobi_add ul li ul li ul').css({
        'display': 'none'
    });
    $('.menu_mobi_add ul li ul li ul li ul').removeClass('menu_cap_3');
    $('.menu_mobi_add ul li ul li ul li ul').css({
        'display': 'none'
    });
    $('.menu_mobi_add ul li>a>i.desktop-li').remove();

    $(".menu_mobi_add ul li").each(function(index, element) {
        if ($(this).children('ul').children('li').length > 0) {
            $(this).children('a').append('<i class="fas fa-chevron-right"></i>');
        }
    });
    $(".menu_mobi_add ul li a i").click(function() {
        if ($(this).parent('a').hasClass('active2')) {
            $(this).parent('a').removeClass('active2');
            if ($(this).parent('a').parent('li').children('ul').children('li').length > 0) {
                $(this).parent('a').parent('li').children('ul').css({
                    display: 'none',
                });
                //$(this).parent('a').parent('li').children('ul').hide(300);
                return false;
            }
        } else {
            $(this).parent('a').addClass('active2');
            if ($(this).parents('li').children('ul').children('li').length > 0) {
                //$(".menu_m ul li ul").hide(0);
                //$(this).parents('li').children('ul').show(300);
                $(".menu_m ul li ul").css({
                    display: 'none',
                });
                $(this).parents('li').children('ul').css({
                    display: 'block',
                });
                return false;
            }
        }
    });

    $('.icon_menu_mobi,.close_menu,.menu_baophu').click(function() {
        if ($('.menu_mobi_add').hasClass('menu_mobi_active')) {
            $('.menu_mobi_add').removeClass('menu_mobi_active');
            $('.menu_baophu').fadeOut(300);
        } else {
            $('.menu_mobi_add').addClass('menu_mobi_active');
            $('.menu_baophu').fadeIn(300);
        }
        return false;
    });
</script>
<?php if (isset($config['googleAPI']['recaptcha']['active']) && $config['googleAPI']['recaptcha']['active'] == true) { ?>
    <!-- Js Google Recaptcha V3 -->
    <?php if ($source == 'contact' || $source == 'dangkydaily') { ?>
        <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>"></script>
        <script type="text/javascript">
            grecaptcha.ready(function() {


                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'contact'
                }).then(function(token) {
                    var recaptchaResponseContact = document.getElementById('recaptchaResponseContact');
                    recaptchaResponseContact.value = token;
                });
                grecaptcha.execute('<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', {
                    action: 'Newsletter'
                }).then(function(token) {
                    var recaptchaResponseNewsletter = document.getElementById('recaptchaResponseNewsletter');
                    recaptchaResponseNewsletter.value = token;
                });

            });
        </script>
    <?php } ?>
<?php } ?>

<?php if (isset($config['oneSignal']['active']) && $config['oneSignal']['active'] == true) { ?>
    <!-- Js OneSignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script type="text/javascript">
        var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "<?= $config['oneSignal']['id'] ?>"
            });
        });
    </script>
<?php } ?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->setAddons('script-main', 'script-main', 0.5); ?>
<?= $addons->getAddons(); ?>

<!-- Js Body -->
<?= htmlspecialchars_decode($setting['bodyjs']) ?>