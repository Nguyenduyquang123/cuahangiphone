<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TỒ-STORE</title>
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
	<?php 
	if(!defined('_CODE')){
		die('Access denied...');
	   
	}  
	
	
    ?>
	<?php
	
	?> 
</head>
<body>
	<div class="container">
	<div class="banner">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
 				 <div class="container-fluid">
   					 <a class="navbar-brand" href="index.php">
     					<span class="logoquang">TỒ-STORE</span>
   					 </a>
   					 <div class="collapse navbar-collapse" id="navbarSupportedContent">
     					 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
						  	<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="index.php?act=home" style="padding-left: 25px; padding-right: 25px;"><strong>Cửa Hàng</strong></a>
								</li>
									
								
								<?php 
								foreach($dasm as $dm){
									echo '<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="index.php?act=sanpham&id='.$dm['id'].'" style="padding-left: 25px; padding-right: 25px;"><strong>'.$dm['name'].'</strong></a>
										</li>';
								}
							
							?>
								
    				 	 </ul>
     					 <form class="d-flex" action="index.php?act=sanpham" method="post">
       						 <input class="form-control me-2" name="namesearch" type="search" placeholder="Tìm kiếm theo tên" aria-label="Search" style="width: 250px;">
       						 <button class="btn btn-outline-success" name="btnsearch" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      					</form>
						  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
							  
							  <li class="nav-item header__navbar-item header__navbar-user">
								<?php 
									if(isset($_SESSION['fullname']) &&($_SESSION['fullname']!= "" ) ){
										echo ' <a class="nav-link active " aria-current="page" href="" style="padding-left: 25px; padding-right: 25px;"><span><i style="font-size: 20px;" class="fa-solid fa-user "></i></span ><strong class="header__navbar-user-name">'.$_SESSION['fullname'].'</strong>
										</a><ul class="header__navbar-user-menu">
										<li class="header__navbar-user-item">
											<a href="index.php?act=userinfo">Tài khoản của tôi</a>
										</li>
										<li class="header__navbar-user-item">
											<a href="index.php?act=donhangcuaban">Đơn mua</a>
										</li>

										<li class="header__navbar-user-item border-top">
											<a href="index.php?act=thoat" >Đăng xuất</a>
										</li>
									</ul>
										';
									}else{

									
								?>
								  <a class="nav-link active" aria-current="page" href="index.php?act=dangnhap" style="padding-left: 25px; padding-right: 25px;"><strong> <span><i style="font-size: 20px;" class="fa-solid fa-user "></i></span>Tài khoản</strong></a>
								  <?php } ?>
							  </li>
							  <li class="nav-item">
								<a class="nav-link active" aria-current="page" href="index.php?act=addcart" style="padding-left: 15px; padding-right: 15px;"><strong><i style="font-size: 20px; position: relative" class="fa-solid fa-cart-shopping"></i><span class="header_cart-notice" ><?php if(isset($_SESSION['soluong'])){echo $_SESSION['soluong'];}else echo '0'; ?></span></strong></a>
							  </li>
						</ul>
   					 </div>
 				 </div>
			</nav>
		</div>
	
	</div>