<?php
$idl = ($_GET['idl']);
// if($idl != null){
//     $_SESSION['idl'] = $idl;
// }
$idc = ($_GET['idc']);
$page = ($_GET['p']);
if (!isset($page)) {
    $page = 1;
}
?>


<div class="tabbed-content">
    <h3>
        <?= (@$title_cat != '') ? $title_cat : @$title_crumb ?>
    </h3>
</div>
<div class="content-main w-clear">
    <!-- Ul -->
    <ul class="nav nav-tabs tab-product" id="myTab" role="tablist">

        <?php if (!isset($idc)) { ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#" role="tab" aria-controls="" aria-selected="true">
                    Tất cả
                </a>
            </li>
        <?php } ?>
        <?php
        $spcatemenu = $d->rawQuery("select ten$lang, tenkhongdau$lang, id,photo,type from #_product_cat where type = ? and #_product_cat.id_list = ? and  hienthi > 0 order by stt,id desc", array('san-pham', $idl));
        ?>
        <?php if (isset($splistmenu) > 0 && isset($idc) == NULL) {
            foreach ($splistmenu as $key => $value) { ?>
                <li>
                    <a class="nav-link" idl="<?= $value['id'] ?>" data-toggle="tab" href="#" role="tab" aria-controls=""><?= $value['ten' . $lang] ?></a>
                </li>
        <?php }
        }
        ?>
        <?php if (count($spcatemenu) > 0 && isset($idc)) {
            foreach ($spcatemenu as $key => $value) { ?>
                <?php if ($value['id'] == $idc) { ?>
                    <li>
                        <a class="nav-link" idc="<?= $value['id'] ?>" data-toggle="tab" href="#" role="tab" aria-controls=""><?= $value['ten' . $lang] ?></a>
                    </li>
                <?php } ?>
        <?php }
        }  ?>


    </ul>
    <div class="tab-content fixwidth" id="myTabContent">
        <div class="tab-pane fad show active" id="" role="tabpanel" aria-labelledby="">
            <div class="row list-product d-center show-new-page">

            </div>
            <div class="load-more" id="btn_load_more">
                Xem thêm
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!-- <div class="pagination-home"><?= (isset($paging) && $paging != '') ? $paging : '' ?></div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        var page = parseInt("<?= $page ?>");

        showNews();

        function showNews() {
            var idl = "<?= $idl ?>";
            var idc = "<?= $idc ?>";
            $.ajax({
                url: "ajax/ajax_product_paging.php",
                method: "GET",
                data: {
                    idl: idl,
                    idc: idc,
                    // type: type,
                },
                success: function(data) {
                    var nextPage = page + 1;
                    $.ajax({
                        type: "GET",
                        url: "ajax/ajax_loadmore_product.php",
                        data: {
                            idl: idl,
                            idc: idc,
                            page: nextPage,
                        },
                        success: function(data) {
                            if (data.length <= 0) {
                                // $('#alert_kq').html("Đã xem hết tin tức")

                                $('#btn_load_more').hide();
                                // document.querySelector(".alert-warning").style.display="block";
                                return;
                            }
                        }
                    });
                    $('.list-product').html(data);
                }

            });
        }

        $('.nav-link').click(function() {
            page = parseInt("<?= $page ?>");
            $('#btn_load_more').show();

            var idl = $(this).attr('idl');
            var idc = $(this).attr('idc');
            // console.log(idc);
            // var type = $(this).attr('type');

            $.ajax({
                url: "ajax/ajax_product_paging.php",
                method: "GET",
                data: {
                    idl: idl,
                    idc: idc,
                    // type: type
                },
                success: function(data) {
                    var nextPage = page + 1;
                    $.ajax({
                        type: "GET",
                        url: "ajax/ajax_loadmore_product.php",
                        data: {
                            idl: idl,
                            idc: idc,
                            page: nextPage,
                        },
                        success: function(data) {
                            if (data.length <= 0) {
                                // $('#alert_kq').html("Đã xem hết tin tức")

                                $('#btn_load_more').hide();
                                // document.querySelector(".alert-warning").style.display="block";
                                return;
                            }
                        }
                    });
                    $('.list-product').html(data);
                }

            });
        });

        $('#btn_load_more').click(function() {
            var idl = $('.nav-link.active').attr('idl');
            var idc = $('.nav-link.active').attr('idc');
            page = page + 1;
            $.ajax({
                type: "GET",
                url: "ajax/ajax_loadmore_product.php",
                data: {
                    idl: idl,
                    idc: idc,
                    page: page,
                },
                success: function(data) {
                    var nextPage = page + 1;
                    $.ajax({
                        type: "GET",
                        url: "ajax/ajax_loadmore_product.php",
                        data: {
                            idl: idl,
                            idc: idc,
                            page: nextPage,
                        },
                        success: function(data) {
                            if (data.length <= 0) {
                                // $('#alert_kq').html("Đã xem hết tin tức")

                                $('#btn_load_more').hide();
                                // document.querySelector(".alert-warning").style.display="block";
                                return;
                            }
                        }
                    });
                    $('.list-product').append(data);
                }
            });
        });
    })
</script>