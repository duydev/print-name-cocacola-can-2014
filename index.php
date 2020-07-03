<?php 
	if(isset($_POST['submit'])){
		$ten = isset($_POST['ten'])?$_POST['ten']:"";
		$url = "http://yourdomain/hinhanh.php?s=".$ten;
	} else {
		$url = "http://yourdomain/hinhanh.php?s=Tên Của Bạn";
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>In tên lên lon Coca Cola - Miễn phí (free)</title>
		<link href="./style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div><h1>In tên lên lon Coca Cola - Miễn phí (free)</h1></div>
		<div id="content">
			<form action="#" method="POST">
			Nhập tên cần in:
				<input type="text" id="ten" name="ten" placeholder="Nhập tên ở đây...">
				<input type="submit" name="submit" value="In Tên">
			</form>
			<div>
			<p>
			Hướng dẫn: <br>
			Sau khi điền tên của bạn và nhấn nút "In Tên", các bạn vui lòng chờ chút xíu cho trang load ảnh. <br>
			Để tải về các bạn nhấn chuột phải vào ảnh rồi chọn "Save picture as" (IE) hoặc "Lưu ảnh dưới dạng" (Firefox) hoặc "Lưu hình ảnh thành" (Chrome) tùy theo trình duyệt mà bạn đang xài.
			</p>
			</div>
			<div id="xemtruoc"><img id="anh" src="<?php echo $url; ?>" width="650px">
			</div>
		</div>
		<div id="footer">&copy 2014 - <a href="https://facebook.com/Trannhatduy">Trần Nhật Duy</a> (HUTECH).
		</div>
		
	</body>
</html>
