(function($){
	$(document).ready(function(){
        var preInput = function (){
            nhapTret = parseFloat($('.vTret').val());
        	cBtnt = $('.cBtnt:checked').val();  
        	vhsHam = $('.vhsHam:checked').val();  

        	mong = parseFloat($('.cMong').val());  
            //vMong = parseFloat($('.vMong').val());  
            vMong = nhapTret;



        	cHam = parseFloat($('.cHam').val());  
        	ham = parseFloat($('.vHam').val());  
        	hsHam = vhsHam;
        	cLung = parseFloat($('.cLung').val());  
        	lung1 = parseFloat($('.vLung1').val());  

        	lau = parseInt($('.clau').val());  

        	cST = $('.cST:checked').val();  
        	tum = parseFloat($('.vtum').val());  


        	cmai = parseFloat($('.cMai').val());  
        	mai = parseFloat($('.vmai').val());  

        	baoloi = 'Dữ liệu nhập không hợp lệ';
        }

        var kqtinh = function (){
        	preInput();

            $('.bangtinh tr').each(function() {
                $(this).find('.note').removeClass('show').addClass('hide');
            });            

        	$('.fieldhinh  .lau').removeClass('show');

        	///////// Trệt
        	if( nhapTret < 10 ) {
        		nhapTret = 10;
        		$('.tr-tret').find('.note').removeClass('hide').addClass('show').html('Tầng trệt tối thiểu là 10m2');
        	}
        	if( isNaN(nhapTret)  ) {
        		nhapTret = 70;
        		$('.tr-tret').find('.note').removeClass('hide').addClass('show').html(baoloi);
        	}
      	
			$('.vTret').val(nhapTret);
        	
        	///////// Móng

            


        	// if( vMong < nhapTret || (isNaN(vMong))  ) {
        	// 	if( isNaN(vMong)) { 
        	// 		$('.tr-mong').find('.note').removeClass('hide').addClass('show').html(baoloi);
        	// 	}else{
        	// 		$('.tr-mong').find('.note').removeClass('hide').addClass('show').html('Móng không được nhỏ hơn tầng trệt');
        	// 	}
        	// 	vMong = nhapTret;
        	// }





	        	//Kiểm tra bê tông nền trệt
	        	if(cBtnt == '1' & cHam == '1'){
	        		btnt = 15;
	        		$('.fieldhinh').find('.betong').removeClass('hide').addClass('show');
	        	}else {
	        		btnt = 0;
	        		$('.fieldhinh').find('.betong').removeClass('show').addClass('hide');
	        	}
	        	//Hệ số móng
	        	if(mong == '1'){
	        		hsMong = 50 + btnt;
	        	}else {
	        		hsMong = 30 + btnt;
	        	}
	        	//Diện tích móng
	        	dtMong = vMong*(hsMong/100);
                var ndtMong = parseFloat(dtMong); 
                dtMong = Math.round(ndtMong * 1000)/1000; 
        	///////// Hầm

	        	if(cHam == '2'){
	        		btnt = 0;
	        		$('.labelBtnt').removeClass('show').addClass('hide');
	        		$('.tr-ham .vl2').removeClass('hide').addClass('show');
					$('.tr-ham .vl1').removeClass('show').addClass('hide');

					$('.fieldhinh  .ham').addClass('show');
	        	}else{
	        		$('.labelBtnt').removeClass('hide').addClass('show');

	        		$('.tr-ham .vl2').removeClass('show').addClass('hide');
					$('.tr-ham .vl1').removeClass('hide').addClass('show');
					$('.fieldhinh  .ham').removeClass('show');
	        	}    

	        	if( ham > vMong ||  (isNaN(ham))   ) {
	        		if( isNaN(ham)) { 
	        			$('.tr-ham').find('.note').removeClass('hide').addClass('show').html(baoloi);
	        		}else{
	        			$('.tr-ham').find('.note').removeClass('hide').addClass('show').html('Hầm không được lớn hơn móng');
	        		}	        		
	        		ham = vMong;

	        	}

	        	//Diện tích ham
	        	dtHam = ham*(hsHam/100);
                var ndtHam = parseFloat(dtHam); 
                dtHam = Math.round(ndtHam * 1000)/1000; 

        	///////// Lửng
        		
	        	if(cLung == '2'){
	        		$('.tr-lung .vl2').removeClass('hide').addClass('show');
					$('.tr-lung .vl1').removeClass('show').addClass('hide');
					$('.fieldhinh  .lung').addClass('show');
	        	}else{
	        		$('.tr-lung .vl2').removeClass('show').addClass('hide');
					$('.tr-lung .vl1').removeClass('hide').addClass('show');
					$('.fieldhinh  .lung').removeClass('show');
	        	}    

	            if(lung1 >= nhapTret ||  (isNaN(lung1)) ){
	        		if( isNaN(lung1)) { 
	        			$('.tr-lung').find('.note').removeClass('hide').addClass('show').html(baoloi);
	        		}else{
	        			$('.tr-lung').find('.note').removeClass('hide').addClass('show').html('Diện tích Lửng phải bé hơn diện tích Trệt');
	        		}	            	
	                lung1 = nhapTret*0.6;

	            }
	            lung2 = nhapTret - lung1;    

	        	if (lung2 >= 8){
	        		hsLung2 = 50;
	        	}
	        	else {
	        		hsLung2 = 100;
	        	}
	        	dtLung2 = lung2*(hsLung2/100);

        	/////////////////////////// Lầu


        	if(lau>=2){
        		$('.tr-lung,.tr-tum').addClass('show-tr').removeClass('hide-tr');
        		$('.fieldhinh  .tumstvamai').addClass('show');
        		$('.fieldhinh').removeClass('onlyTret');
        	}else {
        		$('.tr-lung,.tr-tum').addClass('hide-tr').removeClass('show-tr');
        		$('.fieldhinh').addClass('onlyTret');
        	}

        	lauthat = lau - 2;
        	//alert(lauthat);

        	$('tr[class*="lau-"]').removeClass('show-tr').removeClass('aptang').addClass('hide-tr');

        	for($i=1;$i<=lauthat;$i++){
        		$('tr.lau-'+$i).addClass('show-tr').removeClass('hide-tr');
        		$('.fieldhinh  .lau'+$i).addClass('show');

        		if($i==lauthat){
        			$('tr.lau-'+$i).addClass('aptang');
        		}
        	}

        	lau1 = parseInt($('.tanglau.lau-1').find('.input').val());  
        	lau2 = parseInt($('.tanglau.lau-2').find('.input').val());  
        	lau3 = parseInt($('.tanglau.lau-3').find('.input').val());  
        	lau4 = parseInt($('.tanglau.lau-4').find('.input').val());  
        	lau5 = parseInt($('.tanglau.lau-5').find('.input').val());  
        	lau6 = parseInt($('.tanglau.lau-6').find('.input').val());  
        	lau7 = parseInt($('.tanglau.lau-7').find('.input').val());  
        	lau8 = parseInt($('.tanglau.lau-8').find('.input').val());  
        	lau9 = parseInt($('.tanglau.lau-9').find('.input').val());  
        	lau10 = parseInt($('.tanglau.lau-10').find('.input').val());  

        	if(nhapTret>lau1 ||  (isNaN(lau1)) ){
        		if( isNaN(lau1)) { 
        			$('tr.tanglau.lau-1').find('.note').removeClass('hide').addClass('show').html(baoloi);
        		}else{
        			$('tr.tanglau.lau-1').find('.note').removeClass('hide').addClass('show').html('Lầu 1 không được nhỏ hơn tầng Trệt');
        		}	
        		lau1 = nhapTret + 5;
        	}

        	$('tr.tanglau.lau-1').find('.input').val(lau1);
        	$('tr.tanglau.lau-2').find('.input').val(lau2);
        	$('tr.tanglau.lau-3').find('.input').val(lau3);
        	$('tr.tanglau.lau-4').find('.input').val(lau4);
        	$('tr.tanglau.lau-5').find('.input').val(lau5);
        	$('tr.tanglau.lau-6').find('.input').val(lau6);
        	$('tr.tanglau.lau-7').find('.input').val(lau7);
        	$('tr.tanglau.lau-8').find('.input').val(lau8);
        	$('tr.tanglau.lau-9').find('.input').val(lau9);
        	$('tr.tanglau.lau-10').find('.input').val(lau10);



	        $('.tanglau').each(function() {
	        	value = parseInt($(this).find('input').val());
	        	sync = $(this).find('input').attr('data-sync');
	        	dtlau = $(this).find('.dtlau');

	        	valueNext = parseInt($(this).next('tr.tanglau').find('input').val());

	        	lauCurrent = parseInt($(this).attr('data-lau'));
	        	lauNext= parseInt($(this).next('tr.tanglau').attr('data-lau'));

	        	dtlau.html(value);
	        	$('span.'+sync).html(value);
	        	if(valueNext<value || isNaN(valueNext) ){

	        		if( isNaN(valueNext)) { 
	        			$(this).next('tr.tanglau').find('.note').removeClass('hide').addClass('show').html(baoloi);
	        		}else{
	        			$(this).next('tr.tanglau').find('.note').removeClass('hide').addClass('show').html('Lầu '+lauNext+' không được nhỏ hơn Lầu '+lauCurrent);
	        		}	
	        		valueNext = value;
	        		$(this).next('tr.tanglau').find('input').val(valueNext);
	        	}
	        });



        	/////////////////////////// San thuong

        	if(lau==2){
        		$('tr.tr-tret').addClass('aptang');
        	}else{
        		$('tr.tr-tret').removeClass('aptang');
        	}
        	aptang = parseInt($('tr.aptang input').val());  

        	tangthuong = parseInt($('tr.tr-thuong .tangthuong').val());  

        	lauEnd = lau-1 ;

        	if(tangthuong<aptang  || isNaN(tangthuong) ){
        		if( isNaN(tangthuong)) { 
        			$('.tr-thuong').find('.notethuong').removeClass('hide').addClass('show').html(baoloi);
        		}else{
        			$('.tr-thuong').find('.notethuong').removeClass('hide').addClass('show').html('Tầng thượng không được nhỏ hơn Tầng '+lauEnd);
        		}	

        		tangthuong = aptang;
        	}
        	if(tum>tangthuong  || isNaN(tum)){
        		if( isNaN(tum)) { 
        			$('.tr-thuong').find('.notetum').removeClass('hide').addClass('show').html(baoloi);
        		}else{
        			$('.tr-thuong').find('.notetum').removeClass('hide').addClass('show').html('Tum không được lớn hơn tầng thượng');
        		}	

        		tum =  tangthuong*0.4;
                var ntum = parseFloat(tum); 
                tum = Math.round(ntum * 1000)/1000; 


        	}

        	thuong = tangthuong - tum;
        	totalST=tum+thuong;


        	if(cST=='1'){
        		$('.tr-tum .vl1').children().removeClass('show').addClass('hide'); 
	        	$('.tr-tum .vl2').removeClass('hide').addClass('show');  
	        	$('.ktthuong').show();   
                $('.tangEnd').hide();
	        	$('.fieldhinh').removeClass('notum');   
	        	ktst = 'Tum';		
        	}else{
        		$('.tr-tum .vl1').children().removeClass('hide').addClass('show'); 
	        	$('.tr-tum .vl2').removeClass('show').addClass('hide');
	        	$('.ktthuong').hide();
                $('.tangEnd').show();
	        	$('.fieldhinh').addClass('notum');  
	        	ktst = 'tầng Áp mái';	

        	}
       	
        	dtst = thuong*0.5;

        	/////////////////////////// Mai
        	if(lau>=2){
        		if(cST=='1'){
        			apmai=tum;
        		}else{
        			apmai=tangthuong;
        		}
        		
        	}else{
        		apmai=nhapTret;
        	}


        	if(mai<apmai  || isNaN(mai) ){
        		if( isNaN(mai)) { 
        			$('.tr-mai').find('.note').removeClass('hide').addClass('show').html(baoloi);
        		}else{
        			$('.tr-mai').find('.note').removeClass('hide').addClass('show').html('Mái không được nhỏ hơn '+ktst);
        		}	
        		mai = apmai;

        	}
        	if(cmai == 1){
        		hsmai = 50;
        		hsmainghieng = 1;
        		$('.hsnghieng').hide();
        	}else if(cmai == 2){
        		hsmai = 35;
        		hsmainghieng = 1;
        		$('.hsnghieng').hide();
        	}else if(cmai == 3){
        		hsmai = 50;
        		hsmainghieng = 1.4;
        		$('.hsnghieng').show();
        	}else if(cmai == 4){
        		hsmai = 75;
        		hsmainghieng = 1.4;
        		$('.hsnghieng').show();
        	}

        	dtmai = (mai*(hsmai/100))*hsmainghieng;
            var ndtmai = parseFloat(dtmai); 
            dtmai = Math.round(ndtmai * 1000)/1000; 


        	/////////////////////////// Xuat 
        	$('.vMong').val(vMong);
        	$('.mhMong').html(vMong);

        	$('.hsMong').html(hsMong);
        	$('.dtMong').html(dtMong);

			$('.vHam').val(ham);
			$('.mhHam').html(ham);
        	$('.hsHam').html(hsHam);
        	$('.dtHam').html(dtHam);

        	$('.dtTret').html(nhapTret);

        	$('.vLung1').val(lung1);
        	$('.vLung2').html(lung2);
        	$('.dtLung1').html(lung1);
        	$('.dtLung2').html(dtLung2);
        	$('.hsLung2').html(hsLung2);

        	$('.tangEnd').html(lau);
        	$('.lauEnd').html(lau-1);


        	
        	$('.tangthuong').val(tangthuong);
        	$('.dtThuong').html(tangthuong);

        	$('.vtum').val(tum);
        	$('.vthuong').html(thuong);
        	$('.dtTum').html(tum);
        	$('.dtST').html(dtst);

        	$('.vmai').val(mai);
        	$('.mhmai').html(mai);

        	$('.hsmai').html(hsmai);
        	$('.dtmai').html(dtmai);

        }

        kqtinh();  



		$('.bangtinh').find('select, input').change(function () { 
			kqtinh(); 
			totalDt();
		});
        function changeReset() {
            $('#resetBtn').on('click',function () {

            $('.cBtnt').removeAttr('checked');
            $('.cST').attr('checked',true); 
            $('.cMai').val(1);  
            $('.clau').val(4);  
            $('.cHam').val(1); 
            $('.cLung').val(1); 
            $('.cMong').val(1); 

             

                $('.vTret').val(70);
                $('.vMong').val(70);  
                $('.vHam').val(70);  
                    hsHam = vhsHam;
                $('.vLung1').val(42);  
                $('.tanglau .quality .input').val(75);  
                $('.tr-thuong .quality .tangthuong').val(75);  
                $('.vtum').val(30);  
                $('.vmai').val(35);  


                kqtinh(); 
                totalDt();     
            });
        }
        changeReset();

      

        function changeInput() {
	        $('div.quality').each(function () {
                plus = $(this).children('.plus');
                minus = $(this).children('.minus');
	            $(plus).on('click',function () {
	            	valueNew = $(this).parent().children('input').val();
	                valueNew++;
	                $(this).parent().children('input').val(valueNew);
		        	kqtinh(); 
					totalDt();	   
	            });
	            $(minus).on('click',function () {
	            	valueNew = $(this).parent().children('input').val();
	            	valueNew--;
	            	$(this).parent().children('input').val(valueNew);
		        	kqtinh(); 
					totalDt();	     
	            });

	        });
		}
		changeInput();

        /////////////////////////// Tổng diện tích 
        function totalDt() {
            var totalDt = 0;
            $('tr.show-tr td.ketqua .show').each(function(){
                var itemDt = parseFloat($(this).html());
                totalDt = totalDt + itemDt;
            });
            $('.totalDt').html(totalDt);


			gianhapho =  $('.price-nhapho').data('price');
			giabietthu = $('.price-bietthu').data('price');

			console.log(giabietthu);
			thanhtiennhapho= gianhapho*totalDt;
			thanhtienbietthu= giabietthu*totalDt;
			
			$('.thanhtiennhapho span').html(new Intl.NumberFormat().format(thanhtiennhapho));
			$('.thanhtienbietthu span').html(new Intl.NumberFormat().format(thanhtienbietthu));
			//$('.thanhtiennhapho span').number( true, 0 );
			//$('.thanhtienbietthu span').number( true, 0 );

        }
        totalDt();

	}); 
})(jQuery);  
