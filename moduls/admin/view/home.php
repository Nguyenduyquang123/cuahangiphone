<div class="main-content">
                <h3 class="title-page">
                    Dashboards
                </h3>
                <section class="statistics row">
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="products.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng sản phẩm
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$tongsp?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="user.html">
                            <div class="card mb-3 widget-chart">

                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng thành viên
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$tonguser?></span>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <a href="caterogies.html">
                            <div class="card mb-3 widget-chart">
                                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                                    <h5>
                                        Tổng doanh mục
                                    </h5>
                                </div>
                                <span class="widget-numbers"><?=$tongctg?></span>
                            </div>
                        </a>
                    </div>
                    
                </section>
                <section class="row">
                    <div class="col-sm-12 col-md-6 col xl-6">
                        <div class="card chart">
                            <form action="index.php" method="post">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="start_date" placeholder="Username"
                                        aria-label="Username">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" name="end_date" placeholder="Server" aria-label="Server">
                                    <button type="submit" name="xem" class="btn btn-primary">Xem</button>
                                </div>
                            </form>
                            <p>Tổng doanh thu: <span><?php if(isset($showosumorder)){echo  $showosumorder.'0.000đ';}?></span></p>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Doanh thu</th>
                                </thead>
                                <tbody>
                                <?php 
                               
                              
                                    $i = 0;
                                    if(isset($showorder)){
                                        foreach($showorder as $item1){
                                            $i++;
                                            echo ' <tr>
                                            <td>'.$i.'</td>
                                            <td>'.$item1['madh'].'</td>
                                            <td>'.$item1['tongtien'].'</td>
                                        </tr>';
                                            
                                        }

                                    }
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card chart">
                            <h4>Đơn hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>Mã đơn hàng</th>
                                    <th>Trạng thái</th>
                                </thead>
                                <tbody>
                                <?php 
                                  
                                    foreach($neworder as $item){
                                       
                                        echo ' <tr>
                                        <td>'.$item['madh'].'</td>
                                        <td>'.$item['trangthai'].'</td>
                                    </tr>';
                                    }
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-3">
                        <div class="card chart">
                            <h4>Khách hàng mới</h4>
                            <table class="revenue table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Username</th>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 0;
                                    foreach($newuser as $item){
                                        $i++;
                                        echo ' <tr>
                                        <td>'.$i.'</td>
                                        <td>'.$item['fullname'].'</td>
                                    </tr>';
                                    }
                                    
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
    </script>