
            <div class="main-content">
                <h3 class="title-page">
                   Hàng tồn
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="index.php?pg=addProduct" class="btn btn-primary mb-2">Thêm sản phẩm</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Image_detail</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <?php 
                        $i=0;
                        foreach($ht as $items){
                            $i++;
                            if($items['soluong']==0){
                                $delete = Delete('colorsp',$items['id_prdetail']);
                            }
                            echo ' <tr>
                            <td>'.$i.'</td>
                            <td>  <img  src="/cuahangiphone/templates/image/'.$items['Image'].'" alt=""style=" width: 60px;" ></td>
                            <td>'.$items['productname'].'</td>
                            <td>'.$items['color'].'</td>
                            <td>'.$items['price'].'</td>
                            <td>'.$items['discount'].'</td>
                            <td> <img  src="/cuahangiphone/templates/image/'.$items['image_detail'].'" alt=""style=" max-width: 60px; height: auto;" ></td>
                            <td>'.$items['soluong'].'</td>
                            
                        </tr>';
                        }
                        
                        ?>
                       
                       
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Description</th>
                            <th>Image_detail</th>
                            <th>Quantity</th>
                        </tr>
                    </tfoot>
                </table>
                <nav aria-label="Page navigation example" style="margin-top:20px">
								<ul class="pagination justify-content-center">
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									</li>
									<li class="page-item"><a class="page-link" href="index.php?pg=products&startRow=0">1</a></li>
									<li class="page-item"><a class="page-link" href="index.php?pg=products&startRow=8">2</a></li>
									<li class="page-item"><a class="page-link" href="index.php?pg=products&startRow=16">3</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?pg=products&startRow=24">4</a></li>
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
									</li>
								</ul>
								</nav>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>
