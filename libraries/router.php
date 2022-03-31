<?php
	/* Check HTTP */
	$func->checkHTTP($http,$config['arrayDomainSSL'],$config_base,$config_url);

	/* Validate URL */
	$func->checkUrl($config['website']['index']);

	/* Check login */
    $func->checkLogin();

	/* Mobile detect */
    $deviceType = ($detect->isMobile() || $detect->isTablet()) ? 'mobile' : 'computer';
    if($deviceType == 'computer') define('TEMPLATE','./templates/');
    else define('TEMPLATE','./templates/');

    /* Watermark */
    $wtmPro = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark','photo_static'));
	$wtmNews = $d->rawQueryOne("select hienthi, photo, options from #_photo where type = ? and act = ? limit 0,1",array('watermark-news','photo_static'));

    /* Router */
    $router->setBasePath($config['database']['url']);
    $router->map('GET',array('dangnhap/','dangnhap'), function(){
		global $func, $config;
		$func->redirect($config['database']['url']."dangnhap/index.php");
		exit;
	});
	$router->map('GET',array('dangnhap','dangnhap'), function(){
		global $func, $config;
		$func->redirect($config['database']['url']."dangnhap/index.php");
		exit;
	});
    $router->map('GET|POST', '', 'index', 'home');
    $router->map('GET|POST', 'index.php', 'index', 'index');
    $router->map('GET|POST', 'sitemap.xml', 'sitemap', 'sitemap');
    $router->map('GET|POST', '[a:com]', 'allpage', 'show');
    $router->map('GET|POST', '[a:com]/[a:lang]/', 'allpagelang', 'lang');
    $router->map('GET|POST', '[a:com]/[a:action]', 'account', 'account');
    $router->map('GET', THUMBS.'/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func;
        $func->createThumb($w,$h,$z,$src,null,THUMBS);
    },'thumb');
    $router->map('GET', WATERMARK.'/product/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func, $wtmPro;
        $func->createThumb($w,$h,$z,$src,$wtmPro,"product");
    },'watermark');
    $router->map('GET', WATERMARK.'/news/[i:w]x[i:h]x[i:z]/[**:src]', function($w,$h,$z,$src){
        global $func, $wtmNews;
        $func->createThumb($w,$h,$z,$src,$wtmNews,"news");
    },'watermarkNews');
    $match = $router->match();
	if(is_array($match)){
		if(is_callable($match['target'])){
			call_user_func_array($match['target'], $match['params']); 
		}else{
			$com = (isset($match['params']['com'])) ? htmlspecialchars($match['params']['com']) : htmlspecialchars($match['target']);
			$get_page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 1;
		}
	}else{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit;
	}

    /* Setting */
    $sqlCache = "select * from #_setting";
    $setting = $cache->getCache($sqlCache,'fetch',7200);
    $optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;

    /* Lang */
    if(isset($match['params']['lang']) && $match['params']['lang'] != '') $_SESSION['lang'] = $match['params']['lang'];
    else if(!isset($_SESSION['lang']) && !isset($match['params']['lang'])) $_SESSION['lang'] = $optsetting['lang_default'];
    $lang = $_SESSION['lang'];

    /* Slug lang */
    $sluglang = 'tenkhongdauvi';

    /* SEO Lang */
    $seolang = "vi";

    /* Require datas */
    require_once LIBRARIES."lang/lang$lang.php";
    require_once SOURCES."allpage.php";

	/* Tối ưu link */
	$requick = array(
		// Sản phẩm
		array("tbl"=>"product_list","field"=>"idl","source"=>"product","com"=>"san-pham","type"=>"san-pham",'menu'=>true),
		array("tbl"=>"product_cat","field"=>"idc","source"=>"product","com"=>"san-pham","type"=>"san-pham",'menu'=>true),
		array("tbl"=>"product_item","field"=>"idi","source"=>"product","com"=>"san-pham","type"=>"san-pham",'menu'=>true),
		array("tbl"=>"product","field"=>"id","source"=>"product","com"=>"san-pham","type"=>"san-pham",'menu'=>true),
		/* Sản phẩm */
		array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>"khuyen-mai","type"=>"khuyen-mai",'menu'=>true),
	 	array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"khuyen-mai","type"=>"khuyen-mai",'menu'=>true),


		/* Bài viết */		
		// array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"gioi-thieu","type"=>"gioi-thieu",'menu'=>true),
		array("tbl"=>"news_list","field"=>"idl","source"=>"news","com"=>"tin-tuc","type"=>"tin-tuc",'menu'=>true),
		array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"tin-tuc","type"=>"tin-tuc",'menu'=>true),
		array("tbl"=>"","field"=>"id","source"=>"","com"=>"tieu-chi","type"=>"tieu-chi",'menu'=>true),
		array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"dich-vu","type"=>"dich-vu",'menu'=>true),
		array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"tuyen-dung","type"=>"tuyen-dung",'menu'=>true),
		array("tbl"=>"news","field"=>"id","source"=>"news","com"=>"thong-tin","type"=>"thong-tin",'menu'=>false),
 
		/* Trang tĩnh */
		array("tbl"=>"static","field"=>"id","source"=>"static","com"=>"gioi-thieu","type"=>"gioi-thieu",'menu'=>true),
		array("tbl"=>"static","field"=>"id","source"=>"static","com"=>"dang-ky-the-thanh-vien","type"=>"dang-ky-the-thanh-vien",'menu'=>true),
		array("tbl"=>"static","field"=>"id","source"=>"static","com"=>"dang-ky-the-thanh-vien","type"=>"dang-ky-the-thanh-vien",'menu'=>true),
		array("tbl"=>"static","field"=>"id","source"=>"static","com"=>"chinh-sach-khach-hang-than-thiet","type"=>"chinh-sach-khach-hang-than-thiet",'menu'=>true),
		array("tbl"=>"static","field"=>"id","source"=>"static","com"=>"chinh-sach-bao-mat-thong-tin","type"=>"chinh-sach-bao-mat-thong-tin",'menu'=>true),

		/* Liên hệ */
		array("tbl"=>"","field"=>"id","source"=>"","com"=>"lien-he","type"=>"",'menu'=>true),
		array("tbl"=>"","field"=>"id","source"=>"","com"=>"tinh-gia-xay-dung","type"=>"",'menu'=>true),
		array("tbl"=>"","field"=>"id","source"=>"","com"=>"mau-sac","type"=>"",'menu'=>true),
		 

	);

	/* Find data */
	if($com != 'tim-kiem' && $com != 'account' && $com != 'sitemap')
	{
		foreach($requick as $k => $v)
		{
			$url_tbl = (isset($v['tbl']) && $v['tbl'] != '') ? $v['tbl'] : '';
			$url_tbltag = (isset($v['tbltag']) && $v['tbltag'] != '') ? $v['tbltag'] : '';
			$url_type = (isset($v['type']) && $v['type'] != '') ? $v['type'] : '';
			$url_field = (isset($v['field']) && $v['field'] != '') ? $v['field'] : '';
			$url_com = (isset($v['com']) && $v['com'] != '') ? $v['com'] : '';
			
			if($url_tbl!='' && $url_tbl!='static' && $url_tbl!='photo')
			{
				$row = $d->rawQueryOne("select id from #_$url_tbl where $sluglang = ? and type = ? and hienthi > 0 limit 0,1",array($com,$url_type));
				
				if($row['id'])
				{
					$_GET[$url_field] = $row['id'];
					$com = $url_com;
					break;
				}
			}
		}
	}

	/* Switch coms */
	switch($com)
	{
		case 'lien-he':
			$source = "contact";
			$template = "contact/contact";
			$seo->setSeo('type','object');
			$title_crumb = 'Liên hệ';
			break;

		case 'tinh-gia-xay-dung':
			$source = "tinhgia";
			$template = "tinhgia/tinhgia";
			$seo->setSeo('type','object');
			$title_crumb = 'Tính giá xây dựng';
			break;

		case 'mau-sac':
			$source = "mausac";
			$template = "mausac/mausac";
			$seo->setSeo('type','object');
			$title_crumb = 'Tính giá xây dựng';
			break;

		case 'gioi-thieu':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Giới thiệu';
			break;
		case 'dang-ky-the-thanh-vien':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Đăng ký thẻ thành viên';
			break;
		case 'chinh-sach-khach-hang-than-thiet':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Chính sách khách hàng thân thiết';
			break;
		case 'chinh-sach-bao-mat-thong-tin':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Chính sách bảo mật thông tin';
			break;
		case 'gioi-thieu':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Giới thiệu';
			break;
		case 'gioi-thieu':
			$source = "static";
			$template = "static/static";
			$type = $com;
			$seo->setSeo('type','article');
			$title_crumb = 'Giới thiệu';
			break;
	 
  		// case 'gioi-thieu':
		// 	$source = "news";
		// 	$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
		// 	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
		// 	$type = $com;
		// 	$title_crumb = "Giới thiệu";
		// 	break;

		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Tin tức";
			break;
		case 'khuyen-mai':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Khuyến mãi";
			break;
		case 'goc-am-thuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Góc ẩm thực";
			break;
		case 'tuyendung':
			$source = "static";
			$template = "static/static";
			$seo->setSeo('type','article');
			$type = $com;
			$title_crumb = "Tuyển dụng";
			break;
		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Tuyển dụng";
			break;
		case 'tieu-chi':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Tiêu chí";
			break;

		case 'thong-tin':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Thông tin";
			break;

		case 'dich-vu':
			$source = "news";
			$template = isset($_GET['id']) ? "news/news_detail" : "news/news";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Dịch vụ";
			break;

		// case 'nha-mau':
		// 	$source = "news";
		// 	$template = isset($_GET['id']) ? "duan/news_detail" : "duan/news";
		// 	$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
		// 	$type = $com;
		// 	$title_crumb = "Nhà mẫu";
		// 	break;

		case 'video':
			$source = "video";
			$template =  "video/video";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = $com;
			$title_crumb = "Video";
			break;
 
		case 'san-pham':
			$source = "product";
			$template = isset($_GET['id']) ? "product/product_detail" : "product/product";
			$seo->setSeo('type',isset($_GET['id']) ? "article" : "object");
			$type = 'san-pham';
			$title_crumb = 'Sản phẩm';
			break;
		
 	 
		case 'tim-kiem':
			$source = "search";
			$template = "duan/news";
			$seo->setSeo('type','object');
			$title_crumb = timkiem;
			break;

		/*case 'tags-san-pham':
			$source = "tags";
			$template = "product/product";
			$type = $url_type;
			$table = $url_tbltag;
			$seo->setSeo('type','object');
			$title_crumb = null;
			break;

		case 'tags-tin-tuc':
			$source = "tags";
			$template = "news/news";
			$type = $url_type;
			$table = $url_tbltag;
			$seo->setSeo('type','object');
			$title_crumb = null;
			break;*/

		case 'gio-hang':
			$source = "order";
			$template = 'order/order';
			$title_crumb = giohang;
			$seo->setSeo('type','object');
			break;

		/*case 'account':
			$source = "user";
			break;
		*/
		case 'ngon-ngu':
			if(isset($lang))
			{
				switch($lang)
				{
					case 'vi':
						$_SESSION['lang'] = 'vi';
						break;
					case 'en':
						$_SESSION['lang'] = 'en';
						break;
					default:
						$_SESSION['lang'] = 'vi';
						break;
				}
			}
			$func->redirect($_SERVER['HTTP_REFERER']);
			break;

		case 'sitemap':
			include_once LIBRARIES."sitemap.php";
			exit();
			
		case '':
		case 'index':
			$source = "index";
			$template ="index/index";
			$seo->setSeo('type','website');
			break;

		default: 
			header('HTTP/1.0 404 Not Found', true, 404);
			include("404.php");
			exit();
	}

	/* Include sources */
	if($source!='') include SOURCES.$source.".php";
	if($template=='')
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		include("404.php");
		exit();
	}
