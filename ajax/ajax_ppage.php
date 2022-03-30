<?php
include "ajax_config.php";
define('LIBRARIES', '../libraries/');
define('THUMBS', 'thumbs');
$type = $_GET['type'];
$page_number = 3;
$output = "";
$page = $_GET['page'];
settype($page, "int");
$id = $_POST['id'];
$from = ($page - 1) * $page_number;
$news_list = $d->rawQuery("select id, tenvi, ngaytao, tenkhongdauvi, motavi, photo from #_news where type = ? and hienthi > 0 order by stt,id desc limit ?, ?", array($type, $from, $page_number));

foreach ($news_list as $key => $value) {
	$output .= '<div class="row">
	<div class="col-md-4">
		<p class="pic-news scale-img">
			<a class="text-decoration-none" href="' . $value["tenkhongdauvi"] . '" title="' . $value["tenvi"] . '"><img onerror="this.src="thumbs/320x240x1/assets/images/noimage.png";" src="thumbs/320x240x1/upload/news/' . $value["photo"] . '" alt="' . $value["tenvi"] . '">
			</a>
		</p>
	</div>
	<div class="col-md-7">

		<div class="info-news">
			<h3 class="name-news"><a class="text-decoration-none" href="' . $value["tenkhongdauvi"] . '" title="' . $value["tenvi"] . '">' . $value["tenvi"] . '</a></h3>
			<p class="time-news">Ngày đăng: ' . date("d/m/Y h:i A", $value["ngaytao"]) . '</p>
			<div class="desc-news text-split">' . $value["motavi"] . '</div>
		</div>
	</div>
</div>';
}
echo $output;
