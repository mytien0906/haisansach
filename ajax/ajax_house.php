<?php
include "ajax_config.php";
define('LIBRARIES', '../libraries/');
define('THUMBS', 'thumbs');
$type = $_POST['type'];
$idl = $_POST['idl'];
$idc = $_POST['idc'];

// var_dump($type);
// var_dump($idl);

$where = "";
$where = "type = ? and hienthi > 0";
array_push($params, $type);
$params = array();
if (isset($type)) {
	$where = "";
	// $list_pro_cat = $d->rawQuery("select id, `id_list`,`id_cat`,`noibat`,`photo`,`tenkhongdau$lang`,`motanganvi`,`tenvi`,`gia`,`giakm`,`giamoi`,`type` from table_product where $where and table_product.type = ? order by table_product.stt,table_product.id desc limit 5", array($idl, $type));
}
if (isset($idl) && $type == NULL) {
	$where = " where table_product.id_list = ?";
	array_push($params, $idl);
}

$sql = "select id, `id_list`,`id_cat`,`noibat`,`photo`,`tenkhongdau$lang`,`motanganvi`,`tenvi`,`gia`,`giakm`,
`giamoi`,`type` from table_product $where order by table_product.stt,table_product.id desc limit 5";
$list_pro_cat = $d->rawQuery($sql, $params);



// Hien thi ra giao dien
$output = "";
if (isset($list_pro_cat) && count($list_pro_cat) > 0) {
	foreach ($list_pro_cat as $key => $value) {
		$output .= '
		<div class="col-2 cover-content">
		<a class="image" href="' . $value[$sluglang]  . '">
			<img 
				onerror="this.src=' . THUMBS . '/380x270x2/assets/images/noimage.png"
				src="/upload/product/' . $value['photo'] . '" alt="">
		</a>
		<a href="' . $value['tenkhongdauvi'] . '">
                        <h6>' . $value["tenvi"] . '</h6>
        </a>
		<div class="product-des-wrap">
        <p>' . htmlspecialchars_decode($value['motanganvi']) . '</p>
        </div>
		
		<div class="price">
			<div>
				<p>' . $func->convertPrice($value['gia']) . '</p>
				<p class="price-discount">' . $func->convertPrice($value['giamoi']) . '</p>
			</div>
			<div class="discount">' . $value['giakm'] . '%</div>
		</div>
		<button class="buy">Liên hệ</button>
		</div>
		';
	}
	echo $output;
} else {
	$output .= '
	<div class="alert alert-warning" role="alert">
            <strong>' . khongtimthayketqua . '</strong>
        </div>
	';
	echo $output;
}
