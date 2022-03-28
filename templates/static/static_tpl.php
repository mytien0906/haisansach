<style>
    .recruit-content {
        min-height: 200px;
        border: 1px solid #0e1c47;
        padding-left: 2rem;
        padding-right: 2rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        border-radius: 10px;
        max-width: 786px;
        margin: 0px auto;
    }

    .recruit-content .stt {
        font-size: 1.4rem;
        margin-right: 1rem;
        line-height: 1.75rem;
        font-weight: 700;
    }

    .recruit-content .des {
        font-size: 1.2rem;
    }

    .btn-send {
        border-radius: 9999px;
        box-shadow: none !important;
        border: 1px solid var(--bg-color);
        background-color: var(--bg-color);
        text-align: center;
    }

    .btn-send-link {
        box-sizing: border-box;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
        outline: none;
        border: none;
        -webkit-tap-highlight-color: transparent;
        display: inline-block;
        white-space: nowrap;
        text-decoration: none;
        vertical-align: baseline;
        text-align: center;
        margin: 0;
        min-width: 64px;
        line-height: 36px;
        padding: 0 16px;
        border-radius: 4px;
        overflow: visible;
        transform: translate3d(0, 0, 0);
        transition: background 400ms cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 280ms cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-send:hover {
        background: #fff;
    }

    .btn-send .btn-send-link span {
        /* touch-action: manipulation;
        top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    pointer-events: none;
    border-radius: inherit; */
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
    }

    .btn-send:hover span {
        color: var(--bg-color) !important;
        border: var(--bg-color);
    }

    .recruit-content .row-wrap .row {
        padding-bottom: 7px;
        border-bottom: 1px solid #e5e7eb;
        margin-bottom: 7px;
        align-items: center;
    }

    .recruit-content .row-wrap .row:last-child {
        border-bottom: none;
    }

    .text-contact {
        font-size: 1.25rem;
        line-height: 1.75rem;
    }

    .info-contact {
        font-weight: 500;
    }
</style>
<div class="tabbed-content title">
    <span><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></span>
</div>
<?php
// var_dump(array($type)[0]).die();
// var_dump($static['noidungvi']).die(); 
?>
<div class="content-main w-clear">
    <?= (isset($static['noidung' . $lang]) && $static['noidung' . $lang] != '') ? htmlspecialchars_decode($static['noidung' . $lang]) : '' ?>
    <?php
    if (array($type)[0] == 'tuyendung') { ?>
        <div class="tabbed-content title">
            Vị trí tuyển dụng
        </div>
        <div class="recruit-content">
            <div class="row-wrap">


                <?php
                foreach ($rclist as $key => $value) {
                    // var_dump($value['tenkhongdauvi']).die();

                ?>
                    <div class="row">
                        <div class="col-md-9" style="display: flex;">
                            <div class="stt">0<?= $key + 1 ?></div>
                            <div class="des"><?= $value['tenvi'] ?></div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-send">
                                <a href="<?= $value[$sluglang] ?>" class="btn-send-link">
                                    <span>Ứng tuyển</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>

            </div>
        </div>
    <?php }
    ?>

</div>
<!-- <div class="share">
    <b><?= chiase ?>:</b>
    <div class="social-plugin w-clear">
        <div class="addthis_inline_share_toolbox_qj48"></div>
        <div class="zalo-share-button" data-href="<?= $func->getCurrentPageURL() ?>" data-oaid="<?= ($optsetting['oaidzalo'] != '') ? $optsetting['oaidzalo'] : '579745863508352884' ?>" data-layout="1" data-color="blue" data-customize=false></div>
    </div>
</div> -->