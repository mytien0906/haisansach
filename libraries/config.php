<?php
	if(!defined('LIBRARIES')) die("Error");
	
	/* Root */
	define('ROOT',__DIR__);

	/* Timezone */
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	/* Cấu hình coder */
	define('NN_MSHD','xxxx');
	define('NN_AUTHOR','');

	/* Cấu hình chung */
	$config = array(
		'customEmail' => 'nhaxanhvnco.ltd@gmail.com', //email nhận mật khẩu
		'copright' => array(// thông tin công ty tts
			'name' => 'CÔNG TY TNHH CÔNG NGHỆ SOTA GROUP',
			'email' => 'info@sotagroup.vn',
			'dienthoai' => '',
			'diachi' => 'Tòa Nhà HD Building 154 Phạm Văn Chiêu, Phường 9, Gò Vấp, Thành phố Hồ Chí Minh',
			'website' => 'sotagroup.vn',
			'worktime' => ''
		),
		'author' => array(
			'name' => '',
			'email' => '',
			'timefinish' => ''
		),
		'arrayDomainSSL' => array(),
		'database' => array(
			'server-name' => $_SERVER["SERVER_NAME"],
			'url' => '/',
			'type' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'haisan_sota',
			'port' => 3306,
			'prefix' => 'table_',
			'charset' => 'utf8'
		),
		'website' => array(
			'sendmail' => true,
			'error-reporting' => false,
			'secret' => '$tts@',
			'salt' => 'swKJaajeS!t',
			'debug-developer' => false,
			'debug-css' => false,
			'debug-js' => true,
			'index' => true,
			'upload' => array(
				'max-width' => 1600,
				'max-height' => 1600
			),
			'lang' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'lang-doc' => 'vi|en',
			'slug' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'seo' => array(
				'vi'=>'Tiếng Việt'
				//'en'=>'Tiếng Anh'
			),
			'comlang' => array(
				"gioi-thieu" => array("vi"=>"gioi-thieu"),
				"tin-tuc" => array("vi"=>"tin-tuc"),
				"san-pham" => array("vi"=>"san-pham"),
				"cong-trinh" => array("vi"=>"cong-trinh"),
				"dich-vu" => array("vi"=>"dich-vu"),
				"lien-he" => array("vi"=>"lien-he")
			)
		),
		'order' => array(
			'ship' => true,
		),
		'login' => array(
			'admin' => 'LoginAdmin'.NN_MSHD,
			'member' => 'LoginMember'.NN_MSHD,
			'attempt' => 5,
			'delay' => 15
		),
		'googleAPI' => array(
			'recaptcha' => array(
				'active' => true,
				'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
				'sitekey' => '6LdphJEaAAAAAE0TtNehX7WwG2DjlxS7w4f8GPRQ',
				'secretkey' => '6LdphJEaAAAAAFPTTE-jLRFCZoUKrm4WFtrawu3g'
				//'sitekey' => '6Ld05qcZAAAAAJedNSmLEe1NOZdDtlYhwmltTIDC',
				//'secretkey' => '6Ld05qcZAAAAAABH8BWbSiLnPoXTRXFReFDM7b8t'
			)
		),
		'oneSignal' => array(
			'active' => false,
			'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
			'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
		),
		'license' => array(
			'version' => "7.0.0",
			'powered' => "tts@congnghetts.vn"
		)
	);

	/* Error reporting */
	error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

	/* Cấu hình base */
	$http = 'http://';
	$config_url = $config['database']['server-name'].$config['database']['url'];
	$config_base = $http.$config_url;

	/* Cấu hình login */
	$login_admin = $config['login']['admin'];
	$login_member = $config['login']['member']; 

	/* Cấu hình upload */
	require_once LIBRARIES."constant.php";
?>