<?php  
	if(!defined('SOURCES')) die("Error");
	

 

	$namsinh=(int)$_GET['namsinh'];
	$gioitinh=htmlspecialchars($_GET['gioitinh']);
	$namxaydung=(int)$_GET['namxaydung'];

	if($namxaydung>0 && $namsinh>=0 && $gioitinh!=''){

	}else{
		$namsinh=1972;
		$gioitinh='Nam';
		$namxaydung=date('Y',time());
	}
	$tamtai= $func->layTamtai($namsinh,$namxaydung);
	$hoangoc= $func->layHoangoc($namsinh,$namxaydung);
	$kimlau= $func->layKimlau($namsinh,$namxaydung);
	$tuoi= $func->laytuoi($namsinh,$namxaydung);
	$tuoicongia= $func->layThiencanDiachi($namsinh);
	$cungmenh= $func->layCungmenh($namsinh,$gioitinh);
	$napam= $func->layNguhanhNapam($namsinh);
	$cungmenhnghanh= $func->layNguhanh($namsinh);
	$Huong= $func->layHuong($namsinh,$gioitinh);
	 
	if(($tamtai['check'] + $hoangoc['check'] + $kimlau['check'])==3){
		//Phạm 3 yêu tố
        $kq='Không nên tiến hành xây dựng, sửa chữa vì năm này gia chủ phạm phải Tam Tai, Hoàng Ốc, Kim Lâu nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==0 && $tamtai['check']==1 && $hoangoc['check']==1){
    	//Phạm tam tai, Hoàng ốc
        $kq='Không nên tiến hành xây dựng, sửa chữa vì năm này gia chủ phạm phải Tam Tai, Hoàng Ốc nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==1 && $tamtai['check']==1 && $hoangoc['check']==0){
    	//Phạm kim lâu, Tam tai
        $kq='Không nên tiến hành xây dựng, sửa chữa vì năm này gia chủ phạm phải Tam Tai, Kim Lâu nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==1 && $tamtai['check']==0 && $hoangoc['check']==1){
    	//Phạm kim lâu, Hoàng ốc
        $kq='Có thể tiến hành xây dựng, sửa chữa vì năm này gia chủ chỉ phạm phải Kim Lâu, Hoàng Ốc nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==1 && $tamtai['check']==0 && $hoangoc['check']==0){
    	//Phạm Kim lâu
        $kq='Không nên tiến hành xây dựng, sửa chữa vì năm này gia chủ phạm phải Kim Lâu nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==0 && $tamtai['check']==1 && $hoangoc['check']==0){
    	//Phạm Tam tai
        $kq='Có thê tiến hành xây dựng, sửa chữa vì năm này gia chủ chỉ phạm phải Tam tai nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==0 && $tamtai['check']==0 && $hoangoc['check']==1){
    	//Phạm Hoàng Ốc
        $kq='Có thê tiến hành xây dựng, sửa chữa vì năm này gia chủ chỉ phạm phải Hoàng ốc nếu tránh được thì nên chọn năm khác hoặc tiến hành thủ tục mượn tuổi.';
    }else if($kimlau['check']==0 && $tamtai['check']==0 && $hoangoc['check']==0){
    	//Phạm Kim lâu
        $kq='Hoàn toàn có thể tiến hành xây dựng, sửa chữa vì năm này sẽ không phạm phải Kim Lâu, Hoàng Ốc hay Tam Tai.';
    } 


	$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1",array('mau-sac'));
	$banner=$seopage['banner']; 
	/* SEO */
	if(!empty($seopage))
	{
		 
		if(!empty($seopage['title'.$seolang])) $seo->setSeo('title',$seopage['title'.$seolang]);
		else $seo->setSeo('title',$seopage['title'.$lang]);
		if(!empty($seopage['keywords'.$seolang])) $seo->setSeo('keywords',$seopage['keywords'.$seolang]);
		if(!empty($seopage['description'.$seolang])) $seo->setSeo('description',$seopage['description'.$seolang]);
		$seo->setSeo('url',$func->getPageURL());
		$img_json_bar = (isset($static['options']) && $static['options'] != '') ? json_decode($static['options'],true) : null;
		if($img_json_bar == null || ($img_json_bar['p'] != $static['photo']))
		{
			$img_json_bar = $func->getImgSize($static['photo'],UPLOAD_NEWS_L.$static['photo']);
			$seo->updateSeoDB(json_encode($img_json_bar),'static',$static['id']);
		}
		if(count($img_json_bar) > 0)
		{
			$seo->setSeo('photo',$config_base.THUMBS.'/'.$img_json_bar['w'].'x'.$img_json_bar['h'].'x2/'.UPLOAD_NEWS_L.$seopage['photo']);
			$seo->setSeo('photo:width',$img_json_bar['w']);
			$seo->setSeo('photo:height',$img_json_bar['h']);
			$seo->setSeo('photo:type',$img_json_bar['m']);
		}
	}

	/* breadCrumbs */
	if(isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com,$title_crumb);
	$breadcrumbs = $breadcr->getBreadCrumbs();
?>