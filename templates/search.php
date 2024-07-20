<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./templates/bootstrap/css/bootstrap.css?ver=<?php echo rand(); ?>">
    <link rel="stylesheet" type="text/css" href="./templates/bootstrap/css/menuDoc.css?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" type="text/css" href="./templates/bootstrap/css/bootstrap.min.css?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" href="./templates/bootstrap/js/bootstrap.js?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" href="./templates/bootstrap/js/bootstrap.min.js?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" href="./templates/bootstrap/js/jquery-3.6.0.min.js?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" href="./templates/bootstrap/js/themgiohang.js?ver=<?php echo rand(); ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
	<div class="container">
	
	<div class="container">
	
	</div>
				<div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:40px;">
										<form action="index.php?act=addcart" method="post">
											<div class="item-product text-center" style="margin-top:40px;">
												<div class="image">
													<a href="index.php?act=productdetail&id='.$item['id'].'"><img src="./templates/image/'.$item['Image'].'" style="width: 200px; height:200px;" alt="iphone13"></a>
													<h4>'.$item['productname'].'</h4>
												</div>
												<div class="price-c">
													<p class="price"><s>'.$item['price'].'</s>
														<br><span class="giamoi">'.$item['discount'].'</span>
													</p>
												</div>
													<input type="submit" name="addtocart" value="Mua Hàng" class="btn btn-danger">
												<a href="index.php?act=productdetail&id='.$item['id'].'"><button type="button" class="btn btn-light">Sản phẩm</button></a>
											</div>
											<input type="hidden" name="id" value="'.$item['id'].'">
											<input type="hidden" name="tensp" value="'.$item['productname'].'">
											<input type="hidden" name="img" value="'.$item['Image'].'">    
											<input type="hidden" name="giagiam" value="'.$item['discount'].'">
										</form>
	</div>
 </div>
 <div style="background:#f1f2f6; margin-top: 50px;">
        <center>
        <h3> <strong>Công Ty Cổ Phần TNHH A C E</strong></h3>
        <p> <strong>Địa chỉ:</strong> Phố Cao Đạt, Hai Bà Trưng, Hà Nội </p>
        <p> <strong>Số ĐT:</strong> 0945.199.786</p>
        <p><strong>Mail:</strong> Aceofficial1610@gmail.com</p>
        <p><strong>Mã số doanh nghiệp:</strong> 200219899 do Sở Kế hoạch & Đầu Tư TP Hà Nội
Đầu ngày 17/6/2021 @2021 – Bản quyền thuộc về Công Ty Cổ Phần TNHH <strong>A C E</strong></p>
        
        
        </center>
        </div>


<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery-3.6.0.min.js"></script>

</body>
</html>