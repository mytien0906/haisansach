<?php
include "ajax_config.php";

/* Paginations */
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (htmlspecialchars($_GET['perpage']) && $_GET['perpage'] > 0) ? htmlspecialchars($_GET['perpage']) : 10;
$eShow = htmlspecialchars($_GET['eShow']);


//$namelist = $_GET['namelist'];//(isset($_GET['namelist']) && $_GET['namelist'] !='') ? htmlspecialchars($_GET['namelist']) : 0;

$p = (isset($_GET['p']) && $_GET['p'] > 0) ? htmlspecialchars($_GET['p']) : 1;
$id = (isset($_GET['id']) && $_GET['id'] != '') ? htmlspecialchars($_GET['id']) : '';
$idl = (isset($_GET['idl']) && $_GET['idl'] != '') ? (int)$_GET['idl'] : 0;
$idc = (isset($_GET['idc']) && $_GET['idc'] != '') ? (int)$_GET['idc'] : 0;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "ajax/ajax_product_paging.php?idl=" . $idl . "&&perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
if ($idl > 0) {
	$where = " and id_list=" . $idl;
}
if ($idc > 0) {
	$where = " and id_cat=" . $idc;
}

$tempLink .= "&p=" . $p;
$pageLink .= $tempLink;


/* Get data */
$sql = "select ten$lang, tenkhongdauvi, id, photo, gia, giamoi, giakm, type, motangan$lang from #_product where type='san-pham' $where and hienthi > 0 order by stt,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->getCache($sqlCache, 'result', 7200);
$type = $items[0]['type'];
/* Count all data */
$countItems = count($cache->getCache($sql, 'result', 7200));
/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow, $idl);
?>
<?php if (isset($countItems) && $countItems > 0) { ?>
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
			<a class="buy" href="lien-he">Liên hệ</a>
		</div>
	<?php } ?>
<?php } else { ?>
	<div class="center">

		<div class="alert alert-warning" role="alert">
			<strong><?= noidungdangcapnhat ?></strong>
		</div>
	</div>
<?php }
?>
<script type="text/javascript">
	$(document).ready(function() {
		jQuery(document).ready(function() {
			var page = 1;
			var type = "<?= $com ?>"
			var idl = "<?= $idl ?>"
			var idc = "<?= $idc ?>"
			
		});
	});
</script>