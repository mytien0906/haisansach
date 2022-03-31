<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
@$idl = htmlspecialchars($_POST['idl']);

$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);

// New query
$idList = (isset($_GET['idList']) && $_GET['idList'] > 0) ? htmlspecialchars($_GET['idList']) : 0;
$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
$idItem = (isset($_GET['idItem']) && $_GET['idItem'] > 0) ? htmlspecialchars($_GET['idItem']) : 0;

//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";



/* Math url */
if ($idList) {
	$tempLink .= "&idList=" . $idList;
	$where .= " and id_list = " . $idList;
}
if ($idCat) {
	$tempLink .= "&idCat=" . $idCat;
	$where .= " and id_cat = " . $idCat;
}
if ($idItem) {
	$tempLink .= "&idItem=" . $idItem;
	$where .= " and id_item = " . $idItem;
}
$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select ten$lang, tenkhongdauvi, id, photo, gia, giamoi, giakm, type, motangan$lang from #_product where type='san-pham' $where and hienthi > 0 order by stt,id desc";
$items = $d->rawQuery($sql);
// $sqlCache = $sql . " limit $start, $pagingAjax->perpage";

// $items = $cache->getCache($sqlCache, 'result', 7200);

/* Count all data */
$countItems = count($cache->getCache($sql, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);

// $namelist = $d->rawQueryOne("select ten$lang from #_product_cat where type = ? and id = ? and hienthi > 0", array('san-pham', $idCat));
?>
<?php if ($countItems) { ?>
	<?php foreach ($items as $k => $value) { ?>
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
			<button class="buy">Liên hệ</button>
		</div>
	<?php } ?>
	<!-- <div class="paging_ajax">
		<?= $pagingItems ?>
	</div> -->
<?php } ?>