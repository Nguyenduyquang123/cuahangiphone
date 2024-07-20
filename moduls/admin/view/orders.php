
            <div class="main-content">
                <h3 class="title-page">
                    Quản lí chi tiết đơn hàng
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <th>STT</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên người đặt hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Pttt</th>
                            <th>Trạng thái</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                      
                        <?php 
                              $i= 0;
                            foreach($alldh1 as $item){
                                $i++;
                                echo '  <tr>
                                <td>'.$i.'</td>
                                 <td>'.$item['madh'].'</td>
                                <td>'.$item['fullname'].'</td>
                                <td>'.$item['phone'].'</td>
                                <td>'.$item['address'].'</td>
                                <td>'.$item['order_date'].'</td>
                                <td>'.$item['pttt'].'</td>
                                <td>'.$item['trangthai'].'</td>
                           
                                
                                <td style="width: 200px ">
                                <a href="index.php?pg=orderdetail&id='.$item['id'].'" class="btn btn-warning"> Xem</a>
                                    <a href="index.php?pg=orders_delete&id='.$alldh1[0]['id'].'&iddh='.$alldh1[0]['id'].'" class="btn btn-danger"></i> xóa </a>
                                </td> </tr>';
                            }
                            
                            
                            ?>
                           
                        
                     
                    </tbody>
                   
                </table>
                <nav aria-label="Page navigation example" style="margin-top:20px">
								<ul class="pagination justify-content-center">
									<li class="page-item">
									<a class="page-link" href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
									</li>
									<li class="page-item"><a class="page-link" href="index.php?pg=orders&startRow=0">1</a></li>
									<li class="page-item"><a class="page-link" href="index.php?pg=orders&startRow=8">2</a></li>
									<li class="page-item"><a class="page-link" href="index.php?pg=orders&startRow=16">3</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?pg=orders&startRow=24">4</a></li>
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
