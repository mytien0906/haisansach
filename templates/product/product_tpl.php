
<div class="tabbed-content">
    <h2 style="text-transform: capitalize;">
        <?= (@$title_cat != '') ? $title_cat : @$title_crumb ?>
    </h2>
</div>

<div class="content-main w-clear">
    <ul class="nav nav-tabs tab-product" id="myTab" role="tablist">

        <?php if (isset($product) && count($product) > 0) { ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link active
                <?php
                $_SESSION['list_id'] = $product[0]['id_list'];
                ?>
                " idl="<?= $product[0]['id_list'] ?>" data-toggle="tab" href="#" role="tab" aria-controls="" aria-selected=" <?php if ($key == 0) {
                                                                                                                                    echo "true";
                                                                                                                                } else {
                                                                                                                                    echo "false";
                                                                                                                                } ?>">Tất cả</a>
            </li>
        <?php }
        ?>
        <?php foreach ($get_product_cate as $key => $item) {
        ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?php if ($key == 0) {
                                        $_SESSION['cate_id'] = $item['id'];
                                    } ?>" idc="<?= $item['id'] ?>" data-toggle="tab" href="#" role="tab" aria-controls="" type-ne="<?= $item['type'] ?>" aria-selected=" <?php if ($key == 0) {
                                                                                                                                                                                echo "true";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "false";
                                                                                                                                                                            } ?>">
                    <?= $item['tenvi'] ?>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fad show active" id="" role="tabpanel" aria-labelledby="">
            <div class="row list-product">

            </div>
            <div class="pagination-home"><?= (isset($pagingCate) && $pagingCate != '') ? $pagingCate : '' ?></div>

        </div>
    </div>
    <div class="clear"></div>
    <!--  -->

</div>
<?php if ($noidung_page != '') { ?>
    <div class="noidung_page_product">
        <div class="meta-toc">
            <div class="box-readmore">
                <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
            </div>
        </div>
        <div id="toc-content"><?= htmlspecialchars_decode($noidung_page) ?></div>
    </div>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha512-k2WPPrSgRFI6cTaHHhJdc8kAXaRM4JBFEDo1pPGGlYiOyv4vnA0Pp0G5XMYYxgAPmtmv/IIaQA6n5fLAyJaFMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        showNews();
        $('.nav-link').click(function() {
            var idl = $(this).attr('idl');
            var idc = $(this).attr('idc');
            var type = $(this).attr('type-ne');
            $.ajax({
                url: "ajax/ajax_house.php?p=",
                method: "POST",
                data: {
                    idl: idl,
                    idc: idc,
                    type: type
                },
                success: function(data) {
                    $('.list-product').html(data);
                }

            });
        });

        function showNews() {

            var idl = "<?= $_SESSION['list_id']; ?>";
            var idc = "<?= $_SESSION['cate_id']; ?>";
            var page = "<?= $_SESSION['page']; ?>";
            var type = 'san-pham';

            $.ajax({
                url: "ajax/ajax_house.php",
                method: "POST",
                data: {
                    idl: idl,
                    idc: idc,
                    type: type,
                },
                success: function(data) {
                    $('.list-product').html(data);
                }

            });
        }
    })
</script>