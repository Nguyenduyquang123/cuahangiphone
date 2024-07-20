
<div class="container">

		<?php
		
			// Kiểm tra nếu $pro không phải là mảng
			if(!is_array($pro)){
				echo "<h2>"."Sản phẩm không tồn tại"."</h2>";
			} else {
				// Truy cập các phần tử của mảng $pro
				$id = $pro['id'];
				$name = $pro['productname'];
			 	$image = $pro['Image']; 
				$imageArray = explode(" ", $image);
				$price = $pro['price'];
				$discount = $pro['discount'];
				$description = $pro['description'];
				$color = $pro['color'];
				$image_detail = $pro['image_detail'];
				$sl = $pro['soluong'];
							
		?>
		<div class="main">
			
			<div class= "row">
 			  	<div class ="col-5 text-center bg-white" style="margin-top: 15px;">
    			  	<h5><?=$name?> | Chính hãng VN/A </h5>
  				 </div>
			</div>
			<div class= "container-fluid" style="margin-top:20px">
        		 <div class= "row">
            			<div class ="col-sm-4 bg-white">
               				<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
							   
  								<div class="carousel-inner">
     								 <div class="carousel-item active">
     									 <img src="./templates/image/<?=$imageArray[0]?>" class="d-block w-100" alt="..." style="width: 300px; height: 400px;">
      										
    								</div>
    								
  								</div>
							
						</div>	
           			 </div>
          			  <div class ="col-sm-4 bg-white" style="padding-left: 10px;">
              				 <h4 style="color: red; font-family:tahoma ;"><?= $price ?></h4>
              				 <s><?= $discount ?></s>
              				 <div class="btn-toolbar" style="padding-top:15px;">

  								  <button type="button" class="btn btn-light" ><?= $color?></button>
   								  <button type="button" class="btn btn-light"style="margin-left: 15px;"><?= $color?></h6></button>
   								  <button type="button" class="btn btn-light" style="margin-left: 15px;"><?= $color?></button>
								
								</div>
							 
							 <form action="index.php?act=addcart" method="post">
								<br>
								<input type="number" value="1" min=1 max=10 name="sl"><br>
								<input type="hidden" value="<?=$id ?>" name="id" >
								<input type="hidden" value="<?=$name ?>"  name="tensp">
								<input type="hidden" value="<?=$image ?>" name="img">
								<input type="hidden" value="<?= $discount ?>" name="giagiam">
								
								<button type="submit" name="addtocart" class="btn btn-light" style="margin-right : 15px; border-color: coral; margin-top : 45px"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng </button>
							 </form>
							
			

							 

           			 </div>

        		 </div>

      		</div>
         </div>
		 <hr>
         <div class="content" style="margin-top: 50px;">
         		<div class= "container-fluid">
         <div class= "row">
            <div class ="col-sm-8 bg-white">
                <h2>MÔ TẢ SẢN PHẨM</h2>
		
				<br>
				<img src="./templates/image/<?= $image_detail?>" style="width: 100%;">
				<span class="product-details" style=" font-size: 15px;"><?= $description?></span>
				<hr>
				<div class="comment-section">
        <h2>Bình luận sản phẩm</h2>
        <div class="comment-form">
			<form action="" method="post">
				<input type="text" name="content" placeholder="bình luận" required>	
				<button type="submit" name="btncomnent">Gửi bình luận</button>
			</form>
			<?php 
			 if(isset($_POST['btncomnent'])){
				if(!isset($_SESSION['user_id'])){
					header("Location: index.php?act=dangnhap");
				}
				$iduser = $_SESSION['user_id'];
				$idsq = $_GET['id'];
				$conten = $_POST['content'];
				$date = date('Y-m-d');
				global $conn;
				$sql = "INSERT INTO comment(user_id,prd_id,conten,date) VALUES (?, ?, ?, ? ) ";
				$stmt = $conn->prepare($sql);
			
				// Gán giá trị cho các tham số và thực thi truy vấn
				$stmt->execute([$iduser,$idsq,$conten,$date]);
			
				
			}
			
			?>
        </div>
        <div class="comments">
            <hr>
			<?php 
			
			foreach( $cmdt as $item){
				echo '<h5>'.$item['fullname'].'</h5>
			<section>'.$item['conten'].'</section>';
			}
			
			
			?>
            
			
        </div>
    </div>
            </div>
            <div class ="col-sm-3 bg-white">
               <div class="card" style="width: 18rem;">
  				<img src="./templates/image/Anh DHV (1).jpg" class="card-img-top" alt="...">
  					<div class="card-body">
   						<h5 class="card-title">Nguyễn Duy Quang</h5>
    						<p class="card-text">24/04/2003</p>
							<p class="card-text">MSV:215748020110074</p>
							<p class="card-text">VinhUni</p>
							<p class="card-text">Viện kỷ thuật và công nghệ</p>
							<a href="https://www.facebook.com/to.bi.98031506" class="btn btn-primary stretched-link">Nhấn xem thông tin</a>
					</div>
				</div>
            </div>
         </div>
    	</div>
		<?php } ?>
    </div>
	</div>
