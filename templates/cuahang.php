
	<div class="container">
	
        
        <div class="main" style="margin-top: 40px;">
		<div class= "container-fluid">
		 <div class= "row">
		<?php 
		if(isset($_POST['btnsearch']))
		 echo '
		  <h1 class="shopee-search-result-header"><div aria-hidden="true" bis_skin_checked="1"><svg viewBox="0 0 18 24" class="shopee-svg-icon icon-hint-bulb">
			  <g transform="translate(-355 -149)"><g transform="translate(355 149)">
				  <g fill-rule="nonzero" transform="translate(5.4 19.155556)">
					  <path d="m1.08489412 1.77777778h5.1879153c.51164401 0 .92641344-.39796911.92641344-.88888889s-.41476943-.88888889-.92641344-.88888889h-5.1879153c-.51164402 0-.92641345.39796911-.92641345.88888889s.41476943.88888889.92641345.88888889z"></path>
				  <g transform="translate(1.9 2.666667)">
					  <path d="m .75 1.77777778h2.1c.41421356 0 .75-.39796911.75-.88888889s-.33578644-.88888889-.75-.88888889h-2.1c-.41421356 0-.75.39796911-.75.88888889s.33578644.88888889.75.88888889z"></path>
				  </g>
			  </g>
			  <path d="m8.1 8.77777718v4.66666782c0 .4295545.40294373.7777772.9.7777772s.9-.3482227.9-.7777772v-4.66666782c0-.42955447-.40294373-.77777718-.9-.77777718s-.9.34822271-.9.77777718z" fill-rule="nonzero"></path>
			  <path d="m8.1 5.33333333v.88889432c0 .49091978.40294373.88888889.9.88888889s.9-.39796911.9-.88888889v-.88889432c0-.49091977-.40294373-.88888889-.9-.88888889s-.9.39796912-.9.88888889z" fill-rule="nonzero"></path>
			  <path d="m8.80092773 0c-4.86181776 0-8.80092773 3.97866667-8.80092773 8.88888889 0 1.69422221.47617651 3.26933331 1.295126 4.61333331l2.50316913 3.9768889c.30201078.4782222.84303623.7697778 1.42482388.7697778h7.17785139c.7077799 0 1.3618277-.368 1.7027479-.9617778l2.3252977-4.0213333c.7411308-1.2888889 1.1728395-2.7786667 1.1728395-4.37688891 0-4.91022222-3.9409628-8.88888889-8.80092777-8.88888889m0 1.77777778c3.82979317 0 6.94810087 3.18933333 6.94810087 7.11111111 0 1.24444441-.3168334 2.43022221-.9393833 3.51466671l-2.3252977 4.0213333c-.0166754.0284444-.0481735.0462222-.0833772.0462222h-7.07224026l-2.43461454-3.8648889c-.68184029-1.12-1.04128871-2.4053333-1.04128871-3.71733331 0-3.92177778 3.11645483-7.11111111 6.94810084-7.11111111"></path>
		  </g>
	  </g>
  </svg>
</div>
<span class="shopee-search-result-header__text">Kết quả tìm kiếm cho từ khoá "<span class="shopee-search-result-header__text-highlight" style="color: rgb(238, 77, 45); font-weight: 400;">'.$namesearch.'</span>"</span></h1>';
		?>
      		
   					 <div class="box-title_title bg-light text-center" >
   					 	<h2><strong><?php if(isset($_GET['id'])) {
																																	$id = $_GET['id'];
																																	if($id == 1) {
																																		echo 'Iphone';
																																	} elseif($id == 2) {
																																		echo 'MacBook';
																																	} elseif($id == 3) {
																																		echo 'Ipad';
																																	} elseif($id == 4) {
																																		echo 'Apple Watch';
																																	} else {
																																		echo 'Unknown Product';
																																	}
																																} else {
																																	echo 'Sản phẩm';
																																}
																																							?></strong></h2>
																																					</div>
																																						
						<?php 
						if(isset($_GET['id'])){
							foreach($dssp_dm as $dmsp){
								echo 
								'<div class ="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:40px;">
								<form action="index.php?act=addcart" method="post">
										<div class="item-product text-center" style="margin-top:40px;">
												<div class="image">
													<a href="index.php?act=productdetail&id='.$dmsp['id'].'"><img src="./templates/image/'.$dmsp['Image'].'" style="width: 200px; height:200px;" alt="iphone13"></a>
													<h4>'.$dmsp['productname'].'</h4>
												</div>
												<div class="price-c">
													<p class="price"><s>'.$dmsp['price'].'</s>
														<br><span class="giamoi">'.$dmsp['discount'].'</span>
													</p>
												</div>
												<input type="submit" name="addtocart" value="Mua Hàng" class="btn btn-danger">
												<a href="index.php?act=productdetail&id='.$dmsp['id'].'"><button type="button" class="btn btn-light">Sản phẩm</button></a>
										</div>
										<input type="hidden" name="id" value="'.$dmsp['id'].'">
										<input type="hidden" name="tensp" value="'.$dmsp['productname'].'">
										<input type="hidden" name="img" value="'.$dmsp['Image'].'">    
										<input type="hidden" name="giagiam" value="'.$dmsp['discount'].'">
									</form>
									</div>';
	
							}
						}else{
						
							foreach($iphone as $sp1){
								echo   '<div class ="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:40px;">
								<form action="index.php?act=addcart" method="post">
										<div class="item-product text-center" style="margin-top:40px;">
												<div class="image">
													<a href="index.php?act=productdetail&id='.$sp1['id'].'"><img src="./templates/image/'.$sp1['Image'].'" style="width: 200px; height:200px;" alt="iphone13"></a>
													<h4>'.$sp1['productname'].'</h4>
												</div>
												<div class="price-c">
													<p class="price"><s>'.$sp1['price'].'</s>
														<br><span class="giamoi">'.$sp1['discount'].'</span>
													</p>
												</div>
												<input type="submit" name="addtocart" value="Mua Hàng" class="btn btn-danger">
												<a href="index.php?act=productdetail&id='.$sp1['id'].'"><button type="button" class="btn btn-light">Sản phẩm</button></a>
										</div>
										<input type="hidden" name="id" value="'.$sp1['id'].'">
										<input type="hidden" name="tensp" value="'.$sp1['productname'].'">
										<input type="hidden" name="img" value="'.$sp1['Image'].'">    
										<input type="hidden" name="giagiam" value="'.$sp1['discount'].'">
									</form>
									</div>';
							}
						}
						
						?>


    					 
     					 <!--  -->
    				</div>
    						<nav aria-label="Page navigation example" style="margin-top:20px">
								<ul class="pagination justify-content-center">
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
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
   					 
					
     					 
    				</div>
				
      	</div>
		
</div>



	