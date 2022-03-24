<link rel="stylesheet" type="text/css" href="assets/css/tinhgia.css">
<div class="title-index">
   <span><?=(@$title_cat!='')?$title_cat:@$title_crumb?></span>
</div>
<div class="content-main w-clear">

   <div id="block-qs" class="boxshadow">
   <form id="autocalc1" name="autocalc1" action="" method="post">
      <div id="content" style="position:relative; width:100%;">
         <div class="custom-tab-menu3"> 
            <a class="step3 tabsel" data-id="stepcontent3">1. ĐƠN GIÁ THI CÔNG</a> 
            <a class="step1" data-id="stepcontent1">2. QUY TRÌNH THI CÔNG</a> 
            <a class="step2" data-id="stepcontent2">3. VẬT TƯ SỬ DỤNG</a>
         </div>
         <div class="custom-tab-content3 entry-content">
            <div class="stepcontent" style="display:block;" id="stepcontent3">
               <div>
                  <h2 class="text-center">Đơn giá</h2>
                  <div class="thanhtien">
                     <table class="table table-bordered table-striped">
                        <tbody>
                           <tr style="background-color:#2C8447; color: #fff;">
                              <th class="textgiua ">Phân loại</th>
                              <th class="textgiua ">Đơn giá đ/m<sup>2</sup></th>
                              <th class="textgiua ">Tổng diện tích ví dụ</th>
                              <th class="textgiua ">Thành tiền</th>
                           </tr>
                           <tr>
                              <td><strong>Nhà phố liên kế</strong></td>
                              <td class="textgiua price-nhapho" data-price="<?=$dongia['dongia1']?>">
                                 <?=number_format($dongia['dongia1'],0,',','.')?>
                                 
                              </td>
                              <td class="textgiua "><strong><span class="totalDt">325</span></strong> m<sup>2</sup></td>
                              <td class="textgiua ">
                                 <div class="thanhtiennhapho"> <span class="money"><?=number_format(($dongia['dongia1']*325),0,',','.')?></span> VNĐ</div>
                              </td>
                           </tr>
                           <tr>
                              <td><strong>Biệt thự, Văn phòng, Khách sạn</strong></td>
                              <td class="textgiua price-bietthu" data-price="<?=$dongia['dongia2']?>">
                                 <?=number_format($dongia['dongia2'],0,',','.')?>
                                    
                              </td>
                              <td class="textgiua "><strong><span class="totalDt">325</span></strong> m<sup>2</sup></td>
                              <td class="textgiua ">
                                 <div class="thanhtienbietthu"> <span class="money"><?=number_format(($dongia['dongia2']*325),0,',','.')?></span> VNĐ</div>
                              </td>
                           </tr>
                           <tr>
                              <td><strong>Công trình khác</strong></td>
                              <td class="textgiua "><?=$dongia['dongia3']?></td>
                              <td class="textgiua "><strong><span class="totalDt">325</span></strong> m<sup>2</sup></td>
                              <td class="textgiua "><?=$dongia['dongia3']?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div>
                     <?=htmlspecialchars_decode($dongia['mota'.$lang])?>
                  </div>
                  <h2 class="text-center">Chọn cấu trúc nhà</h2>
                  <div class="bangtinh">
                     <table class="table table-bordered ">
                        <tbody>
                           <tr style="background-color:#2C8447; color: #fff;">
                              <th>Chọn cấu trúc nhà <span id="resetBtn">Reset mặc định</span></th>
                              <th>Diện tích (m<sup>2</sup>)</th>
                              <th>Hệ số (%)</th>
                              <th>DT quy đổi (m<sup>2</sup>)</th>
                              <th>Hình minh họa</th>
                           </tr>
                           <tr class="kq_minhhoa">
                              <td></td>
                              <td class="textgiua"></td>
                              <td class="textgiua"></td>
                              <td class="textgiua"></td>
                              <td rowspan="100">
                                 <div class="fieldhinh clearfix">
                                    <div class="maist">Mái <span class="mhmai">35</span> m2</div>
                                    <div class="tumstvamai show">
                                       <div class="tum1">
                                          <div class="hientum"> Tum=<span class="dtTum">30</span> m2</div>
                                          <div class="hienthuong"> Tầng <span class="tangEnd" style="display: none;">4</span> (Lầu <span class="lauEnd">3</span>)  = <span class="dtThuong ">75</span> m2</div>
                                       </div>
                                       <div class="right">ST=<span class="vthuong">45</span> m2</div>
                                       <div class="tenbancongst"></div>
                                    </div>
                                    <div class="lau lau11">
                                       <div class="tenlau1"> Tầng thượng (lầu 11) = <span class="nhaplau synclau-11">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau10">
                                       <div class="tenlau1"> Tầng 11 (lầu 10) = <span class="nhaplau synclau-10">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau9">
                                       <div class="tenlau1"> Tầng 10 (lầu 9) = <span class="nhaplau synclau-9">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau8">
                                       <div class="tenlau1"> Tầng 9 (lầu 8) = <span class="nhaplau synclau-8">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau7">
                                       <div class="tenlau1"> Tầng 8 (lầu 7) = <span class="nhaplau synclau-7">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau6">
                                       <div class="tenlau1"> Tầng 7 (lầu 6) = <span class="nhaplau synclau-6">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau5">
                                       <div class="tenlau1"> Tầng 6 (lầu 5) = <span class="nhaplau synclau-5">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau4">
                                       <div class="tenlau1"> Tầng 5 (lầu 4) = <span class="nhaplau synclau-4">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau3">
                                       <div class="tenlau1"> Tầng 4 (lầu 3) = <span class="nhaplau synclau-3">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau2 show">
                                       <div class="tenlau1"> Tầng 3 (lầu 2) = <span class="nhaplau synclau-2">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="lau lau1 show">
                                       <div class="tenlau1"> Tầng 2 (lầu 1) = <span class="nhaplau synclau-1">75</span> m2</div>
                                       <div class="tenbancong"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="border-left:solid #336699; border-right:solid #336699; width:190px;">
                                       <div class="lung">Lửng = <span class="dtLung1 ">42</span> m2</div>
                                       <div class="tret">Tầng trệt = <span class="dtTret">70</span> m2</div>
                                    </div>
                                    <div class="ngang"></div>
                                    <div class="betong hide"></div>
                                    <div class="ham">Hầm = <span class="mhHam">70</span> m2</div>
                                    <div class="mong">
                                       <div class="trai" align="center">
                                          <div style="float:left;">
                                             <div class="mongnho"></div>
                                             <div class="monglon"></div>
                                          </div>
                                          <div class="mongdon"> Móng = <span class="mhMong">70</span> m2</div>
                                       </div>
                                       <div class="phai" align="center">
                                          <div class="mongnho"></div>
                                          <div class="monglon"></div>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr class="row-tilte selectlau">
                              <td colspan="4">
                                 <div class="width">
                                    <span class="color1"> <strong> Số tầng (bao gồm tầng trệt) </strong> </span> 
                                    <select class="clau select" name="clau">
                                       <option value="1">1</option>
                                       <option value="2">2</option>
                                       <option value="3">3</option>
                                       <option value="4" selected="">4</option>
                                       <option value="5">5</option>
                                       <option value="6">6</option>
                                       <option value="7">7</option>
                                       <option value="8">8</option>
                                       <option value="9">9</option>
                                       <option value="10">10</option>
                                       <option value="11">11</option>
                                       <option value="12">12</option>
                                    </select>
                                 </div>
                              </td>
                           </tr>
                           <tr class="show-tr tr-tret">
                              <td> <strong>Tầng trệt </strong></td>
                              <td>
                                 <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="vTret input" name="vTret" value="70" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">Tầng trệt tối thiểu là 10m2</span>
                              </td>
                              <td> <span class="hsTret">100</span>%</td>
                              <td class="ketqua"> <span class="dtTret show">70</span></td>
                           </tr>
                           <tr class="tr-lung show-tr">
                              <td>
                                 <div>
                                    <select class="cLung select" name="cLung">
                                       <option value="1">Không có tầng lửng</option>
                                       <option value="2">Có tầng lửng</option>
                                    </select>
                                 </div>
                                 <div class="vl2 hide"> Thông tầng của lửng</div>
                              </td>
                              <td>
                                 <div class="vl2 hide">
                                    <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="vLung1 input" name="vLung1" value="42" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 </div>
                                 <div class="vl2 hide">
                                    <div class="vLung2">28</div>
                                    <div class="note hide"> Tầng lửng không được bằng tầng Trệt</div>
                                 </div>
                              </td>
                              <td>
                                 <div class="vl2 hide"> <span class="hsLung1">100</span>%</div>
                                 <div class="vl2 hide"> <span class="hsLung2">50</span>%</div>
                              </td>
                              <td class="ketqua">
                                 <div class="vl2 dtLung1 hide">42</div>
                                 <div class="vl2 dtLung2 hide">14</div>
                              </td>
                           </tr>
                           <tr class="tanglau  lau-1 show-tr" data-lau="1">
                              <td><strong> Tầng 2 (Lầu 1) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-1" class="inputlau-1 input" name="lau-1" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-1">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-2 show-tr aptang" data-lau="2">
                              <td><strong> Tầng 3 (Lầu 2) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-2" class="inputlau-2 input" name="lau-2" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-2">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-3 hide-tr" data-lau="3">
                              <td><strong> Tầng 4 (Lầu 3) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-3" class="inputlau-3 input" name="lau-3" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-3">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-4 hide-tr" data-lau="4">
                              <td><strong> Tầng 5 (Lầu 4) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-4" class="inputlau-4 input" name="lau-4" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-4">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-5 hide-tr" data-lau="5">
                              <td><strong> Tầng 6 (Lầu 5) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-5" class="inputlau-5 input" name="lau-5" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-5">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-6 hide-tr" data-lau="6">
                              <td><strong> Tầng 7 (Lầu 6) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-6" class="inputlau-6 input" name="lau-6" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-6">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-7 hide-tr" data-lau="7">
                              <td><strong> Tầng 8 (Lầu 7) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-7" class="inputlau-7 input" name="lau-7" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-7">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-8 hide-tr" data-lau="8">
                              <td><strong> Tầng 9 (Lầu 8) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-8" class="inputlau-8 input" name="lau-8" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-8">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-9 hide-tr" data-lau="9">
                              <td><strong> Tầng 10 (Lầu 9) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-9" class="inputlau-9 input" name="lau-9" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-9">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-10 hide-tr" data-lau="10">
                              <td><strong> Tầng 11 (Lầu 10) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-10" class="inputlau-10 input" name="lau-10" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-10">75</span></td>
                           </tr>
                           <tr class="tanglau  lau-11 hide-tr" data-lau="11">
                              <td><strong> Tầng 12 (Lầu 11) </strong></td>
                              <td>
                                 <div class="quality" data-min=""> <a href="javascript:void(0)" class="minus">-</a> <input type="text" data-sync="synclau-11" class="inputlau-11 input" name="lau-11" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide">aa </span>
                              </td>
                              <td>100%</td>
                              <td class="ketqua"> <span class="dtlau show dtLau-11">75</span></td>
                           </tr>
                           <tr class="tr-thuong tr-tum show-tr">
                              <td>
                                 <div> <strong> Tầng <span class="tangEnd" style="display: none;">4</span> <span class="ktthuong">thượng</span> (Lầu <span class="lauEnd">3</span>) <span class="ktthuong"> = Tum + Sân thượng</span> </strong></div>
                                 <div class="vl2 show">Tum</div>
                                 <div> <label class="labelST"> <input type="checkbox" class="cST" value="1" checked=""> <span>Có sân thượng </span> </label></div>
                              </td>
                              <td>
                                 <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="tangthuong input" name="tangthuong" value="75" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <div class="vl2 show">
                                    <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="vtum input" name="vtum" value="30" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 </div>
                                 <div class="vl2 show">
                                    <div class="vthuong">45</div>
                                 </div>
                                 <span class="notethuong note hide"> </span> <span class="notetum note hide"> </span>
                              </td>
                              <td>
                                 <div class="vl1">
                                    <div class="hide">100%</div>
                                 </div>
                                 <div class="vl2 show">
                                    <div>100%</div>
                                    <div>50%</div>
                                 </div>
                              </td>
                              <td class="ketqua">
                                 <div class="vl1"> <span class="dtThuong hide">75</span></div>
                                 <div class="dtTum vl2 show">30</div>
                                 <div class="dtST vl2 show">22.5</div>
                              </td>
                           </tr>
                           <tr class="show-tr tr-mai row-tilte">
                              <td>
                                 <span class=" color1"><strong>Hệ mái</strong></span> 
                                 <select name="cMai" class="cMai select">
                                    <option value="1" selected="">Mái bê tông cốt thép đúc bằng</option>
                                    <option value="2">Mái tôn</option>
                                    <option value="3">Mái ngói xà gồ sắt</option>
                                    <option value="4">Mái đúc bê tông xiên dán ngói</option>
                                 </select>
                              </td>
                              <td>
                                 <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="vmai input" name="vmai" value="35" maxlength="5"> <a href="javascript:void(0)" class="plus">+</a></div>
                                 <span class="note hide"></span>
                              </td>
                              <td>
                                 <div><span class="hsmai">50</span>%</div>
                                 <div class="hsnghieng " style="display: none;">x1.4 hệ số nghiêng</div>
                              </td>
                              <td class="ketqua">
                                 <div class="dtmai show">17.5</div>
                              </td>
                           </tr>
                           <tr class=" row-tilte show-tr tr-mong">
                              <td>
                                 <span class=" color1"><strong> Móng và nền</strong></span> 
                                 <select class="cMong select" name="cMong">
                                    <option value="1">Móng băng hoặc móng cọc</option>
                                    <option value="2">Móng đơn</option>
                                 </select>
                                 <label class="labelBtnt show"> <input type="checkbox" class="cBtnt" name="cBtnt" value="1"> <span>Có đổ bê tông nền trệt </span> </label>
                              </td>
                              <td> <input style="max-width: 60px; background-color: #f9f9f9; text-align: center;" disabled="" type="text" class="vMong input" name="vMong" value="70" maxlength="5"></td>
                              <td> <span class="hsMong">50</span>%</td>
                              <td class="ketqua"> <span class="dtMong show">35</span></td>
                           </tr>
                           <tr class="show-tr tr-ham">
                              <td>
                                 <select class="cHam select" name="cHam">
                                    <option value="1">Không có hầm</option>
                                    <option value="2">Có hầm</option>
                                 </select>
                                 <div class="radio-hsham vl2 hide"> <label> <input type="radio" class="vhsHam" name="vhsHam" value="150" checked=""> <br> Hầm sâu   &lt; 1.2m </label> <label> <input type="radio" class="vhsHam" name="vhsHam" value="170"> <br> Sâu 1.2m-1.8m </label> <label> <input type="radio" class="vhsHam" name="vhsHam" value="200"> <br> Sâu  &gt; 1.8m </label></div>
                              </td>
                              <td>
                                 <span class="vl2 hide">
                                    <div class="quality"> <a href="javascript:void(0)" class="minus">-</a> <input type="text" class="vHam input" name="vHam" maxlength="5" value="70"> <a href="javascript:void(0)" class="plus">+</a></div>
                                    <span class="note hide">Hầm không được lớn hơn móng</span> 
                                 </span>
                              </td>
                              <td> <span class="vl2 hide"> <span class="hsHam">150</span>% </span></td>
                              <td class="ketqua"> <span class="vl2 dtHam hide">105</span></td>
                           </tr>
                           <tr class="tr-tong">
                              <td colspan="3" style="text-align: right;"> Tổng diện tích quy đổi</td>
                              <td class="ketqua"> <span class="totalDt">325</span> m<sup>2</sup></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                   <div>
                     <?=htmlspecialchars_decode($dongia['noidung'.$lang])?>
                  </div>
               </div>
            </div>
            <div class="stepcontent" id="stepcontent1">
               <div class="tabsection">
                  <div class="choosecolumqttc">
                     <?=htmlspecialchars_decode($quytrinh['noidung'.$lang])?>
                  </div>
                 
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="stepcontent" id="stepcontent2">
               <div class="tabsection">
                  <?=htmlspecialchars_decode($vattu['noidung'.$lang])?>
               </div>
            </div>
         </div>
          
      </div>
   </form>
</div>
   
</div>
<div class="share">
	<b><?=chiase?>:</b>
	<div class="social-plugin w-clear">
        <div class="addthis_inline_share_toolbox_qj48"></div>
        <div class="zalo-share-button" data-href="<?=$func->getCurrentPageURL()?>" data-oaid="<?=($optsetting['oaidzalo']!='')?$optsetting['oaidzalo']:'579745863508352884'?>" data-layout="1" data-color="blue" data-customize=false></div>
    </div>
</div>