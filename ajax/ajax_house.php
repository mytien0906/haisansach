<?php
include "ajax_config.php";
define('LIBRARIES', '../libraries/');
define('THUMBS', 'thumbs');
$type = $_POST['type'];
$id = $_POST['id'];
$house_list = $d->rawQuery("select #_news.id, #_news.tenvi, #_news.ngaytao , #_news.tenkhongdauvi, #_news.motavi, #_news.photo from #_news RIGHT JOIN #_news_list
	ON #_news.id_list = #_news_list.id where #_news_list.id = ? and #_news.type = ? and #_news.hienthi > 0 limit 8", array($id, $type));

$output = "";

foreach ($house_list as $key => $value) {
	$output .= '<div class="col-md-3 col-6">
		<div class="cover-content">
		<a class="image" href="' . $value['tenkhongdauvi'] . '">
			<img src="thumbs/710x300x1/upload/news/' . $value['photo'] . '" alt="">
		</a>
		<a href="' . $value['tenkhongdauvi'] . '">
			<h6>
				' . $func->catchuoi($value["tenvi"], 40) . '
			</h6>
		</a>
		<a href="' . $value['tenkhongdauvi'] . '" class="des-content">
			<!-- <p class="date-tab">' . date('d/m/Y', $value['ngaytao']) . '</p> -->
			<p class="des-tab">' . $func->catchuoi($value["motavi"], 40) . '</p>
		</a>
		<div class="price">
			<div>
				<p>2.990.000đ</p>
				<p class="price-discount">2.990.000đ</p>
			</div>
			<div class="discount">-10%</div>
		</div>
		<button class="buy">Liên hệ</button>
		</div>
	</div>';
}
echo $output;
