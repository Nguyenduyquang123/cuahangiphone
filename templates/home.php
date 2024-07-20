
	<div class="container">
	<div class= "container-fluid">
        		 <div class= "row">
            		<div class ="col-2 primary">
             			 <div id="menu">
                         <ul>
						 <?php 
								foreach($dasm1 as $dm1){
									echo '<li class="nav-item">
											<a class="nav-link active" aria-current="page" href="index.php?act='.$dm1['link'].'" style="padding-left: 25px; padding-right: 25px;"><strong>'.$dm1['name'].'</strong></a>
										</li>';
								}
							
							?>
                         </ul>
                         </div>
           			 </div>
            		<div class ="col-7 bg-white" style="height: 400px;">
               			<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  							<div class="carousel-indicators">
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
   								 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
   								  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
 							 </div>
  							<div class="carousel-inner">
    							<div class="carousel-item active">
      								<img src="./templates/image/slide1.png" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
    							<div class="carousel-item" >
     						 		<img src="./templates/image/slide2.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
    							</div>
   								 <div class="carousel-item">
     								 <img src="./templates/image/slide3.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
   								 <div class="carousel-item">
     								 <img src="./templates/image/slide4.jpg" class="d-block w-100" alt="..."  style="width: 732px; height: 400px;">
   								 </div>
 							 </div>
 							 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
   							 	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   								 <span class="visually-hidden">Previous</span>
 							 </button>
 							 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
   								 <span class="carousel-control-next-icon" aria-hidden="true"></span>
  								  <span class="visually-hidden">Next</span>
  							</button>
			       		</div>
			       	</div>
           			 <div class ="col-3 bg-white">
              			 <img src="./templates/image/qc1.jpg" style="height: 120px; width: 310px;">
              			  <img src="./templates/image/qc2.jpg" style="height:120px; width: 310px; margin-top: 20px;">
              			  <img src="./templates/image/qc3.jpg" style="height:120px; width: 310px; margin-top: 20px;">
           			 </div>
         		</div>
      	</div>
        <div class="banner">
      		<img src="./templates/image/banner1.webp" alt="" style="width: 1294px; margin-top:20px;">
      	</div>
      	<div class="main" style="margin-top: 40px;">
      		<div class= "container-fluid">
   				<div class= "row">
   					 <div class="box-title_title bg-light text-center" >
   					 	<h2><img src="./templates/image/logo2.png" style="height:30px;"><strong>Sản phẩm mới</strong></h2>
   					 </div>
					 <?php
					 	
						 foreach ($sp1 as $item) {
							echo '<div class="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:40px;">
									<form action="index.php?act=addcart" method="post">
										<div class="item-product text-center" style="margin-top:40px;">
											<div class="image">
												<a href="index.php?act=productdetail&id='.$item['id'].'"><img src="./templates/image/'.$item['Image'].'" style="width: 200px; height:200px;" ></a>
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
								  </div>';
						}
						

					 ?>
     					<br>
						<br>
						<br>
						<br>
     					 
    				</div>
    						<nav aria-label="Page navigation example" style="margin-top:20px">
								<ul class="pagination justify-content-center">
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									</li>
									<li class="page-item"><a class="page-link" href="index.php?startRow=0">1</a></li>
									<li class="page-item"><a class="page-link" href="index.php?startRow=8">2</a></li>
									<li class="page-item"><a class="page-link" href="index.php?startRow=16">3</a></li>
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
									</li>
								</ul>
								</nav>
					
      	</div>
      	<div class= "container-fluid">
   				<div class= "row">
				   <div class="box-title_title bg-light text-center" >
   					 	<h2><img src="./templates/image/logo2.png" style="height:30px;"><strong>Sản phẩm phố biển</strong></h2>
   					 </div>
     					

    					
						<?php
     					 foreach($sp2 as $item2){
							echo '<div class ="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:40px;">
								<form action="index.php?act=addcart" method="post">
										<div class="item-product text-center" style="margin-top:40px;">
												<div class="image">
													<a href="index.php?act=productdetail&id='.$item2['id'].'"><img src="./templates/image/'.$item2['Image'].'" style="width: 200px; height:200px;" alt="iphone13"></a>
													<h4>'.$item2['productname'].'</h4>
												</div>
												<div class="price-c">
													<p class="price"><s>'.$item2['price'].'</s>
														<br><span class="giamoi">'.$item2['discount'].'</span>
													</p>
												</div>
												<input type="submit" name="addtocart" value="Mua Hàng" class="btn btn-danger">
												<a href="index.php?act=productdetail&id='.$item2['id'].'"><button type="button" class="btn btn-light">Sản phẩm</button></a>
										</div>
										<input type="hidden" name="id" value="'.$item2['id'].'">
										<input type="hidden" name="tensp" value="'.$item2['productname'].'">
										<input type="hidden" name="img" value="'.$item2['Image'].'">    
										<input type="hidden" name="giagiam" value="'.$item2['discount'].'">
									</form>
									</div>';
						}
						?>
    					  
    				</div>
    						<nav aria-label="Page navigation example" style="margin-top:20px">
								<ul class="pagination justify-content-center">
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									</li>
									<li class="page-item"><a class="page-link" href="index.php?startRow1=0">1</a></li>
									<li class="page-item"><a class="page-link" href="index.php?startRow1=8">2</a></li>
									<li class="page-item"><a class="page-link" href="index.php?startRow1=16">3</a></li>
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
									</li>
								</ul>
							</nav>
					
      	</div>
</div>



