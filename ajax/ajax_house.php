<?php
include "ajax_config.php";
define('LIBRARIES', '../libraries/');
define('THUMBS', 'thumbs');
$type = $_POST['type'];
$id = $_POST['id'];
$house_list = $d->rawQuery("select table_product.id, table_product.tenvi, table_product.ngaytao , table_product.tenkhongdauvi, table_product.motavi, table_product.photo from table_product RIGHT JOIN table_product_cat
ON table_product.id_cat = table_product_cat.id where table_product_cat.id = ? and table_product.type = ? and table_product.hienthi > 0 limit 5", array($id, $type));
var_dump($id);
var_dump($house_list);
$output = "";

foreach ($house_list as $key => $value) {
	$output .= '<div class="col-md-3 col-6">
		<div class="cover-content">
		<a class="image" href="' . $value[$sluglang]  . '">
			<img 
				onerror="this.src=' . THUMBS . '/380x270x2/assets/images/noimage.png"
				src="/upload/product/' . $value['photo'] . '" alt="">
		</a>
		<a href="' . $value['tenkhongdauvi'] . '">
                        <h6>'.$value["tenvi"].'</h6>
        </a>
		<div class="product-des-wrap">
        <p>' . htmlspecialchars_decode($value['motanganvi']) . '</p>
        </div>
		
		<div class="price">
			<div>
				<p>' . $func->convertPrice($value['gia']) . '</p>
				<p class="price-discount">' . $func->convertPrice($value['giamoi']) . '</p>
			</div>
			<div class="discount">' . $func->convertPrice($value['giakm']) . '%</div>
		</div>
		<button class="buy">Liên hệ</button>
		</div>
	</div>';
}
echo $output;
// <a href="' . $value['tenkhongdauvi'] . '" class="des-content">
// 			<!-- <p class="date-tab">' . date('d/m/Y', $value['ngaytao']) . '</p> -->
// 			<p class="des-tab">' . $func->catchuoi($value["motavi"], 40) . '</p>
// 		</a>
