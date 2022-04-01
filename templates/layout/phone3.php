<style>
  .support-online a {
    /* position: relative;
    margin: 30px 20px;
    text-align: left;
    width: 40px;
    height: 40px */
    position: relative;
    margin: 15px 20px;
    text-align: left;
    width: 45px;
    background: #fff;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
  }

  .support-online img {
    width: 40px;
    height: 40px;
    background: #43a1f3;
    border-radius: 100%;
    position: relative;
    z-index: 1000;
  }

  .support-online a span {
    border-radius: 2px;
    text-align: center;
    background: var(--bg-color);
    padding: 9px;
    display: none;

    width: 180px;
    margin-left: 10px;
    position: absolute;
    color: #fff;
    z-index: 999;
    top: 0;
    right: 40px;
    transition: all .2s ease-in-out 0;
    -moz-animation: headerAnimation .7s 1;
    -webkit-animation: headerAnimation .7s 1;
    -o-animation: headerAnimation .7s 1;
    animation: headerAnimation .7s 1
  }

  .support-online a:hover span {
    display: block
  }

  /* .support-online a {
    display: block
  } */

  .support-online a span:after {
    content: "";
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 10px 10px 10px 0;
    border-color: transparent #67b634 transparent transparent;
    position: absolute;
    left: -10px;
    top: 10px
  }

  .support-online {
    position: fixed;
    z-index: 1000;
    right: -6px;
    bottom: 75px;
    left: auto;
  }
</style>
<div class="support-online">

  <div class="support-content" style="display: block;">

    <a href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['dienthoai']); ?>" class="call-now" rel="nofollow">

      <img src="upload/social/download.jpg" alt="">
      <!-- <div class="animated infinite zoomIn kenit-alo-circle"></div>
            <div class="animated infinite pulse kenit-alo-circle-fill"></div> -->
    </a>
    <a href="<?=$optsetting['fanpage']?>" class="call-now" rel="nofollow">
      <img src="upload/social/MessengerIcon.png" alt="">

    </a>
    <a class="zalo" href="https://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>" target="_blank">
      <img src="upload/social/zalo-combo.png" alt="">
    </a>
  </div>



</div>