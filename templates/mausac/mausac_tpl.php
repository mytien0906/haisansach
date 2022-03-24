<link rel="stylesheet" type="text/css" href="assets/css/tinhgia.css">
<div class="title-index">
   <span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span>
</div>
<div class="content-main w-clear">
   <div class="page-phongthuy">
      <div id="form">
         <form action="" method="get">
            <div class="inner-form">
               <div class="row">
                  <div class="col-sm-4">
                     <label>
                        <span>Năm sinh :</span> <span class="value"> <input class="input" name="namsinh" type="number" value="<?=$namsinh?>" /> </span>
                     </label>
                  </div>
                  <div class="col-sm-4">
                     <label>
                        <span>Giới tính :</span>
                        <span class="value">
                           <select class="select" name="gioitinh">
                              <option <?=($gioitinh=='Nam' ? 'selected':'')?> value="Nam">Nam</option>
                              <option  <?=($gioitinh=='Nu' ? 'selected':'')?> value="Nu">Nữ</option>
                           </select>
                        </span>
                     </label>
                  </div>
                  <div class="col-sm-4">
                     <label>
                        <span>Năm xây :</span>
                        <span class="value">
                           <select class="select" name="namxaydung">
                              <?php for($i=0;$i<=10;$i++){?>
                              <option value="<?=date('Y',time())+$i?>" <?=((date('Y',time())+$i)==$namxaydung ? 'selected':'')?>><?=date('Y',time())+$i?></option>
                              <?php }?>
                               
                           </select>
                        </span>
                     </label>
                  </div>
               </div>
            </div>
            <div class="clearfix">
               <button type="submit" class="btn pull-right">Xem kết quả</button>
            </div>
         </form>
      </div>
      <div id="cate-house">
         <div class="heading"><h2>BẢNG KẾT QUẢ XEM TUỔI XÂY NHÀ</h2></div>
         <div class="row equalHeight mb-30" data-padding="30">
            <div class="col-md-4">
               <div class="widget">
                  <div class="title">Tam Tai</div>
                  <?=$tamtai['text']?>
                  
               </div>
            </div>
            <div class="col-md-4">
               <div class="widget">
                  <div class="title">Hoàng Ốc</div>
                  <?=$hoangoc['text']?>
               </div>
            </div>
            <div class="col-md-4">
               <div class="widget">
                  <div class="title">Kim Lâu</div>
                  <?=$kimlau['text']?>
               </div>
            </div>
         </div>
         <div>
            <p>
               Cả ba yếu tố trên đều không bị phạm là tốt nhất, còn nếu phạm Tam Tai hoặc Hoàng Ốc mà không phạm Kim Lâu, thì cũng có thể chấp nhận được. Phạm hai trong số ba yếu tố trên hoặc phạm vào Kim Lâu thì không nên tiến hành xây dựng, sửa chữa nhà cửa, mà nên đợi năm khác, hoặc tiến hành thủ tục <b>mượn tuổi</b>.
            </p>
            <p>
               Dự kiến thi công năm <b><?=$namxaydung?></b> khi gia chủ <b><?=$tuoi?></b> tuổi (tuổi âm) <?=$kq?>
               
            </p>
         </div>
         <div class="heading"><h2>BẢNG KẾT QUẢ HƯỚNG NHÀ THEO TUỔI</h2></div>
         <div>
            <p>Năm sinh: <b><?=$namsinh?> - <?=$tuoicongia?></b></p>
            <p>Giới tính: <b><?=$gioitinh=='Nam' ? 'Nam':'Nữ'?></b></p>
            <p>Thuộc cung: <b><?=$cungmenh['cung']?> - <?=$cungmenh['menh']?></b></p>
            <p>Ngũ hành: <b><?=$napam?></b></p>
         </div>
         <div class="images mb-30">
            <div class="row">
               <?=$Huong['batquai']?>
               <?=$cungmenhnghanh['mausac']?>
                
            </div>
         </div>

         <div id="huong-nha" class="entry-content">
            <div alt="Cung càn">
               <h4>1. Diễn giải:</h4>
               <p class="color1"><strong>Các hướng tốt:</strong></p>
               <p align="justify">
                    <?=$Huong['tot']?>
               </p>
               <p class="color1"><strong>Các hướng xấu:</strong></p>
               <p align="justify">
                  <?=$Huong['xau']?>
               </p>
               <h4>2. Một số đề xuất bố trí hướng thiết bị:</h4>
               <?=$Huong['dexuat']?>
             </div>
         </div>

         <div class="entry-content">
             <h4>3. Một số yếu tố không liên quan đến tuổi:</h4>
             <div>
                 <p align="justify">
                     <strong><em>- Chiều rộng lọt lòng cửa đi:</em></strong> tính theo thước Lỗ Ban<br />
                     <strong><em>- Số bậc thang:</em></strong> chia theo Sinh – Lão – Bệnh – Tử
                 </p>
                 <ul>
                     <li>
                         Số <em><strong>Sinh</strong></em> là số chia 4 lẻ 1. Ví dụ : 17, 21, 25…
                     </li>
                     <li>
                         Số <strong><em>Lão</em></strong> là số chia 4 lẻ 2. Ví dụ : 18, 22, 26…
                     </li>
                     <li>
                         Số <strong><em>Bệnh</em></strong> là số chia 4 lẻ 3. Ví dụ : 19, 23, 27…
                     </li>
                     <li>
                         Số <em><strong>Tử</strong></em> là số chia hết cho. Ví dụ : 16, 20, 24…
                     </li>
                 </ul>
                 <p align="justify">Bậc thang nên chia với số bậc là số Sinh hoặc số Lão, tránh số Bệnh hoặc số Tử</p>
                 <p align="justify">
                     <strong><em>- Số bậc cấp vào nhà:</em></strong> <strong>3 bậc</strong> (Tam tài), <strong>5 bậc</strong> (Ngũ hành)<br />
                     <strong><em>- Số xà gồ lợp mái:</em></strong> tốt nhất là số lẻ
                 </p>
             </div>
         </div>

      </div>
   </div>
</div>
<div class="share">
	<b><?=chiase?>:</b>
	<div class="social-plugin w-clear">
     <div class="addthis_inline_share_toolbox_qj48"></div>
     <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
  </div>
</div>