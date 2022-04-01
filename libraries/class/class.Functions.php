<?php
class Functions
{
	private $d;
	private $hash;

	function __construct($d)
	{
		$this->d = $d;
	}


	/* Check URL */
	public function layThiencan($namsinh = 0)
	{
		$thiencan = array(
			'0' => 'Canh',
			'1' => 'Tân',
			'2' => 'Nhâm',
			'3' => 'Quý',
			'4' => 'Giáp',
			'5' => 'Ất',
			'6' => 'Bính',
			'7' => 'Đinh',
			'8' => 'Mậu',
			'9' => 'Kỷ'
		);
		$sonam = $namsinh % 10;

		return $thiencan[$sonam];
	}
	// Convert VND
	function convertPrice($price)
	{
		$symbol = 'đ';
		$new = number_format($price, 0, ',', '.');
		return $new . $symbol;
	}
	function catchuoi($chuoi, $gioihan)
	{
		if (strlen($chuoi) <= $gioihan) {
			return $chuoi;
		} else {
			if (strpos($chuoi, " ", $gioihan) > $gioihan) {
				$new_gioihan = strpos($chuoi, " ", $gioihan);
				$new_chuoi = substr($chuoi, 0, $new_gioihan) . "...";
				return $new_chuoi;
			}
			$new_chuoi = substr($chuoi, 0, $gioihan) . "...";
			return $new_chuoi;
		}
	}
	/* Check URL */
	public function layDiachi($namsinh = 0)
	{
		$diachi = array(
			'0' => 'Thân',
			'1' => 'Dậu',
			'2' => 'Tuất',
			'3' => 'Hợi',
			'4' => 'Tý',
			'5' => 'Sửu',
			'6' => 'Dần',
			'7' => 'Mão',
			'8' => 'Thìn',
			'9' => 'Tỵ',
			'10' => 'Ngọ',
			'11' => 'Mùi'
		);

		$laydiachi = $namsinh % 12;
		return $diachi[$laydiachi];
	}
	public function layThiencanDiachi($namsinh = 0)
	{
		$thiencan = $this->layThiencan($namsinh);
		$diachi = $this->layDiachi($namsinh);

		return $thiencan . ' ' . $diachi;
	}
	/* Check URL */
	public function laytuoi($namsinh = 0, $namxaynha = 0)
	{
		$tuoi = (($namxaynha - $namsinh) + 1);
		return $tuoi;
	}
	/* Check URL */
	public function layTamtai($namsinh = 0, $namxaynha = 0)
	{
		$thiencan = $this->layThiencan($namsinh);
		$diachi = $this->layDiachi($namsinh);

		$thiencanxd = $this->layThiencan($namxaynha);
		$diachixd = $this->layDiachi($namxaynha);

		$tamtai = array(
			'0' => 'Dần, Mão, Thìn',
			'1' => 'Hợi, Tý, Sửu',
			'2' => 'Thân, Dậu, Tuất',
			'3' => 'Tỵ, Ngọ, Mùi',
			'4' => 'Dần, Mão, Thìn',
			'5' => 'Hợi, Tý, Sửu',
			'6' => 'Thân, Dậu, Tuất',
			'7' => 'Tỵ, Ngọ, Mùi',
			'8' => 'Dần, Mão, Thìn',
			'9' => 'Hợi, Tý, Sửu',
			'10' => 'Thân, Dậu, Tuất',
			'11' => 'Tỵ, Ngọ, Mùi'
		);
		$sonam = $namsinh % 100;
		$laydiachi = $sonam % 12;

		$congiap_tamtai = explode(', ', $tamtai[$laydiachi]);



		if (in_array($diachixd, $congiap_tamtai)) {
			$check_tamtai = '<b class="error">phạm Tam Tai</b>';
			$class = 'alert-danger';
			$text_tamtai['check'] = 1;
		} else {
			$check_tamtai = '<b class="success">không phạm Tam Tai</b>';
			$class = 'alert-success';
			$text_tamtai['check'] = 0;
		}

		$text_tamtai['text'] = '<div class="content equal ' . $class . '" style="height: 135px;">
                     Gia chủ tuổi <b>' . $thiencan . ' ' . $diachi . '</b>, cần tránh các năm tam tai:<b>' . $tamtai[$laydiachi] . '</b> Dự kiến thi công năm <b>' . $namxaynha . '</b> tức năm <b>' . $thiencanxd . ' ' . $diachixd . '</b>, như vậy sẽ  ' . $check_tamtai . '
                  </div>';
		return $text_tamtai;
	}
	/* Check URL */
	public function layKimlau($namsinh = 0, $namxaynha = 0)
	{
		$tuoi = (($namxaynha - $namsinh) + 1);
		$kimlau = (($namxaynha - $namsinh) + 1) % 9;
		if ($kimlau == 1 || $kimlau == 3 || $kimlau == 6 || $kimlau == 8) {
			$text_kimlau['check'] = 1;
			$text_kimlau['text'] = '<div class="content equal alert-danger" style="height: 135px;">Dự kiến thi công năm <b>' . $namxaynha . '</b> khi gia chủ <b>' . $tuoi . '</b> tuổi (tuổi âm), sẽ <b class="error">phạm vào Kim Lâu</b></div>';
		} else {
			$text_kimlau['check'] = 0;
			$text_kimlau['text'] = '<div class="content equal alert-success" style="height: 135px;">Dự kiến thi công năm <b>' . $namxaynha . '</b> khi gia chủ <b>' . $tuoi . '</b> tuổi (tuổi âm), sẽ <b class="success">không phạm Kim Lâu</b></div>';
		}
		return $text_kimlau;
	}
	/* Check URL */
	public function layHoangoc($namsinh = 0, $namxaynha = 0)
	{
		$tuoi = (($namxaynha - $namsinh) + 1);
		$tuoisochan = floor($tuoi / 10);
		$tuoisole = $tuoi % 10;


		$hoangoc = ($tuoisochan + $tuoisole) % 6;
		if ($hoangoc == 3 || $hoangoc == 5 || $hoangoc == 0) {
			$text_hoangoc['check'] = 1;
			$text_hoangoc['text'] = '<div class="content equal alert-danger" style="height: 135px;">Dự kiến thi công năm <b>' . $namxaynha . '</b> khi gia chủ <b>' . $tuoi . '</b> tuổi (tuổi âm), sẽ <b class="error">phạm vào Hoàng Ốc</b></div>';
			return $text_hoangoc;
		} else {
			$text_hoangoc['check'] = 0;
			$text_hoangoc['text'] = '<div class="content equal alert-success" style="height: 135px;">Dự kiến thi công năm <b>' . $namxaynha . '</b> khi gia chủ <b>' . $tuoi . '</b> tuổi (tuổi âm), sẽ <b class="success">không phạm Hoàng Ốc</b></div>';
		}
		return $text_hoangoc;
	}
	/* Check URL */
	public function layCungmenh($namsinh = '0', $gioitinh = 'Nam')
	{
		$cungnam = array(
			'1' => 'Khảm',
			'2' => 'Ly',
			'3' => 'Cấn',
			'4' => 'Đoài',
			'5' => 'Càn',
			'6' => 'Khôn',
			'7' => 'Tốn',
			'8' => 'Chấn',
			'0' => 'Khôn'
		);
		$cungnu = array(

			'1' => 'Cấn',
			'2' => 'Càn',
			'3' => 'Đoài',
			'4' => 'Cấn',
			'5' => 'Ly',
			'6' => 'Khảm',
			'7' => 'Khôn',
			'8' => 'Chấn',
			'0' => 'Tốn',
		);
		$arrnamsinh = str_split((string)$namsinh);
		$tong = 0;
		foreach ($arrnamsinh as $key => $value) {
			$tong += $value;
		}

		$laydu = $tong % 9;
		if ($gioitinh == 'Nam') {

			$cungmenh['cung'] = $cungnam[$laydu];
			if ($laydu == 1 || $laydu == 2 || $laydu == 7 || $laydu == 8) {
				$cungmenh['menh'] = 'Đông tứ mệnh';
			} else {
				$cungmenh['menh'] = 'Tây tứ mệnh';
			}

			return $cungmenh;
		} else {

			$cungmenh['cung'] = $cungnu[$laydu];
			if ($laydu == 0 || $laydu == 5 || $laydu == 6 || $laydu == 8) {
				$cungmenh['menh'] = 'Đông tứ mệnh';
			} else {
				$cungmenh['menh'] = 'Tây tứ mệnh';
			}

			return $cungmenh;
		}
	}

	/* Check URL */
	public function layNguhanh($namsinh = 0)
	{
		$thiencan = $this->layThiencan($namsinh);
		$diachi = $this->layDiachi($namsinh);
		$arr_can = array(
			'Giáp' => 1,
			'Ất' => 1,
			'Bính' => 2,
			'Đinh' => 2,
			'Mậu' => 3,
			'Kỷ' => 3,
			'Canh' => 4,
			'Tân' => 4,
			'Nhâm' => 5,
			'Quý' => 5
		);
		$arr_chi = array(
			'Tý' => 0,
			'Sửu' => 0,
			'Ngọ' => 0,
			'Mùi' => 0,
			'Dần' => 1,
			'Mão' => 1,
			'Thân' => 1,
			'Dậu' => 1,
			'Thìn' => 2,
			'Tỵ' => 2,
			'Tuất' => 2,
			'Hợi' => 2

		);
		$arr_menh = array(
			'0' => 'Mộc',
			'1' => 'Kim',
			'2' => 'Thủy',
			'3' => 'Hỏa',
			'4' => 'Thổ'
		);
		$mausac[0] = '<div class="col-sm-6">
				    <p>
				        Hợp 2 tông màu cơ bản: <b>Xanh Lục và Xanh Lam Nhạt</b> <br />
				        <img data-src="assets/images/img-data/moc/4.jpg" src="assets/images/img-data/moc/4.jpg" />
				    </p>
				    <p>Bạn mệnh Mộc nên sử dụng tông màu xanh, ngoài ra kết hợp với tông màu đen, xanh biển sẫm (Thủy sinh Mộc). Nên tránh dùng những tông màu trắng và sắc ánh kim (Trắng bạch kim khắc Mộc).</p>
				    <p>
				        Bạn có thể dùng các màu sau: <br />
				        <img data-src="assets/images/img-data/moc/4_1.jpg" src="assets/images/img-data/moc/4_1.jpg" />
				    </p>
				</div>
			';
		$mausac[1] = '<div class="col-sm-6">
			    <p>
			        Hợp 2 tông màu cơ bản: <b>Vàng và trắng</b> <br />
			        <img data-src="assets/images/img-data/kim/0.jpg" src="assets/images/img-data/kim/0.jpg" />
			    </p>
			    <p>
			        Bạn mệnh Kim nên sử dụng tông màu sáng và những sắc ánh kim vì màu trắng là màu sở hữu của bản mệnh, ngoài ra kết hợp với các tông màu nâu, màu vàng vì đây là những màu sắc sinh vượng (Hoàng Thổ sinh Kim). Những màu này luôn đem lại
			        niềm vui, sự may mắn cho gia chủ. Tuy nhiên bạn phải tránh những màu sắc kiêng kỵ như màu hồng, màu đỏ, màu tím (Hồng Hỏa khắc Kim).
			    </p>
			    <p>
			        Bạn có thể dùng các màu sau: <br />
			        <img data-src="assets/images/img-data/kim/0_1.jpg" src="assets/images/img-data/kim/0_1.jpg" />
			    </p>
			</div>
			';
		$mausac[2] = '<div class="col-sm-6">
				    <p>
				        Hợp 2 tông màu cơ bản: <b>Xanh Lam Nhạt và Trắng</b> <br />
				        <img data-src="assets/images/img-data/thuy/1.jpg" src="assets/images/img-data/thuy/1.jpg" />
				    </p>
				    <p>Bạn mệnh Thủy nên sử dụng tông đen, màu xanh biển sẫm, ngoài ra kết hợp với các tông màu trắng và những sắc ánh kim (Kim sinh Thủy). Bạn nên tránh dùng những màu sắc kiêng kỵ như màu vàng đất, màu nâu (Hoàng thổ khắc Thủy).</p>
				    <p>
				        Bạn có thể dùng các màu sau: <br />
				        <img data-src="assets/images/img-data/thuy/1_1.jpg" src="assets/images/img-data/thuy/1_1.jpg" />
				    </p>
				</div>

			';
		$mausac[3] = '<div class="col-sm-6">
				    <p>
				        Hợp 2 tông màu cơ bản: <b>Đỏ và Xanh Lục</b> <br />
				        <img data-src="assets/images/img-data/hoa/2.jpg" src="assets/images/img-data/hoa/2.jpg" />
				    </p>
				    <p>Bạn mệnh Hỏa nên sử dụng tông màu đỏ, hồng, tím, ngoài ra kết hợp với các màu xanh (Mộc sinh Hỏa). Bạn nên tránh dùng những tông màu đen, màu xanh biển sẫm (nước đen khắc Hỏa).</p>
				    <p>
				        Bạn có thể dùng các màu sau: <br />
				        <img data-src="assets/images/img-data/hoa/2_1.jpg" src="assets/images/img-data/hoa/2_1.jpg" />
				    </p>
				</div>
			';
		$mausac[4] = '<div class="col-sm-6">
			    <p>
			        Hợp 2 tông màu cơ bản: <b>Vàng và Đỏ</b> <br />
			        <img data-src="assets/images/img-data/tho/3.jpg" src="assets/images/img-data/tho/3.jpg" />
			    </p>
			    <p>Bạn mệnh Thổ nên sử dụng tông màu vàng đất, màu nâu, ngoài ra có thể kết hợp với màu hồng, màu đỏ, màu tím (Hỏa sinh Thổ). Màu xanh là màu sắc kiêng kỵ mà bạn nên tránh dùng (Mộc khắc Thổ).</p>
			    <p>
			        Bạn có thể dùng các màu sau: <br />
			        <img data-src="assets/images/img-data/tho/3_1.jpg" src="assets/images/img-data/tho/3_1.jpg" />
			    </p>
			</div>
			';

		$somenh = ($arr_can[$thiencan] + $arr_chi[$diachi]) % 5;


		$cungmenh['menh'] = $arr_menh[$somenh];
		$cungmenh['mausac'] = $mausac[$somenh];
		return $cungmenh;
	}

	/* Check URL */
	public function layNguhanhNapam($namsinh = 0)
	{
		$thiencan = $this->layThiencanDiachi($namsinh);

		$arr_napam = array(
			'Canh Dần' => 'Tùng Bách Mộc - Gỗ tùng bách',
			'Tân Mão' => 'Tùng Bách Mộc - Gỗ tùng bách',
			'Nhâm Thìn' => 'Trường Lưu Thủy - Nước chảy mạnh',
			'Quý Tỵ' => 'Trường Lưu Thủy - Nước chảy mạnh',
			'Giáp Ngọ' => 'Sa Trung Kim - Vàng trong cát',
			'Ất Mùi' => 'Sa Trung Kim - Vàng trong cát',
			'Bính Thân' => 'Sơn Hạ Hỏa - Lửa trên núi',
			'Đinh Dậu' => 'Sơn Hạ Hỏa - Lửa trên núi',
			'Mậu Tuất' => 'Bình Địa Mộc - Gỗ đồng bằng',
			'Kỷ Hợi' => 'Bình Địa Mộc - Gỗ đồng bằng',
			'Canh Tý' => 'Bích Thượng Thổ - Đất tò vò',
			'Tân Sửu' => 'Bích Thượng Thổ - Đất tò vò',
			'Nhâm Dần' => 'Kim Bạch Kim - Vàng pha bạc',
			'Quý Mão' => 'Kim Bạch Kim - Vàng pha bạc',
			'Giáp Thìn' => 'Phú Đăng Hỏa - Lửa đèn to',
			'Ất Tỵ' => 'Phú Đăng Hỏa - Lửa đèn to',
			'Bính Ngọ' => 'Thiên Hà Thủy - Nước trên trời',
			'Đinh Mùi' => 'Thiên Hà Thủy - Nước trên trời',
			'Mậu Thân' => 'Đại Trạch Thổ - Đất nền nhà',
			'Kỷ Dậu' => 'Đại Trạch Thổ - Đất nền nhà',
			'Canh Tuất' => 'Thoa Xuyến Kim - Vàng trang sức',
			'Tân Hợi' => 'Thoa Xuyến Kim - Vàng trang sức',
			'Nhâm Tý' => 'Tang Đố Mộc - Gỗ cây dâu',
			'Quý Sửu' => 'Tang Đố Mộc - Gỗ cây dâu',
			'Giáp Dần' => 'Đại Khe Thủy - Nước khe lớn',
			'Ất Mão' => 'Đại Khe Thủy - Nước khe lớn',
			'Bính Thìn' => 'Sa Trung Thổ - Đất pha cát',
			'Đinh Tỵ' => 'Sa Trung Thổ - Đất pha cát',
			'Mậu Ngọ' => 'Thiên Thượng Hỏa - Lửa trên trời',
			'Kỷ Mùi' => 'Thiên Thượng Hỏa - Lửa trên trời',
			'Canh Thân' => 'Thạch Lựu Mộc - Gỗ cây lựu đá',
			'Tân Dậu' => 'Thạch Lựu Mộc - Gỗ cây lựu đá',
			'Nhâm Tuất' => 'Đại Hải Thủy - Nước biển lớn',
			'Quý Hợi' => 'Đại Hải Thủy - Nước biển lớn',
			'Giáp Tý' => 'Hải Trung Kim - Vàng trong biển',
			'Ất Sửu' => 'Hải Trung Kim - Vàng trong biển',
			'Bính Dần' => 'Lư Trung Hỏa - Lửa trong lò',
			'Đinh Mão' => 'Lư Trung Hỏa - Lửa trong lò',
			'Mậu Thìn' => 'Đại Lâm Mộc - Gỗ rừng già',
			'Kỷ Tỵ' => 'Đại Lâm Mộc - Gỗ rừng già',
			'Canh Ngọ' => 'Lộ Bàng Thổ - Đất đường đi',
			'Tân Mùi' => 'Lộ Bàng Thổ - Đất đường đi',
			'Nhâm Thân' => 'Kiếm Phong Kim - Vàng mũi kiếm',
			'Quý Dậu' => 'Kiếm Phong Kim - Vàng mũi kiếm',
			'Giáp Tuất' => 'Sơn Đầu Hỏa - Lửa trên núi',
			'Ất Hợi' => 'Sơn Đầu Hỏa - Lửa trên núi',
			'Bính Tý' => 'Giản Hạ Thủy - Nước khe suối',
			'Đinh Sửu' => 'Giản Hạ Thủy - Nước khe suối',
			'Mậu Dần' => 'Thành Đầu Thổ - Đất trên thành',
			'Kỷ Mão' => 'Thành Đầu Thổ - Đất trên thành',
			'Canh Thìn' => 'Bạch Lạp Kim - Vàng sáp ong',
			'Tân Tỵ' => 'Bạch Lạp Kim - Vàng sáp ong',
			'Nhâm Ngọ' => 'Dương Liễu Mộc - Gỗ cây dương',
			'Quý Mùi' => 'Dương Liễu Mộc - Gỗ cây dương',
			'Giáp Thân' => 'Tuyền Trung Thủy - Nước trong suối',
			'Ất Dậu' => 'Tuyền Trung Thủy - Nước trong suối',
			'Bính Tuất' => 'Ốc Thượng Thổ - Đất nóc nhà',
			'Đinh Hợi' => 'Ốc Thượng Thổ - Đất nóc nhà',
			'Mậu Tý' => 'Tích Lịch Hỏa - Lửa sấm sét',
			'Kỷ Sửu' => 'Tích Lịch Hỏa - Lửa sấm sét',

		);

		return $arr_napam[$thiencan];
	}

	/* Check URL */
	public function layHuong($namsinh = '0', $gioitinh = 'Nam')
	{

		$cungmenh = $this->layCungmenh($namsinh, $gioitinh);

		if ($cungmenh['cung'] == 'Càn') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/canf.jpg" src="assets/images/img-data/cung/canf.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Tây bắc (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;
				<strong>- Đông bắc (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.
				<strong>- Tây nam (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.
				<strong>- Chính Tây (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Chính Bắc (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.
				<strong>- Chính Đông (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.
				<strong>- Đông Nam (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...
				<strong>- Chính Nam (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';
			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <em><strong>- Cửa chính(huyền quan):</strong></em> Nên quay về các hướng Tây Bắc, Đông Bắc, Tây Nam, Chính Tây.<br />
				        <em><strong>- Hướng bếp:</strong></em> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm
				        <em>Toạ hung hướng cát</em>. <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Chính Đông và nhìn về ChínhTây, tức là tọa tại Ngũ Quỷ nhìn về Sinh Khí (bếp lành Sinh Khí).</li>
				        <li>Bếp đặt tại Đông Nam và nhìn về Tây Bắc, tức là tọa tại Hoạ Hại nhìn về Phục Vị (bếp lành Phục Vị).</li>
				    </ul>
				    <p align="justify">
				        <em><strong>- Hướng bàn thờ:</strong></em> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <em><strong>- Hướng giường:</strong></em> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <em><strong>- Hướng nhà vệ sinh:</strong></em> lưng quay về hướng Chính Bắc, Chính Đông, Đông Nam, Chính Nam. <br />
				        <em><strong>- Nguồn nước cấp:</strong></em> Tây tứ trạch, tức nước cấp vào hướng Tây.<br />
				        <em><strong>- Nguồn nước thoát:</strong></em> Đông tứ trạch, tức nước thoát ra hướng Đông.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Đoài') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/doai.jpg" src="assets/images/img-data/cung/doai.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Chính Tây (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Tây nam (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Đông bắc (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Tây bắc (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Đông nam (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Chính Nam (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Chính Bắc (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Chính Đông (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';
			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <strong><em>- Cửa chính(huyền quan):</em></strong> Nên quay về các hướng Chính Tây, Tây Nam, Đông Bắc, Tây Bắc.<br />
				        <strong><em>- Hướng bếp:</em></strong> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm
				        <em>Toạ hung hướng cát</em>. <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Đông Nam và nhìn về Tây Bắc, tức là tọa tại Lục Sát nhìn về Sinh Khí (bếp lành Sinh Khí).</li>
				        <li>Bếp đặt tại Chính Đông và nhìn về Chính Tây, tức là tọa tại Tuyệt Mệnh nhìn về Phục Vị (bếp lành Phục Vị).</li>
				    </ul>
				    <p align="justify">
				        <em><strong>- Hướng bàn thờ:</strong></em> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <strong><em>- Hướng giường:</em></strong> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <strong>
				            <em>
				                <br />
				                - Hướng nhà vệ sinh:
				            </em>
				        </strong>
				        lưng quay về hướng Đông Nam, Chính Nam, Chính Bắc, Chính Đông. <br />
				        <strong><em>- Nguồn nước cấp:</em></strong> Tây tứ trạch, tức nước cấp vào hướng Tây.<br />
				        <strong><em>- Nguồn nước thoát:</em></strong> Đông tứ trạch, tức nước thoát ra hướng Đông.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Cấn') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/cans.jpg" src="assets/images/img-data/cung/cans.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Đông bắc (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Tây bắc (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Chính Tây (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Tây nam (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Chính Đông (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Chính Bắc (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Chính Nam (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Đông nam (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';

			$huong['dexuat'] = '<div>
					    <p align="justify">
					        <strong><em>- Cửa chính(huyền quan):</em></strong> Nên quay về các hướng Đông Bắc, Tây Bắc, Chính Tây, Tây Nam.<br />
					        <strong><em>- Hướng bếp:</em></strong> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm
					        <em>Toạ hung hướng cát</em>. <br />
					        Trong trường hợp này, có thể đặt bếp như sau:
					    </p>
					    <ul>
					        <li>Bếp đặt tại Chính Đông và nhìn về Chính Tây, tức là tọa tại Lục Sát nhìn về Diên Niên (bếp lành Diên Niên).</li>
					        <li>Bếp đặt tại Đông Nam và nhìn về Tây Bắc, tức là tọa tại Tuyệt Mệnh nhìn về Thiên Y (bếp lành Thiên Y).</li>
					    </ul>
					    <p align="justify">
					        <strong><em>- Hướng bàn thờ:</em></strong> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
					        <strong><em>- Hướng giường:</em></strong> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
					        <strong><em>- Hướng nhà vệ sinh:</em></strong> lưng quay về hướng Chính Đông, Chính Bắc, Chính Nam, Đông Nam.<br />
					        <strong><em>- Nguồn nước cấp:</em></strong> Tây tứ trạch, tức nước cấp vào hướng Tây.<br />
					        <strong><em>- Nguồn nước thoát:</em></strong> Đông tứ trạch, tức nước thoát ra hướng Đông.
					    </p>
					</div>
				';
		}
		if ($cungmenh['cung'] == 'Khôn') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/khon.jpg" src="assets/images/img-data/cung/khon.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Tây nam (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Chính Tây (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Tây Bắc (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Đông bắc (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Chính Nam (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Đông nam (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Chính Đông (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Chính Bắc (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';

			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <em><strong>- Cửa chính(huyền quan):</strong></em> Nên quay về các hướng Đông Bắc, Tây Bắc, Chính Tây, Tây Nam.<br />
				        <em>
				            <strong>
				                <br />
				                - Hướng bếp:
				            </strong>
				        </em>
				        có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm <em>Toạ hung hướng cát</em>. <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Đông Nam và nhìn về Tây Bắc, tức là tọa tại Ngũ Quỷ nhìn về Diên Niên (bếp lành Diên Niên).</li>
				        <li>Bếp đặt tại Chính Đông và nhìn về Chính Tây, tức là tọa tại Họa Hại nhìn về Thiên Y (bếp lành Thiên Y).</li>
				    </ul>
				    <p align="justify">
				        <em><strong>- Hướng bàn thờ:</strong></em> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <strong><em>- Hướng giường:</em></strong> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <strong><em>- Hướng nhà vệ sinh:</em></strong> lưng quay về hướng Chính Nam, Đông Nam, Chính Đông, Chính Bắc.<br />
				        <strong><em>- Nguồn nước cấp:</em></strong> Tây tứ trạch, tức nước cấp vào hướng Tây<br />
				        <strong><em>- Nguồn nước thoát:</em></strong> Đông tứ trạch, tức nước thoát ra hướng Đông.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Ly') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/ly.jpg" src="assets/images/img-data/cung/ly.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Chính Nam (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Đông nam (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Chính Bắc (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Chính Đông (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Tây nam (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Chính Tây (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Đông bắc (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Tây bắc (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';
			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <strong><em>- Cửa chính(huyền quan):</em></strong> Nên quay về các hướng Chính Đông, Đông Nam, Chính Nam, Chính Bắc.<br />
				        <strong><em>- Hướng bếp:</em></strong> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm Toạ hung hướng
				        cát. <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Tây Bắc và nhìn về Đông Nam, tức là tọa tại Tuyệt Mệnh nhìn về Thiên Y (bếp lành Thiên Y).</li>
				        <li>Bếp đặt tại Chính Tây và nhìn về Chính Đông, tức là tọa tại Ngũ Quỷ nhìn về Sinh Khí (bếp lành Sinh Khí).</li>
				    </ul>
				    <p align="justify">
				        <strong><em>- Hướng bàn thờ:</em></strong> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <strong><em>- Hướng giường:</em></strong> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <em><strong>- Hướng nhà vệ sinh:</strong></em> lưng quay về hướng Tây Nam, Chính Tây, Đông Bắc, Tây Bắc. <br />
				        <em><strong>- Nguồn nước cấp:</strong></em> Đông tứ trạch, tức nước cấp vào hướng Đông.
				    </p>
				    <p align="justify">
				        <strong><em>- Nguồn nước thoát:</em></strong> Tây tứ trạch, nước thoát ra hướng Tây.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Khảm') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/kham.jpg" src="assets/images/img-data/cung/kham.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Chính Bắc (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Chính Đông (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Chính Nam (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Đông nam (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Tây bắc (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Đông bắc (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Chính Tây (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Tây nam (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';

			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <strong><em>- Cửa chính (huyền quan):</em></strong> Nên quay về các hướng Chính Đông, Đông Nam, Chính Nam, Chính Bắc.<br />
				        <strong><em>- Hướng bếp:</em></strong> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm
				        <em>Toạ hung hướng cát</em>.
				    </p>
				    Trong trường hợp này, có thể đặt bếp như sau: <br />
				    <ul>
				        <li>Bếp đặt tại Chính Tây và nhìn về Chính Đông, tức là tọa tại Họa Hại nhìn về Thiên Y (bếp lành Thiên Y).</li>
				        <li>Bếp đặt tại Tây Bắc và nhìn về Đông Nam, tức là tọa tại Lục Sát nhìn về Sinh Khí (bếp lành Sinh Khí).</li>
				    </ul>
				    <p align="justify">
				        <strong><em>- Hướng bàn thờ:</em></strong> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <strong><em>- Hướng giường:</em></strong> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <strong><em>- Hướng nhà vệ sinh:</em></strong> lưng quay về hướng Tây Bắc, Đông Bắc, Chính Tây, Tây Nam <br />
				        <strong><em>- Nguồn nước cấp:</em></strong> Đông tứ trạch, tức nước cấp vào hướng Đông. <br />
				        <strong><em>- Nguồn nước thoát:</em></strong> Tây tứ trạch, nước thoát ra hướng Tây.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Tốn') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/ton.jpg" src="assets/images/img-data/cung/ton.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Đông nam (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Chính Nam (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Chính Đông (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Chính Bắc (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Chính Tây (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Tây nam (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Tây bắc (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Đông bắc (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';

			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <em><strong>- Cửa chính(huyền quan):</strong></em> Nên quay về các hướng Chính Đông, Đông Nam, Chính Nam, Chính Bắc.<br />
				        <strong><em>- Hướng bếp:</em></strong> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm Toạ hung hướng
				        cát. <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Tây Bắc và nhìn về Đông Nam, tức là tọa tại Họa Hại nhìn về Phục Vị (bếp lành Phục Vị).</li>
				        <li>Bếp đặt tại Chính Tây và nhìn về Chính Đông, tức là tọa tại Lục Sát nhìn về Diên Niên (bếp lành Diên Niên).</li>
				    </ul>
				    <p align="justify">
				        <strong><em>- Hướng bàn thờ:</em></strong> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <em><strong>- Hướng giường:</strong></em> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <em><strong>- Hướng nhà vệ sinh:</strong></em> lưng quay về hướng Chính Tây, Tây Nam, Tây Bắc, Đông Bắc. <br />
				        <em><strong>- Nguồn nước cấp:</strong></em> Đông tứ trạch, tức nước cấp vào hướng Đông.<br />
				        <em><strong>- Nguồn nước thoát:</strong></em> Tây tứ trạch, tức nước thoát ra hướng Tây.
				    </p>
				</div>
				';
		}
		if ($cungmenh['cung'] == 'Chấn') {
			$huong['batquai'] = '<div class="col-sm-6 text-center"><img data-src="assets/images/img-data/cung/chan.jpg" src="assets/images/img-data/cung/chan.jpg" /></div>';
			$huong['tot'] = '
				<strong>- Chính Đông (Phục Vị):</strong> Đây là cung bình yên, vững cho chủ nhà, tình duyên nam nữ gắn bó, khả năng tài chính tốt, quan hệ cha mẹ vợ con tốt;<br />
				<strong>- Chính Bắc (Thiên Y):</strong> Chủ về sức khỏe tốt, lợi cho phụ nữ, vượng tài lộc, tiêu trừ bệnh, tâm tình ổn định, có giấc ngủ ngon, thường có quý nhân phù trợ, luôn đổi mới.<br />
				<strong>- Đông nam (Diên Niên):</strong> Đây là cung hoà thuận, tốt cho sự nghiệp và ngoại giao, với các mối quan hệ khác, vợ chồng hoà thuận, tuổi thọ tăng thêm, bớt kẻ địch, tính hoà dịu, với nữ giới có bạn đời tốt.<br />
				<strong>- Chính Nam (Sinh Khí):</strong> chủ việc vượng tốt cho con nguời, có lợi cho con trai, lợi cho danh tiếng, tạo ra sức sống dồi dào.
				';

			$huong['xau'] = '
				<strong>- Đông bắc (Lục Sát):</strong> Nếu cung Lục sát là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì tình duyên trắc trở, vợ chồng thường cãi nhau, sự nghiệp không tốt.<br />
				<strong>- Tây bắc (Ngũ Quỷ):</strong> Nếu cung Ngũ Quỷ là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì các sự việc lôi thôi vô cớ ập đến.<br />
				<strong>- Tây nam (Hoạ Hại):</strong> Nếu cung Hoạ hại là vị trí tốt ( cửa ra vào, phòng ngủ, bếp ) thì người nhà bị chia rẽ, mệt mỏi vì những việc vụn vặt, hay thưa kiện với người ngoài, thất tài...<br />
				<strong>- Chính tây (Tuyệt Mệnh):</strong> Nếu cung Tuyệt mệnh vào vị trí tốt : chủ nhân có thể bị bệnh khó chữa, đụng xe, mất trộm, trong người cảm thấy không yên ổn, mọi việc tính toán quá đáng, buồn phiền, ức chế tâm thần, duyên phận con cái bạc bẽo.
				';

			$huong['dexuat'] = '<div>
				    <p align="justify">
				        <em><strong>- Cửa chính(huyền quan):</strong></em> Nên quay về các hướng Chính Đông, Chính Bắc, Đông Nam, Chính Nam.<br />
				        <em><strong>- Hướng bếp:</strong></em> có thể hiểu là hướng cửa bếp đối với bếp lò, bếp dầu, hướng công tắc điều khiển đối với bếp điện, bếp gas. Hướng bếp nên đặt ở hướng xấu, và nhìn về hướng tốt, theo quan niệm
				        <em>Toạ hung hướng cát.</em> <br />
				        Trong trường hợp này, có thể đặt bếp như sau:
				    </p>
				    <ul>
				        <li>Bếp đặt tại Tây Bắc và nhìn về Đông Nam, tức là tọa tại Ngũ Quỷ nhìn về Diên Niên (bếp lành Diên Niên).</li>
				        <li>Bếp đặt tại Chính Tây và nhìn về Chính Đông, tức là tọa tại Tuyệt Mệnh nhìn về Phục Vị (bếp lành Phục Vị).</li>
				    </ul>
				    <p align="justify">
				        <em><strong>- Hướng bàn thờ:</strong></em> Nên quay về hướng tốt (Sinh khí, Diên niên)<br />
				        <em><strong>- Hướng giường:</strong></em> Vị trí phòng ngủ trong nhà và vị trí giường ngủ trong phòng ngủ nên ưu tiên ở hướng tốt (các hướng Sinh Khí, Thiên Y, Diên Niên, Phục Vị).<br />
				        <em><strong>- Hướng nhà vệ sinh:</strong></em> lưng quay về hướng Đông Bắc, Tây Bắc, Tây Nam, Chính Tây.<br />
				        <em><strong>- Nguồn nước cấp:</strong></em> Đông tứ trạch, tức nước cấp vào hướng Đông.<br />
				        <em><strong>- Nguồn nước thoát:</strong></em> Tây tứ trạch, tức nước thoát ra hướng Tây.
				    </p>
				</div>
				';
		}
		return $huong;
	}

	/* Check URL */
	public function checkURL($index = false)
	{
		global $config_base;

		$url = '';
		$urls = array('index', 'index.html', 'trang-chu', 'trang-chu.html');

		if (array_key_exists('REDIRECT_URL', $_SERVER)) {
			$root = str_replace("/index.php", "", $_SERVER['PHP_SELF']);
			$url = str_replace($root . "/", "", $_SERVER['REDIRECT_URL']);
		} else {
			$url = explode("/", $_SERVER['REQUEST_URI']);
			$url = $url[count($url) - 1];
			if (strpos($url, "?")) {
				$url = explode("?", $url);
				$url = $url[0];
			}
		}
		if ($index) array_push($urls, "index.php");
		else if (array_search('index.php', $urls)) $urls = array_diff($urls, ["index.php"]);
		if (in_array($url, $urls)) $this->redirect($config_base, 301);
	}

	/* Check HTTP */
	public function checkHTTP($http, $arrayDomain, &$config_base, $config_url)
	{
		if (count($arrayDomain) == 0 && $http == 'https://') {
			$config_base = 'http://' . $config_url;
		}
	}

	/* Create sitemap */
	public function createSitemap($com = '', $type = '', $field = '', $table = '', $time = '', $changefreq = '', $priority = '', $lang = 'vi', $orderby = '', $menu = true)
	{
		global $config_base;

		$urlsm = '';
		$sitemap = null;

		if ($type != '' && $table != 'photo') {
			$sitemap = $this->d->rawQuery("select tenkhongdau$lang, ngaytao from #_$table where type = ? order by $orderby desc", array($type));
		}

		if ($menu == true && $field == 'id') {
			$urlsm = $config_base . $com;
			echo '<url>';
			echo '<loc>' . $urlsm . '</loc>';
			echo '<lastmod>' . date('c', time()) . '</lastmod>';
			echo '<changefreq>' . $changefreq . '</changefreq>';
			echo '<priority>' . $priority . '</priority>';
			echo '</url>';
		}

		if ($sitemap) {
			foreach ($sitemap as $value) {
				$urlsm = $config_base . $value['tenkhongdau' . $lang];
				echo '<url>';
				echo '<loc>' . $urlsm . '</loc>';
				echo '<lastmod>' . date('c', $value['ngaytao']) . '</lastmod>';
				echo '<changefreq>' . $changefreq . '</changefreq>';
				echo '<priority>' . $priority . '</priority>';
				echo '</url>';
			}
		}
	}

	/* Kiểm tra dữ liệu nhập vào */
	public function cleanInput($input = '')
	{
		$output = '';

		if ($input != '') {
			$search = array(
				'@<script[^>]*?>.*?</script>@si', // Loại bỏ javascript
				'@<[\ /\!]*?[^<>]*?>@si', // Loại bỏ HTML tags
				'@<style[^>]*?>.*?</style>@siU', // Loại bỏ style tags
				'@
        <![\s\S]*?--[ \t\n\r]*>@'         // Loại bỏ multi-line comments
			);
			$output = preg_replace($search, '', $input);
		}

		return $output;
	}

	/* Kiểm tra dữ liệu nhập vào */
	public function sanitize($input = '')
	{
		if (is_array($input)) {
			foreach ($input as $var => $val) {
				$output[$var] = $this->sanitize($val);
			}
		} else {
			if (get_magic_quotes_gpc()) {
				$input = stripslashes($input);
			}
			$input  = $this->cleanInput($input);
			$output = addslashes($input);
		}
		return $output;
	}

	/* Kiểm tra đăng nhập */
	public function check_login()
	{
		global $login_admin;

		$token = (isset($_SESSION[$login_admin]['token'])) ? $_SESSION[$login_admin]['token'] : '';
		$row = $this->d->rawQuery("select quyen from #_user where quyen = ? and hienthi>0", array($token));

		if (count($row) == 1 && $row[0]['quyen'] != '') {
			return true;
		} else {
			$_SESSION[$login_admin] = NULL;
			session_unset();
			return false;
		}
	}

	/* Mã hóa mật khẩu admin */
	public function encrypt_password($secret = '', $str = '', $salt = '')
	{
		return md5($secret . $str . $salt);
	}

	/* Kiểm tra phân quyền menu */
	public function check_access($com = '', $act = '', $type = '', $array = null, $case = '', $dropdown = null)
	{
		$str = $com;

		if ($act) $str .= '_' . $act;

		if ($case == 'phrase-1') {
			if ($type != '') $str .= '_' . $type;
			if (!in_array($str, $_SESSION['list_quyen'])) return true;
			else return false;
		} else if ($case == 'phrase-2') {
			$count = 0;

			if ($array) {
				if ($dropdown == false) {
					foreach ($array as $key => $value) {
						if (isset($value['dropdown']) && $value['dropdown'] == true) {
							unset($array[$key]);
						}
					}
				}

				foreach ($array as $key => $value) {
					if (!in_array($str . "_" . $key, $_SESSION['list_quyen'])) $count++;
				}

				if ($count == count($array)) return true;
			} else return false;
		}

		return false;
	}

	/* Kiểm tra phân quyền */
	public function check_permission()
	{
		global $config, $login_admin;

		if ($_SESSION[$login_admin]['role'] == 3 || !empty($config['website']['debug-developer'])) return false;
		else return true;
	}

	/* Lấy tình trạng nhận tin */
	public function get_status_newsletter($tinhtrang = 0, $type = '')
	{
		global $config;

		$loai = '';

		if (isset($config['newsletter'][$type]['tinhtrang']) && count($config['newsletter'][$type]['tinhtrang']) > 0) {
			foreach ($config['newsletter'][$type]['tinhtrang'] as $key => $value) {
				if ($key == $tinhtrang) {
					$loai = $value;
					break;
				}
			}
		}

		if ($loai == '') $loai = "Đang chờ duyệt...";

		return $loai;
	}

	/* Lấy hình thức thanh toán */
	public function get_payments($id = 0)
	{
		if ($id) {
			$row = $this->d->rawQueryOne("select tenvi from #_news where id = ? limit 0,1", array($id));
			return $row['tenvi'];
		} else {
			return false;
		}
	}

	/* Lấy màu cart */
	public function get_color_cart($id = 0)
	{
		if ($id) {
			$row = $this->d->rawQueryOne("select mau, loaihienthi, photo, tenvi from #_product_mau where id = ? limit 0,1", array($id));
			return $row;
		} else {
			return false;
		}
	}

	/* Lấy places */
	public function get_places($table = '', $id = 0)
	{
		if ($table && $id) {
			$row = $this->d->rawQueryOne("select ten from #_$table where id = ? limit 0,1", array($id));
			return $row['ten'];
		} else {
			return false;
		}
	}

	/* Join ID */
	public function joinID($array = null, $column = null)
	{
		$str = '';

		if ($array && $column) {
			foreach ($array as $k => $v) {
				if (isset($v[$column]) && $v[$column]) {
					$str .= $v[$column] . ',';
				}
			}

			if ($str) {
				$str = rtrim($str, ',');
			}
		}

		return $str;
	}

	/* Format money */
	public function format_money($price = 0, $unit = 'đ', $html = false)
	{
		$str = '';
		if ($price) {
			$str .= number_format($price, 0, ',', '.');
			if ($unit != '') {
				if ($html) {
					$str .= '<span>' . $unit . '</span>';
				} else {
					$str .= $unit;
				}
			}
		} else {
			$str = 'Liên hệ';
		}
		return $str;
	}

	/* Check recaptcha */
	public function checkRecaptcha($response = '')
	{
		global $config;

		$result = null;
		$active = $config['googleAPI']['recaptcha']['active'];

		if ($active == true && $response != '') {
			$recaptcha = file_get_contents($config['googleAPI']['recaptcha']['urlapi'] . '?secret=' . $config['googleAPI']['recaptcha']['secretkey'] . '&response=' . $response);
			$recaptcha = json_decode($recaptcha);
			$result['score'] = $recaptcha->score;
			$result['action'] = $recaptcha->action;
		} else if (!$active) {
			$result['test'] = true;
		}

		return $result;
	}

	/* Login */
	public function checkLogin()
	{
		global $d, $config_base, $login_member;

		if (isset($_SESSION[$login_member]) || isset($_COOKIE['login_member_id'])) {
			$flag = true;
			$iduser = (isset($_COOKIE['login_member_id']) && $_COOKIE['login_member_id'] > 0) ? $_COOKIE['login_member_id'] : $_SESSION[$login_member]['id'];

			if ($iduser) {
				$row = $this->d->rawQueryOne("select login_session, id, username, dienthoai, diachi, email, ten from #_member where id = ? and hienthi > 0", array($iduser));

				if ($row['id']) {
					$login_session = (isset($_COOKIE['login_member_session']) && $_COOKIE['login_member_session'] > 0) ? $_COOKIE['login_member_session'] : $_SESSION[$login_member]['login_session'];

					if ($login_session == $row['login_session']) {
						$_SESSION[$login_member]['active'] = true;
						$_SESSION[$login_member]['id'] = $row['id'];
						$_SESSION[$login_member]['username'] = $row['username'];
						$_SESSION[$login_member]['dienthoai'] = $row['dienthoai'];
						$_SESSION[$login_member]['diachi'] = $row['diachi'];
						$_SESSION[$login_member]['email'] = $row['email'];
						$_SESSION[$login_member]['ten'] = $row['ten'];
					} else $flag = false;
				} else $flag = false;

				if (!$flag) {
					unset($_SESSION[$login_member]);
					setcookie('login_member_id', "", -1, '/');
					setcookie('login_member_session', "", -1, '/');

					$this->transfer("Tài khoản của bạn đã hết hạn đăng nhập hoặc đã đăng nhập trên thiết bị khác", $config_base, false);
				}
			}
		}
	}

	/* Lấy youtube */
	public function getYoutube($url = '')
	{
		if ($url != '') {
			$parts = parse_url($url);
			if (isset($parts['query'])) {
				parse_str($parts['query'], $qs);
				if (isset($qs['v'])) return $qs['v'];
				else if ($qs['vi']) return $qs['vi'];
			}

			if (isset($parts['path'])) {
				$path = explode('/', trim($parts['path'], '/'));
				return $path[count($path) - 1];
			}
		}

		return false;
	}

	/* Template gallery */
	public function galleryFiler($stt = 1, $id = 0, $photo = '', $name = '', $folder = '', $col = '')
	{
		$str = '';
		$str .= '<li class="jFiler-item my-jFiler-item my-jFiler-item-' . $id . ' ' . $col . '" data-id="' . $id . '">';
		$str .= '<div class="jFiler-item-container">';
		$str .= '<div class="jFiler-item-inner">';
		$str .= '<div class="jFiler-item-thumb">';
		$str .= '<div class="jFiler-item-thumb-image">';
		$str .= '<img src="../upload/' . $folder . '/' . $photo . '" alt="' . $name . '"><i class="fas fa-arrows-alt"></i>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '<div class="jFiler-item-assets jFiler-row">';
		$str .= '<ul class="list-inline pull-right d-flex align-items-center justify-content-between">';
		$str .= '<li class="ml-1">';
		$str .= '<a class="icon-jfi-trash jFiler-item-trash-action my-jFiler-item-trash" data-id="' . $id . '" data-folder="' . $folder . '"></a>';
		$str .= '</li>';
		$str .= '<li class="mr-1">';
		$str .= '<div class="custom-control custom-checkbox d-inline-block align-middle text-md">';
		$str .= '<input type="checkbox" class="custom-control-input filer-checkbox" id="filer-checkbox-' . $id . '" value="' . $id . '">';
		$str .= '<label for="filer-checkbox-' . $id . '" class="custom-control-label font-weight-normal">Chọn</label>';
		$str .= '</div>';
		$str .= '</li>';
		$str .= '</ul>';
		$str .= '</div>';
		$str .= '<input type="number" class="form-control form-control-sm my-jFiler-item-info rounded mb-1" value="' . $stt . '" placeholder="Số thứ tự" data-info="stt" data-id="' . $id . '"/>';
		$str .= '<input type="text" class="form-control form-control-sm my-jFiler-item-info rounded" value="' . $name . '" placeholder="Tiêu đề" data-info="tieude" data-id="' . $id . '"/>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</li>';
		return $str;
	}

	/* Delete gallery */
	public function deleteGallery()
	{
		$row = $this->d->rawQuery("select id, com, photo from #_gallery where hash != '' and ngaytao < " . (time() - 3 * 3600));
		$array = array("product" => UPLOAD_PRODUCT, "news" => UPLOAD_NEWS);

		if ($row) {
			foreach ($row as $item) {
				@unlink($array[$item['com']] . $item['photo']);
				$this->d->rawQuery("delete from #_gallery where id = " . $item['id']);
			}
		}
	}

	/* Generate hash */
	public function generateHash()
	{
		if (!$this->hash) {
			$this->hash = $this->stringRandom(10);
		}
		return $this->hash;
	}

	/* Lấy date */
	public function make_date($time = 0, $dot = '.', $lang = 'vi', $f = false)
	{
		$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y", $time) : date("m{$dot}d{$dot}Y", $time);

		if ($f == true) {
			$thu['vi'] = array('Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy');
			$thu['en'] = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
			$str = $thu[$lang][date('w', $time)] . ', ' . $str;
		}

		return $str;
	}

	/* Alert */
	public function alert($notify = '')
	{
		echo '<script language="javascript">alert("' . $notify . '")</script>';
	}

	/* Delete file */
	public function delete_file($file = '')
	{
		return @unlink($file);
	}

	/* Transfer */
	public function transfer($msg = '', $page = '', $stt = true)
	{
		global $config_base;

		$basehref = $config_base;
		$showtext = $msg;
		$page_transfer = $page;
		$stt = $stt;

		include("./templates/layout/transfer.php");
		exit();
	}

	/* Redirect */
	public function redirect($url = '', $response = null)
	{
		header("location:$url", true, $response);
		exit();
	}

	/* Dump */
	public function dump($value = '', $exit = false)
	{
		echo "<pre>";
		print_r($value);
		echo "</pre>";
		if ($exit) exit();
	}

	/* Pagination */
	public function pagination($totalq = 0, $per_page = 10, $page = 1, $url = '?')
	{
		$urlpos = strpos($url, "?");
		$url = ($urlpos) ? $url . "&" : $url . "?";
		$total = $totalq;
		$adjacents = "2";
		// $firstlabel = "First";

		$prevlabel = "<img src='assets/images/angles-left-solid.svg' alt=''>";
		$nextlabel = "<img src='assets/images/angles-right-solid.svg' alt=''>";
		// $lastlabel = "Last";
		$page = ($page == 0 ? 1 : $page);
		$start = ($page - 1) * $per_page;
		$prev = $page - 1;
		$next = $page + 1;
		$lastpage = ceil($total / $per_page);
		$lpm1 = $lastpage - 1;
		$pagination = "";

		if ($lastpage > 1) {
			$pagination .= "<ul class='pagination justify-content-center mb-0'>";
			// $pagination .= "<li class='page-item'><a class='page-link'>Page {$page} / {$lastpage}</a></li>";
			$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$prev}'>{$prevlabel}</a></li>";
			if ($page > 1) {
				// $pagination.= "<li class='page-item'><a class='page-link' href='{$this->getCurrentPageURL()}'>{$firstlabel}</a></li>";
			}
			if ($lastpage < 7 + ($adjacents * 2)) {
				for ($counter = 1; $counter <= $lastpage; $counter++) {
					if ($counter == $page) $pagination .= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
					else $pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
				}
			} elseif ($lastpage > 5 + ($adjacents * 2)) {
				if ($page < 1 + ($adjacents * 2)) {
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
						if ($counter == $page) $pagination .= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
						else $pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
					}

					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$lpm1}'>{$lpm1}</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$lastpage}'>{$lastpage}</a></li>";
				} elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>1</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=2'>2</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";

					for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
						if ($counter == $page) $pagination .= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
						else $pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
					}

					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$lpm1}'>{$lpm1}</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$lastpage}'>{$lastpage}</a></li>";
				} else {
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>1</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=2'>2</a></li>";
					$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p=1'>...</a></li>";

					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
						if ($counter == $page) $pagination .= "<li class='page-item active'><a class='page-link'>{$counter}</a></li>";
						else $pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$counter}'>{$counter}</a></li>";
					}
				}
			}
			// if ($page < $counter - 1) {
			// 	$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$next}'>{$nextlabel}</a></li>";
			// 	// $pagination.= "<li class='page-item'><a class='page-link' href='{$url}p=$lastpage'>{$lastlabel}</a></li>";
			// }
			$pagination .= "<li class='page-item'><a class='page-link' href='{$url}p={$next}'>{$nextlabel}</a></li>";
			$pagination .= "</ul>";
		}

		return $pagination;
	}


	/* UTF8 convert */
	public function utf8convert($str = '')
	{
		if ($str != '') {
			$utf8 = array(
				'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'd' => 'đ|Đ',
				'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
				'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
				'' => '`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\“|\”|\:|\;|_',
			);

			foreach ($utf8 as $ascii => $uni) {
				$str = preg_replace("/($uni)/i", $ascii, $str);
			}
		}

		return $str;
	}

	/* Change title */
	public function changeTitle($text = '')
	{
		if ($text != '') {
			$text = strtolower($this->utf8convert($text));
			$text = preg_replace("/[^a-z0-9-\s]/", "", $text);
			$text = preg_replace('/([\s]+)/', '-', $text);
			$text = str_replace(array('%20', ' '), '-', $text);
			$text = preg_replace("/\-\-\-\-\-/", "-", $text);
			$text = preg_replace("/\-\-\-\-/", "-", $text);
			$text = preg_replace("/\-\-\-/", "-", $text);
			$text = preg_replace("/\-\-/", "-", $text);
			$text = '@' . $text . '@';
			$text = preg_replace('/\@\-|\-\@|\@/', '', $text);
		}

		return $text;
	}

	/* Lấy IP */
	public function getRealIPAddress()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	/* Lấy getPageURL */
	public function getPageURL()
	{
		$pageURL = 'http';
		if (array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
		$pageURL .= "://";
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		return $pageURL;
	}

	/* Lấy getCurrentPageURL */
	public function getCurrentPageURL()
	{
		$pageURL = 'http';
		if (array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
		$pageURL .= "://";
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		$urlpos = strpos($pageURL, "?p");
		$pageURL = ($urlpos) ? explode("?p=", $pageURL) : explode("&p=", $pageURL);
		return $pageURL[0];
	}

	/* Lấy getCurrentPageURL Cano */
	public function getCurrentPageURL_CANO()
	{
		$pageURL = 'http';
		if (array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $pageURL .= "s";
		$pageURL .= "://";
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		$pageURL = str_replace("amp/", "", $pageURL);
		$urlpos = strpos($pageURL, "?p");
		$pageURL = ($urlpos) ? explode("?p=", $pageURL) : explode("&p=", $pageURL);
		$pageURL = explode("?", $pageURL[0]);
		$pageURL = explode("#", $pageURL[0]);
		$pageURL = explode("index", $pageURL[0]);
		return $pageURL[0];
	}

	/* Copy image */
	public function copyImg($photo = '', $constant = '')
	{
		$str = '';

		if ($photo != '' && $constant != '') {
			$rand = rand(1000, 9999);
			$name = pathinfo($photo, PATHINFO_FILENAME);
			$ext = pathinfo($photo, PATHINFO_EXTENSION);
			$photo_new = $name . '-' . $rand . '.' . $ext;
			$oldpath = '../../upload/' . $constant . '/' . $photo;
			$newpath = '../../upload/' . $constant . '/' . $photo_new;

			if (file_exists($oldpath)) {
				if (copy($oldpath, $newpath)) {
					$str = $photo_new;
				}
			}
		}

		return $str;
	}

	/* Get Img size */
	public function getImgSize($photo = '', $patch = '')
	{
		$x = (file_exists($patch)) ? getimagesize($patch) : null;
		return array("p" => $photo, "w" => $x[0], "h" => $x[1], "m" => $x['mime']);
	}

	/* Upload name */
	public function uploadName($name = '')
	{
		$result = '';

		if ($name != '') {
			$rand = rand(1000, 9999);
			$ten_anh = pathinfo($name, PATHINFO_FILENAME);
			$result = $this->changeTitle($ten_anh) . "-" . $rand;
		}

		return $result;
	}

	/* Resize images */
	public function smartResizeImage($file = '', $string = null, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100, $grayscale = false)
	{
		if ($height <= 0 && $width <= 0) return false;
		if ($file === null && $string === null) return false;
		$info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
		$image = '';
		$final_width = 0;
		$final_height = 0;
		list($width_old, $height_old) = $info;
		$cropHeight = $cropWidth = 0;
		if ($proportional) {
			if ($width == 0) $factor = $height / $height_old;
			elseif ($height == 0) $factor = $width / $width_old;
			else $factor = min($width / $width_old, $height / $height_old);
			$final_width = round($width_old * $factor);
			$final_height = round($height_old * $factor);
		} else {
			$final_width = ($width <= 0) ? $width_old : $width;
			$final_height = ($height <= 0) ? $height_old : $height;
			$widthX = $width_old / $width;
			$heightX = $height_old / $height;
			$x = min($widthX, $heightX);
			$cropWidth = ($width_old - $width * $x) / 2;
			$cropHeight = ($height_old - $height * $x) / 2;
		}
		switch ($info[2]) {
			case IMAGETYPE_JPEG:
				$file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
				break;
			case IMAGETYPE_GIF:
				$file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);
				break;
			case IMAGETYPE_PNG:
				$file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);
				break;
			default:
				return false;
		}
		if ($grayscale) {
			imagefilter($image, IMG_FILTER_GRAYSCALE);
		}
		$image_resized = imagecreatetruecolor($final_width, $final_height);
		if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
			$transparency = imagecolortransparent($image);
			$palletsize = imagecolorstotal($image);
			if ($transparency >= 0 && $transparency < $palletsize) {
				$transparent_color = imagecolorsforindex($image, $transparency);
				$transparency = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagefill($image_resized, 0, 0, $transparency);
				imagecolortransparent($image_resized, $transparency);
			} elseif ($info[2] == IMAGETYPE_PNG) {
				imagealphablending($image_resized, false);
				$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
				imagefill($image_resized, 0, 0, $color);
				imagesavealpha($image_resized, true);
			}
		}
		imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
		if ($delete_original) {
			if ($use_linux_commands) exec('rm ' . $file);
			else @unlink($file);
		}
		switch (strtolower($output)) {
			case 'browser':
				$mime = image_type_to_mime_type($info[2]);
				header("Content-type: $mime");
				$output = NULL;
				break;
			case 'file':
				$output = $file;
				break;
			case 'return':
				return $image_resized;
				break;
			default:
				break;
		}
		switch ($info[2]) {
			case IMAGETYPE_GIF:
				imagegif($image_resized, $output);
				break;
			case IMAGETYPE_JPEG:
				imagejpeg($image_resized, $output, $quality);
				break;
			case IMAGETYPE_PNG:
				$quality = 9 - (int)((0.9 * $quality) / 10.0);
				imagepng($image_resized, $output, $quality);
				break;
			default:
				return false;
		}
		return true;
	}

	/* Cập nhật ngày 18/12/2020*/
	public function fix_orientation($fileandpath)
	{

		// Does the file exist to start with?
		if (!file_exists($fileandpath))
			return false;

		// Get all the exif data from the file
		$exif = read_exif_data($fileandpath, 'IFD0');

		// If we dont get any exif data at all, then we may as well stop now
		if (!$exif || !is_array($exif))
			return false;

		// I hate case juggling, so we're using loweercase throughout just in case
		$exif = array_change_key_case($exif, CASE_LOWER);

		// If theres no orientation key, then we can give up, the camera hasn't told us the 
		// orientation of itself when taking the image, and i'm not writing a script to guess at it!
		if (!array_key_exists('orientation', $exif))
			return false;

		// Gets the GD image resource for loaded image
		$img_res = $this->get_image_resource($fileandpath);

		// If it failed to load a resource, give up
		if (is_null($img_res))
			return false;

		// The meat of the script really, the orientation is supplied as an integer, 
		// so we just rotate/flip it back to the correct orientation based on what we 
		// are told it currently is 
		switch ($exif['orientation']) {

				// Standard/Normal Orientation (no need to do anything, we'll return true as in theory, it was successful)
			case 1:
				return true;
				break;

				// Correct orientation, but flipped on the horizontal axis (might do it at some point in the future)
			case 2:
				$final_img = $this->imageflipz($img_res, IMG_FLIP_HORIZONTAL);
				break;

				// Upside-Down
			case 3:
				$final_img = $this->imageflipz($img_res, IMG_FLIP_VERTICAL);
				break;

				// Upside-Down & Flipped along horizontal axis
			case 4:
				$final_img = $this->imageflipz($img_res, IMG_FLIP_BOTH);
				break;

				// Turned 90 deg to the left and flipped
			case 5:
				$final_img = imagerotate($img_res, -90, 0);
				$final_img = $this->imageflipz($img_res, IMG_FLIP_HORIZONTAL);
				break;

				// Turned 90 deg to the left
			case 6:
				$final_img = imagerotate($img_res, -90, 0);
				break;

				// Turned 90 deg to the right and flipped
			case 7:
				$final_img = imagerotate($img_res, 90, 0);
				$final_img = $this->imageflipz($img_res, IMG_FLIP_HORIZONTAL);
				break;

				// Turned 90 deg to the right
			case 8:
				$final_img = imagerotate($img_res, 90, 0);
				break;
		}

		// If theres no final image resource to output for whatever reason, give up
		if (!isset($final_img))
			return false;

		//-- rename original (very ugly, could probably be rewritten, but i can't be arsed at this stage)
		$parts = explode("/", $fileandpath);
		$oldname = array_pop($parts);
		$path = implode('/', $parts);
		$oldname_parts = explode(".", $oldname);
		$ext = array_pop($oldname_parts);
		$newname = implode('.', $oldname_parts) . '.orig.' . $ext;

		rename($fileandpath, $path . '/' . $newname);

		// Save it and the return the result (true or false)
		$done = $this->save_image_resource($final_img, $fileandpath);

		return $done;
	}

	/**
	 * Simple function which takes the filepath, grabs the extension and returns the GD resource for it
	 * Not fool-proof nor the best, but it does the job for now 
	 */
	public function get_image_resource($file)
	{

		$img = null;
		$p = explode(".", strtolower($file));
		$ext = array_pop($p);
		switch ($ext) {

			case "png":
				$img = imagecreatefrompng($file);
				break;

			case "jpg":
			case "jpeg":
				$img = imagecreatefromjpeg($file);
				break;
			case "gif":
				$img = imagecreatefromgif($file);
				break;
		}

		return $img;
	}

	/**
	 * Saves the final image resource to the given location
	 * As above it works out the extension and bases its output command on that, not fool proof, but works nonetheless
	 */
	public function save_image_resource($resource, $location)
	{

		$success = false;
		$p = explode(".", strtolower($location));
		$ext = array_pop($p);
		switch ($ext) {

			case "png":
				$success = imagepng($resource, $location);
				break;

			case "jpg":
			case "jpeg":
				$success = imagejpeg($resource, $location);
				break;
			case "gif":
				$success = imagegif($resource, $location);
				break;
		}

		return $success;
	}



	public function imageflipz($resource, $mode)
	{

		if ($mode == IMG_FLIP_VERTICAL || $mode == IMG_FLIP_BOTH)
			$resource = imagerotate($resource, 180, 0);

		if ($mode == IMG_FLIP_HORIZONTAL || $mode == IMG_FLIP_BOTH)
			$resource = imagerotate($resource, 90, 0);

		return $resource;
	}

	public function uploadImage($file = '', $extension = '', $folder = '', $newname = '')
	{
		global $config;

		if (isset($_FILES[$file]) && !$_FILES[$file]['error']) {
			$postMaxSize = ini_get('post_max_size');
			$MaxSize = explode('M', $postMaxSize);
			$MaxSize = $MaxSize[0];
			if ($_FILES[$file]['size'] > $MaxSize * 1048576) {
				$this->alert('Dung lÆ°á»£ng file khĂ´ng Ä‘Æ°á»£c vÆ°á»£t quĂ¡ ' . $postMaxSize);
				return false;
			}

			$ext = explode('.', $_FILES[$file]['name']);
			$ext = strtolower($ext[count($ext) - 1]);
			$name = basename($_FILES[$file]['name'], '.' . $ext);

			if (strpos($extension, $ext) === false) {
				$this->alert('Chá»‰ há»— trá»£ upload file dáº¡ng ' . $extension);
				return false;
			}

			if ($newname == '' && file_exists($folder . $_FILES[$file]['name']))
				for ($i = 0; $i < 100; $i++) {
					if (!file_exists($folder . $name . $i . '.' . $ext)) {
						$_FILES[$file]['name'] = $name . $i . '.' . $ext;
						break;
					}
				}
			else {
				$_FILES[$file]['name'] = $newname . '.' . $ext;
			}

			if (!copy($_FILES[$file]["tmp_name"], $folder . $_FILES[$file]['name'])) {
				if (!move_uploaded_file($_FILES[$file]["tmp_name"], $folder . $_FILES[$file]['name'])) {
					return false;
				}
			}

			/* Resize image if width origin > config max width */
			$array = getimagesize($folder . $_FILES[$file]['name']);
			list($image_w, $image_h) = $array;
			$maxWidth = $config['website']['upload']['max-width'];
			$maxHeight = $config['website']['upload']['max-height'];
			//$this->fix_orientation($folder.$_FILES[$file]['name']);
			if ($image_w > $maxWidth) $this->smartResizeImage($folder . $_FILES[$file]['name'], null, $maxWidth, $maxHeight, true);

			return $_FILES[$file]['name'];
		}
		return false;
	}

	/* Delete folder */
	public function removeDir($dirname = '')
	{
		if (is_dir($dirname)) $dir_handle = opendir($dirname);
		if (!isset($dir_handle) || $dir_handle == false) return false;
		while ($file = readdir($dir_handle)) {
			if ($file != "." && $file != "..") {
				if (!is_dir($dirname . "/" . $file)) unlink($dirname . "/" . $file);
				else $this->removeDir($dirname . '/' . $file);
			}
		}
		closedir($dir_handle);
		rmdir($dirname);
		return true;
	}

	/* Remove Sub folder */
	public function RemoveEmptySubFolders($path = '')
	{
		$empty = true;

		foreach (glob($path . DIRECTORY_SEPARATOR . "*") as $file) {
			if (is_dir($file)) {
				if (!$this->RemoveEmptySubFolders($file)) $empty = false;
			} else {
				$empty = false;
			}
		}

		if ($empty) {
			if (is_dir($path)) {
				rmdir($path);
			}
		}

		return $empty;
	}

	/* Remove files from dir in x seconds */
	public function RemoveFilesFromDirInXSeconds($dir = '', $seconds = 3600)
	{
		$files = glob(rtrim($dir, '/') . "/*");
		$now = time();

		if ($files) {
			foreach ($files as $file) {
				if (is_file($file)) {
					if ($now - filemtime($file) >= $seconds) {
						unlink($file);
					}
				} else {
					$this->RemoveFilesFromDirInXSeconds($file, $seconds);
				}
			}
		}
	}

	/* Filter opacity */
	public function filterOpacity($img = '', $opacity = 80)
	{
		return true;
		/*
			if(!isset($opacity) || $img == '') return false;

			$opacity /= 100;
			$w = imagesx($img);
			$h = imagesy($img);
			imagealphablending($img, false);
			$minalpha = 127;

			for($x = 0; $x < $w; $x++)
			{
				for($y = 0; $y < $h; $y++)
				{
					$alpha = (imagecolorat($img, $x, $y) >> 24) & 0xFF;
					if($alpha < $minalpha) $minalpha = $alpha;
				}
			}

			for($x = 0; $x < $w; $x++)
			{
				for($y = 0; $y < $h; $y++)
				{
					$colorxy = imagecolorat($img, $x, $y);
					$alpha = ($colorxy >> 24) & 0xFF;
					if($minalpha !== 127) $alpha = 127 + 127 * $opacity * ($alpha - 127) / (127 - $minalpha);
					else $alpha += 127 * $opacity;
					$alphacolorxy = imagecolorallocatealpha($img, ($colorxy >> 16) & 0xFF, ($colorxy >> 8) & 0xFF, $colorxy & 0xFF, $alpha);
					if(!imagesetpixel($img, $x, $y, $alphacolorxy)) return false;
				}
			}

			return true;
			*/
	}

	/* Upload images */
	/*public function uploadImage($file='', $extension='', $folder='', $newname='')
		{
			global $config;

			if(isset($_FILES[$file]) && !$_FILES[$file]['error'])
			{
				$postMaxSize = ini_get('post_max_size');
				$MaxSize = explode('M', $postMaxSize);
				$MaxSize = $MaxSize[0];
				if($_FILES[$file]['size'] > $MaxSize*1048576)
				{
					$this->alert('Dung lượng file không được vượt quá '.$postMaxSize);
					return false;
				}

				$ext = explode('.', $_FILES[$file]['name']);
				$ext = strtolower($ext[count($ext)-1]);
				$name = basename($_FILES[$file]['name'], '.'.$ext);

				if(strpos($extension, $ext)===false)
				{
					$this->alert('Chỉ hỗ trợ upload file dạng '.$extension);
					return false;
				}

				if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
					for($i=0; $i<100; $i++)
					{
						if(!file_exists($folder.$name.$i.'.'.$ext))
						{
							$_FILES[$file]['name'] = $name.$i.'.'.$ext;
							break;
						}
					}
				else
				{
					$_FILES[$file]['name'] = $newname.'.'.$ext;
				}

				if(!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	
				{
					if(!move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	
					{
						return false;
					}
				}

				/
				$array = getimagesize($folder.$_FILES[$file]['name']);
				list($image_w, $image_h) = $array;
				$maxWidth = $config['website']['upload']['max-width'];
				$maxHeight = $config['website']['upload']['max-height'];
				if($image_w > $maxWidth) $this->smartResizeImage($folder.$_FILES[$file]['name'],null,$maxWidth,$maxHeight,true);

				return $_FILES[$file]['name'];
			}
			return false;
		}*/

	/* Delete folder */
	/*public function removeDir($dirname='')
		{
			if(is_dir($dirname)) $dir_handle = opendir($dirname);
			if(!isset($dir_handle) || $dir_handle == false) return false;
			while($file = readdir($dir_handle))
			{
				if($file != "." && $file != "..")
				{
					if(!is_dir($dirname."/".$file)) unlink($dirname."/".$file);
					else $this->removeDir($dirname.'/'.$file);
				}
			}
			closedir($dir_handle);
			rmdir($dirname);
			return true;
		}*/

	/* Remove Sub folder */
	/*public function RemoveEmptySubFolders($path='')
		{
			$empty = true;

			foreach(glob($path.DIRECTORY_SEPARATOR."*") as $file)
			{
				if(is_dir($file))
				{
					if(!$this->RemoveEmptySubFolders($file)) $empty = false;
				}
				else
				{
					$empty = false;
				}
			}

			if($empty)
			{
				if(is_dir($path))
				{
					rmdir($path);
				}
			}

			return $empty;
		}*/

	/* Remove files from dir in x seconds */
	/*public function RemoveFilesFromDirInXSeconds($dir='', $seconds=3600)
		{
		    $files = glob(rtrim($dir, '/')."/*");
		    $now = time();

		    if($files)
		    {
			    foreach($files as $file)
			    {
			        if(is_file($file))
			        {
			            if($now - filemtime($file) >= $seconds)
			            {
			                unlink($file);
			            }
			        }
			        else
			        {
			            $this->RemoveFilesFromDirInXSeconds($file,$seconds);
			        }
			    }
		    }
		}*/

	/* Filter opacity */
	/*public function filterOpacity($img='', $opacity=80)
		{
			return true;
			
			if(!isset($opacity) || $img == '') return false;

			$opacity /= 100;
			$w = imagesx($img);
			$h = imagesy($img);
			imagealphablending($img, false);
			$minalpha = 127;

			for($x = 0; $x < $w; $x++)
			{
				for($y = 0; $y < $h; $y++)
				{
					$alpha = (imagecolorat($img, $x, $y) >> 24) & 0xFF;
					if($alpha < $minalpha) $minalpha = $alpha;
				}
			}

			for($x = 0; $x < $w; $x++)
			{
				for($y = 0; $y < $h; $y++)
				{
					$colorxy = imagecolorat($img, $x, $y);
					$alpha = ($colorxy >> 24) & 0xFF;
					if($minalpha !== 127) $alpha = 127 + 127 * $opacity * ($alpha - 127) / (127 - $minalpha);
					else $alpha += 127 * $opacity;
					$alphacolorxy = imagecolorallocatealpha($img, ($colorxy >> 16) & 0xFF, ($colorxy >> 8) & 0xFF, $colorxy & 0xFF, $alpha);
					if(!imagesetpixel($img, $x, $y, $alphacolorxy)) return false;
				}
			}

			return true;
			
		}*/

	/* Create thumb */
	public function createThumb($width_thumb = 0, $height_thumb = 0, $zoom_crop = '1', $src = '', $watermark = null, $path = THUMBS, $preview = false, $args = array(), $quality = 100)
	{
		$t = 3600 * 24 * 3;
		$this->RemoveFilesFromDirInXSeconds(UPLOAD_TEMP_L, 1);
		if ($watermark) {
			$this->RemoveFilesFromDirInXSeconds(WATERMARK . '/' . $path . "/", $t);
			$this->RemoveEmptySubFolders(WATERMARK . '/' . $path . "/");
		} else {
			$this->RemoveFilesFromDirInXSeconds($path . "/", $t);
			$this->RemoveEmptySubFolders($path . "/");
		}

		$src = str_replace("%20", " ", $src);
		if (!file_exists($src)) die("NO IMAGE $src");

		$image_url = $src;
		$origin_x = 0;
		$origin_y = 0;
		$new_width = $width_thumb;
		$new_height = $height_thumb;

		if ($new_width < 10 && $new_height < 10) {
			header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
			die("Width and height larger than 10px");
		}
		if ($new_width > 2000 || $new_height > 2000) {
			header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
			die("Width and height less than 2000px");
		}

		$array = getimagesize($image_url);
		if ($array) list($image_w, $image_h) = $array;
		else die("NO IMAGE $image_url");

		$width = $image_w;
		$height = $image_h;

		if ($new_height && !$new_width) $new_width = $width * ($new_height / $height);
		else if ($new_width && !$new_height) $new_height = $height * ($new_width / $width);

		$image_ext = explode('.', $image_url);
		$image_ext = trim(strtolower(end($image_ext)));
		$image_name = explode('/', $image_url);
		$image_name = trim(strtolower(end($image_name)));

		switch (strtoupper($image_ext)) {
			case 'JPG':
			case 'JPEG':
				$image = imagecreatefromjpeg($image_url);
				$func = 'imagejpeg';
				$mime_type = 'jpeg';
				break;

			case 'PNG':
				$image = imagecreatefrompng($image_url);
				$func = 'imagepng';
				$mime_type = 'png';
				break;

			case 'GIF':
				$image = imagecreatefromgif($image_url);
				$func = 'imagegif';
				$mime_type = 'png';
				break;

			default:
				die("UNKNOWN IMAGE TYPE: $image_url");
		}

		if ($zoom_crop == 3) {
			$final_height = $height * ($new_width / $width);
			if ($final_height > $new_height) $new_width = $width * ($new_height / $height);
			else $new_height = $final_height;
		}

		$canvas = imagecreatetruecolor($new_width, $new_height);
		imagealphablending($canvas, false);
		$color = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
		imagefill($canvas, 0, 0, $color);

		if ($zoom_crop == 2) {
			$final_height = $height * ($new_width / $width);
			if ($final_height > $new_height) {
				$origin_x = $new_width / 2;
				$new_width = $width * ($new_height / $height);
				$origin_x = round($origin_x - ($new_width / 2));
			} else {
				$origin_y = $new_height / 2;
				$new_height = $final_height;
				$origin_y = round($origin_y - ($new_height / 2));
			}
		}

		imagesavealpha($canvas, true);

		if ($zoom_crop > 0) {
			$align = '';
			$src_x = $src_y = 0;
			$src_w = $width;
			$src_h = $height;

			$cmp_x = $width / $new_width;
			$cmp_y = $height / $new_height;

			if ($cmp_x > $cmp_y) {
				$src_w = round($width / $cmp_x * $cmp_y);
				$src_x = round(($width - ($width / $cmp_x * $cmp_y)) / 2);
			} else if ($cmp_y > $cmp_x) {
				$src_h = round($height / $cmp_y * $cmp_x);
				$src_y = round(($height - ($height / $cmp_y * $cmp_x)) / 2);
			}

			if ($align) {
				if (strpos($align, 't') !== false) {
					$src_y = 0;
				}
				if (strpos($align, 'b') !== false) {
					$src_y = $height - $src_h;
				}
				if (strpos($align, 'l') !== false) {
					$src_x = 0;
				}
				if (strpos($align, 'r') !== false) {
					$src_x = $width - $src_w;
				}
			}

			imagecopyresampled($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
		} else {
			imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		}

		if ($preview) {
			$watermark = array();
			$watermark['hienthi'] = 1;
			$options = $args;
			$overlay_url = $args['watermark'];
		}

		$upload_dir = '';
		$folder_old = str_replace($image_name, '', $image_url);

		if ($watermark['hienthi']) {
			$upload_dir = WATERMARK . '/' . $path . '/' . $width_thumb . 'x' . $height_thumb . 'x' . $zoom_crop . '/' . $folder_old;
		} else {
			if ($watermark) $upload_dir = WATERMARK . '/' . $path . '/' . $width_thumb . 'x' . $height_thumb . 'x' . $zoom_crop . '/' . $folder_old;
			else $upload_dir = $path . '/' . $width_thumb . 'x' . $height_thumb . 'x' . $zoom_crop . '/' . $folder_old;
		}

		if (!file_exists($upload_dir)) if (!mkdir($upload_dir, 0777, true)) die('Failed to create folders...');

		if ($watermark['hienthi']) {
			$options = (isset($options)) ? $options : json_decode($watermark['options'], true)['watermark'];
			$per_scale = $options['per'];
			$per_small_scale = $options['small_per'];
			$max_width_w = $options['max'];
			$min_width_w = $options['min'];
			$opacity = @$options['opacity'];
			$overlay_url = (isset($overlay_url)) ? $overlay_url : UPLOAD_PHOTO_L . $watermark['photo'];
			$overlay_ext = explode('.', $overlay_url);
			$overlay_ext = trim(strtolower(end($overlay_ext)));

			switch (strtoupper($overlay_ext)) {
				case 'JPG':
				case 'JPEG':
					$overlay_image = imagecreatefromjpeg($overlay_url);
					break;

				case 'PNG':
					$overlay_image = imagecreatefrompng($overlay_url);
					break;

				case 'GIF':
					$overlay_image = imagecreatefromgif($overlay_url);
					break;

				default:
					die("UNKNOWN IMAGE TYPE: $overlay_url");
			}

			$this->filterOpacity($overlay_image, $opacity);
			$overlay_width = imagesx($overlay_image);
			$overlay_height = imagesy($overlay_image);
			$overlay_padding = 5;
			imagealphablending($canvas, true);

			if (min($new_width, $new_height) <= 300) $per_scale = $per_small_scale;

			$oz = max($overlay_width, $overlay_height);

			if ($overlay_width > $overlay_height) {
				$scale = $new_width / $oz;
			} else {
				$scale = $new_height / $oz;
			}

			if ($new_height > $new_width) {
				$scale = $new_height / $oz;
			}

			$new_overlay_width = (floor($overlay_width * $scale) - $overlay_padding * 2) / $per_scale;
			$new_overlay_height = (floor($overlay_height * $scale) - $overlay_padding * 2) / $per_scale;
			$scale_w = $new_overlay_width / $new_overlay_height;
			$scale_h = $new_overlay_height / $new_overlay_width;
			$new_overlay_height = $new_overlay_width / $scale_w;

			if ($new_overlay_height > $new_height) {
				$new_overlay_height = $new_height / $per_scale;
				$new_overlay_width = $new_overlay_height * $scale_w;
			}
			if ($new_overlay_width > $new_width) {
				$new_overlay_width = $new_width / $per_scale;
				$new_overlay_height = $new_overlay_width * $scale_h;
			}
			if (($new_width / $new_overlay_width) < $per_scale) {
				$new_overlay_width = $new_width / $per_scale;
				$new_overlay_height = $new_overlay_width * $scale_h;
			}
			if ($new_height < $new_width && ($new_height / $new_overlay_height) < $per_scale) {
				$new_overlay_height = $new_height / $per_scale;
				$new_overlay_width = $new_overlay_height / $scale_h;
			}
			if ($new_overlay_width > $max_width_w && $new_overlay_width) {
				$new_overlay_width = $max_width_w;
				$new_overlay_height = $new_overlay_width * $scale_h;
			}
			if ($new_overlay_width < $min_width_w && $new_width <= $min_width_w * 3) {
				$new_overlay_width = $min_width_w;
				$new_overlay_height = $new_overlay_width * $scale_h;
			}
			$new_overlay_width = round($new_overlay_width);
			$new_overlay_height = round($new_overlay_height);

			switch ($options['position']) {
				case 1:
					$khoancachx = $overlay_padding;
					$khoancachy = $overlay_padding;
					break;

				case 2:
					$khoancachx = abs($new_width - $new_overlay_width) / 2;
					$khoancachy = $overlay_padding;
					break;

				case 3:
					$khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
					$khoancachy = $overlay_padding;
					break;

				case 4:
					$khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
					$khoancachy = abs($new_height - $new_overlay_height) / 2;
					break;

				case 5:
					$khoancachx = abs($new_width - $new_overlay_width) - $overlay_padding;
					$khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
					break;

				case 6:
					$khoancachx = abs($new_width - $new_overlay_width) / 2;
					$khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
					break;

				case 7:
					$khoancachx = $overlay_padding;
					$khoancachy = abs($new_height - $new_overlay_height) - $overlay_padding;
					break;

				case 8:
					$khoancachx = $overlay_padding;
					$khoancachy = abs($new_height - $new_overlay_height) / 2;
					break;

				case 9:
					$khoancachx = abs($new_width - $new_overlay_width) / 2;
					$khoancachy = abs($new_height - $new_overlay_height) / 2;
					break;

				default:
					$khoancachx = $overlay_padding;
					$khoancachy = $overlay_padding;
					break;
			}

			$overlay_new_image = imagecreatetruecolor($new_overlay_width, $new_overlay_height);
			imagealphablending($overlay_new_image, false);
			imagesavealpha($overlay_new_image, true);
			imagecopyresampled($overlay_new_image, $overlay_image, 0, 0, 0, 0, $new_overlay_width, $new_overlay_height, $overlay_width, $overlay_height);
			imagecopy($canvas, $overlay_new_image, $khoancachx, $khoancachy, 0, 0, $new_overlay_width, $new_overlay_height);
			imagealphablending($canvas, false);
			imagesavealpha($canvas, true);
		}

		if ($preview) {
			$upload_dir = '';
			$this->RemoveEmptySubFolders(WATERMARK . '/' . $path . "/");
		}

		if ($upload_dir) {
			if ($func == 'imagejpeg') $func($canvas, $upload_dir . $image_name, 100);
			else $func($canvas, $upload_dir . $image_name, floor($quality * 0.09));
		}

		header('Content-Type: image/' . $mime_type);
		if ($func == 'imagejpeg') $func($canvas, NULL, 100);
		else $func($canvas, NULL, floor($quality * 0.09));

		imagedestroy($canvas);
	}

	/* String random */
	public function stringRandom($sokytu = 10)
	{
		$str = '';

		if ($sokytu > 0) {
			$chuoi = 'ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789';
			for ($i = 0; $i < $sokytu; $i++) {
				$vitri = mt_rand(0, strlen($chuoi));
				$str = $str . substr($chuoi, $vitri, 1);
			}
		}

		return $str;
	}

	/* Digital random */
	public function digitalRandom($min = 1, $max = 10, $num = 10)
	{
		$result = '';

		if ($num > 0) {
			for ($i = 0; $i < $num; $i++) {
				$result .= rand($min, $max);
			}
		}

		return $result;
	}

	/* Get permission */
	public function get_permission($id_permission = 0)
	{
		$row = $this->d->rawQuery("select * from #_permission_group where hienthi>0 order by stt,id desc");

		$str = '<select id="id_nhomquyen" name="data[id_nhomquyen]" class="form-control select2"><option value="0">Nhóm quyền</option>';
		foreach ($row as $v) {
			if ($v["id"] == (int)@$id_permission) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["ten"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get status order */
	public function orderStatus($status = 0)
	{
		$row = $this->d->rawQuery("select * from #_status order by id");

		$str = '<select id="tinhtrang" name="data[tinhtrang]" class="form-control text-sm"><option value="0">Chọn tình trạng</option>';
		foreach ($row as $v) {
			if (isset($_REQUEST['tinhtrang']) && ($v["id"] == (int)$_REQUEST['tinhtrang']) || ($v["id"] == $status)) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["trangthai"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get payments order */
	function orderPayments()
	{
		$row = $this->d->rawQuery("select * from #_news where type='hinh-thuc-thanh-toan' order by stt,id desc");

		$str = '<select id="httt" name="httt" class="form-control text-sm"><option value="0">Chọn hình thức thanh toán</option>';
		foreach ($row as $v) {
			if (isset($_REQUEST['httt']) && ($v["id"] == (int)$_REQUEST['httt'])) $selected = "selected";
			else $selected = "";
			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["tenvi"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get tags */
	public function get_tags($id = 0, $element = '', $table = '', $type = '')
	{
		if ($id) {
			$temps = $this->d->rawQueryOne("select id_tags from #_" . $table . " where id = ? and type = ? limit 0,1", array($id, $type));
			$arr_tags = explode(',', $temps['id_tags']);

			for ($i = 0; $i < count($arr_tags); $i++) $temp[$i] = $arr_tags[$i];
		}

		$row_tags = $this->d->rawQuery("select tenvi, id from #_tags where type = ? order by stt,id desc", array($type));

		$str = '<select id="' . $element . '" name="' . $element . '[]" class="select multiselect" multiple="multiple" >';
		for ($i = 0; $i < count($row_tags); $i++) {
			if (isset($temp) && count($temp) > 0) {
				if (in_array($row_tags[$i]['id'], $temp)) $selected = 'selected="selected"';
				else $selected = '';
			} else {
				$selected = '';
			}
			$str .= '<option value="' . $row_tags[$i]["id"] . '" ' . $selected . ' /> ' . $row_tags[$i]["tenvi"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get category by ajax */
	public function get_ajax_category($table = '', $level = '', $type = '', $title_select = 'Chọn danh mục', $class_select = 'select-category')
	{
		$where = '';
		$params = array($type);
		$id_parent = 'id_' . $level;
		$data_level = '';
		$data_type = 'data-type="' . $type . '"';
		$data_table = '';
		$data_child = '';

		if ($level == 'list') {
			$data_level = 'data-level="0"';
			$data_table = 'data-table="#_' . $table . '_cat"';
			$data_child = 'data-child="id_cat"';
		} else if ($level == 'cat') {
			$data_level = 'data-level="1"';
			$data_table = 'data-table="#_' . $table . '_item"';
			$data_child = 'data-child="id_item"';

			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);
		} else if ($level == 'item') {
			$data_level = 'data-level="2"';
			$data_table = 'data-table="#_' . $table . '_sub"';
			$data_child = 'data-child="id_sub"';

			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);

			$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
			$where .= ' and id_cat = ?';
			array_push($params, $idcat);
		} else if ($level == 'sub') {
			$data_level = '';
			$data_type = '';
			$class_select = '';

			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);

			$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
			$where .= ' and id_cat = ?';
			array_push($params, $idcat);

			$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;
			$where .= ' and id_item = ?';
			array_push($params, $iditem);
		} else if ($level == 'brand') {
			$data_level = '';
			$data_type = '';
			$class_select = '';
		}

		$rows = $this->d->rawQuery("select tenvi, id from #_" . $table . "_" . $level . " where type = ? " . $where . " order by stt,id desc", $params);

		$str = '<select id="' . $id_parent . '" name="data[' . $id_parent . ']" ' . $data_level . ' ' . $data_type . ' ' . $data_table . ' ' . $data_child . ' class="form-control select2 ' . $class_select . '"><option value="0">' . $title_select . '</option>';
		foreach ($rows as $v) {
			if (isset($_REQUEST[$id_parent]) && ($v["id"] == (int)$_REQUEST[$id_parent])) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["tenvi"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get category by link */
	public function get_link_category($table = '', $level = '', $type = '', $title_select = 'Chọn danh mục')
	{
		$where = '';
		$params = array($type);
		$id_parent = 'id_' . $level;

		if ($level == 'cat') {
			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);
		} else if ($level == 'item') {
			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);

			$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
			$where .= ' and id_cat = ?';
			array_push($params, $idcat);
		} else if ($level == 'sub') {
			$idlist = (isset($_REQUEST['id_list'])) ? htmlspecialchars($_REQUEST['id_list']) : 0;
			$where .= ' and id_list = ?';
			array_push($params, $idlist);

			$idcat = (isset($_REQUEST['id_cat'])) ? htmlspecialchars($_REQUEST['id_cat']) : 0;
			$where .= ' and id_cat = ?';
			array_push($params, $idcat);

			$iditem = (isset($_REQUEST['id_item'])) ? htmlspecialchars($_REQUEST['id_item']) : 0;
			$where .= ' and id_item = ?';
			array_push($params, $iditem);
		}

		$rows = $this->d->rawQuery("select tenvi, id from #_" . $table . "_" . $level . " where type = ? " . $where . " order by stt,id desc", $params);

		$str = '<select id="' . $id_parent . '" name="' . $id_parent . '" onchange="onchange_category($(this))" class="form-control filer-category select2"><option value="0">' . $title_select . '</option>';
		foreach ($rows as $v) {
			if (isset($_REQUEST[$id_parent]) && ($v["id"] == (int)$_REQUEST[$id_parent])) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["tenvi"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get place by ajax */
	public function get_ajax_place($table = '', $title_select = 'Chọn danh mục')
	{
		$where = '';
		$params = array('0');
		$id_parent = 'id_' . $table;
		$data_level = '';
		$data_table = '';
		$data_child = '';

		if ($table == 'city') {
			$data_level = 'data-level="0"';
			$data_table = 'data-table="#_district"';
			$data_child = 'data-child="id_district"';
		} else if ($table == 'district') {
			$data_level = 'data-level="1"';
			$data_table = 'data-table="#_wards"';
			$data_child = 'data-child="id_wards"';

			$idcity = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
			$where .= ' and id_city = ?';
			array_push($params, $idcity);
		} else if ($table == 'wards') {
			$data_level = '';
			$data_table = '';
			$data_child = '';

			$idcity = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
			$where .= ' and id_city = ?';
			array_push($params, $idcity);

			$iddistrict = (isset($_REQUEST['id_district'])) ? htmlspecialchars($_REQUEST['id_district']) : 0;
			$where .= ' and id_district = ?';
			array_push($params, $iddistrict);
		}

		$rows = $this->d->rawQuery("select ten, id from #_" . $table . " where id <> ? " . $where . " order by id asc", $params);

		$str = '<select id="' . $id_parent . '" name="data[' . $id_parent . ']" ' . $data_level . ' ' . $data_table . ' ' . $data_child . ' class="form-control select2 select-place"><option value="0">' . $title_select . '</option>';
		foreach ($rows as $v) {
			if (isset($_REQUEST[$id_parent]) && ($v["id"] == (int)$_REQUEST[$id_parent])) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["ten"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	/* Get place by link */
	public function get_link_place($table = '', $title_select = 'Chọn danh mục')
	{
		$where = '';
		$params = array('0');
		$id_parent = 'id_' . $table;

		if ($table == 'district') {
			$idcity = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
			$where .= ' and id_city = ?';
			array_push($params, $idcity);
		} else if ($table == 'wards') {
			$idcity = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
			$where .= ' and id_city = ?';
			array_push($params, $idcity);

			$iddistrict = (isset($_REQUEST['id_district'])) ? htmlspecialchars($_REQUEST['id_district']) : 0;
			$where .= ' and id_district = ?';
			array_push($params, $iddistrict);
		}

		$rows = $this->d->rawQuery("select ten, id from #_" . $table . " where id <> ? " . $where . " order by id asc", $params);

		$str = '<select id="' . $id_parent . '" name="' . $id_parent . '" onchange="onchange_category($(this))" class="form-control filer-category select2"><option value="0">' . $title_select . '</option>';
		foreach ($rows as $v) {
			if (isset($_REQUEST[$id_parent]) && ($v["id"] == (int)$_REQUEST[$id_parent])) $selected = "selected";
			else $selected = "";

			$str .= '<option value=' . $v["id"] . ' ' . $selected . '>' . $v["ten"] . '</option>';
		}
		$str .= '</select>';

		return $str;
	}

	public function sub_str($chuoi, $gioihan)
	{
		// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
		// thì không thay đổi chuỗi ban đầu
		if (strlen($chuoi) <= $gioihan) {
			return $chuoi;
		} else {
			/*
			so sánh vị trí cắt
			với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
			nếu vị trí khoảng trắng lớn hơn
			thì cắt chuỗi tại vị trí khoảng trắng đó
			*/
			if (strpos($chuoi, " ", $gioihan) > $gioihan) {
				$new_gioihan = strpos($chuoi, " ", $gioihan);
				$new_chuoi = substr($chuoi, 0, $new_gioihan) . "...";
				return $new_chuoi;
			}
			// trường hợp còn lại không ảnh hưởng tới kết quả
			$new_chuoi = substr($chuoi, 0, $gioihan) . "...";
			return $new_chuoi;
		}
	}
}
