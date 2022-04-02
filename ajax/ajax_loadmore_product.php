<?php
include "ajax_config.php";
define('LIBRARIES', '../libraries/');
define('THUMBS', 'thumbs');
$type = $_GET['type'];
$page_number = 10;
$output = "";
$page = $_GET['page'];
settype($page, "int");
$idl = (isset($_GET['idl']) && $_GET['idl'] != '') ? (int)$_GET['idl'] : 0;
$idc = (isset($_GET['idc']) && $_GET['idc'] != '') ? (int)$_GET['idc'] : 0;

$id = $_POST['id'];
$from = ($page - 1) * $page_number;

$where = "";
if ($idl > 0) {
	$where = " id_list=" . $idl;
}
if ($idc > 0) {
	$where .= " and id_cat=" . $idc;
}

if($where != "") {
	$where .= " and ";
}
$items = $d->rawQuery("select ten$lang, tenkhongdauvi, id, photo, gia, giamoi, giakm, type, motangan$lang from #_product where $where hienthi > 0 order by stt,id desc limit ?, ?", array($from, $page_number));
foreach ($items as $key => $value) { ?>
	<div class="col-2 cover-content">
		<a href="<?= $value[$sluglang] ?>" class="image">
			<span>
				<img onerror="this.src='<?= THUMBS ?>/380x270x2/assets/images/noimage.png';" windown.location.href="<?php $value[$sluglang] ?>" src="/upload/product/<?= $value['photo'] ?>" alt="<?= $value['ten' . $lang] ?>" /></span>
		</a>
		<a href="<?php echo $value['tenkhongdauvi'] ?>">
			<h6><?= $value["tenvi"] ?></h6>
		</a>
		<?php if ($value['motanganvi']) { ?>
			<div class="product-des-wrap">
				<p><?php echo htmlspecialchars_decode($value['motanganvi']) ?>
				</p>
			</div>
		<?php } ?>
		<div class="price">
			<div>
				<p><?= $func->convertPrice($value['gia']) ?></p>
				<p class="price-discount"><?= $func->convertPrice($value['giamoi']) ?></p>
			</div>
			<div class="discount"><?= $func->convertPrice($value['giakm']) ?>%</div>
		</div>
		<a class="buy" href="lien-he">Liên hệ</a>
	</div>
<?php
} ?>