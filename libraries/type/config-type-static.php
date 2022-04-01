<?php
    
    $nametype = "gioi-thieu";
    $config['static'][$nametype]['title_main'] = "Giới thiệu";
    $config['static'][$nametype]['images'] = false;
    $config['static'][$nametype]['images2'] = false;
    $config['static'][$nametype]['file'] = false;
    $config['static'][$nametype]['tieude'] = false;
    $config['static'][$nametype]['mota'] = true;
    $config['static'][$nametype]['mota_cke'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    $config['static'][$nametype]['seo'] = false;
    $config['static'][$nametype]['width'] = 465;
    $config['static'][$nametype]['height'] = 315;    
    $config['static'][$nametype]['width1'] = 440;
    $config['static'][$nametype]['height1'] = 325;
    $config['static'][$nametype]['gallery'] = array(
        $nametype => array(
            "title_main_photo" => "Hình ảnh chứng nhận",
            "title_sub_photo" => "Hình ảnh",
            "number_photo" => 3,
            "images_photo" => true,
            "cart_photo" => true,
            "avatar_photo" => true,
            "tieude_photo" => true,
            "width_photo" => 560,
            "height_photo" => 560,
            "thumb_photo" => '100x100x1',
            "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF'
        ),
        
    );
    $config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.JPG|.PNG|.JPEG|.Png|.GIF';
    $config['static'][$nametype]['file_type'] = 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|jpg|png|gif|JPG|PNG|GIF|xls|XLS';

    /* Liên hệ */
    $nametype = "dongia";
    $config['static'][$nametype]['title_main'] = "Đơn giá";
    $config['static'][$nametype]['dongia1'] = true;
    $config['static'][$nametype]['dongia2'] = true;
    $config['static'][$nametype]['dongia3'] = true;
    $config['static'][$nametype]['mota'] = true;
    $config['static'][$nametype]['mota_cke'] = true;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    
    /* Liên hệ */
    $nametype = "quytrinh";
    $config['static'][$nametype]['title_main'] = "Quy trình";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;

     /* Liên hệ */
    $nametype = "vattu";
    $config['static'][$nametype]['title_main'] = "Vật tư";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
 

    /* Slogan */
    /*$nametype = "slogan";
    $config['static'][$nametype]['title_main'] = "Slogan";
    $config['static'][$nametype]['tieude'] = true;*/

    /* Liên hệ */
    $nametype = "lienhe";
    $config['static'][$nametype]['title_main'] = "Liên hệ";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    /* Đăng ký thẻ thành viên */
    // $nametype = "dang-ky-the-thanh-vien";
    // $config['static'][$nametype]['title_main'] = "Đăng ký thẻ thành viên";
    // $config['static'][$nametype]['noidung'] = true;
    // $config['static'][$nametype]['noidung_cke'] = true;
    /* Chính sách khách hàng thân thiết */
    $nametype = "chinh-sach-khach-hang-than-thiet";
    $config['static'][$nametype]['title_main'] = "Chính sách khách hàng thân thiết";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    /* Chính sách bảo mật thông tin */
    $nametype = "chinh-sach-bao-mat-thong-tin";
    $config['static'][$nametype]['title_main'] = "Chính sách bảo mật thông tin";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
    /* Tuyen dung */
    $nametype = "tuyendung";
    $config['static'][$nametype]['title_main'] = "Tin tuyển dụng";
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
   
 
    /* Footer */
    $nametype = "footer";
    $config['static'][$nametype]['title_main'] = "Footer";
    $config['static'][$nametype]['tieude'] = false;
    $config['static'][$nametype]['noidung'] = true;
    $config['static'][$nametype]['noidung_cke'] = true;
