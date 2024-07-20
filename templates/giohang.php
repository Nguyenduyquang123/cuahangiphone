
<div class="container">

		

<section class="h-100 h-custom" style="background-color: white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Giỏ Hàng</h1>
                  
                    </div>
                    <hr class="my-4">
                    <?php  
                    $i = 0;
                    $tt=0;
                    $sl=0;
                    $_SESSION['soluong'] = 0;
                    if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                     // echo var_dump($_SESSION['giohang']);
                     
                      foreach($_SESSION['giohang'] as $item){
                        $tt += floatval($item[3]) * floatval($item[4]);
                        $sl += $item['4'];
                        $_SESSION['soluong'] =$sl;
                        
                      
                  ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <h5 class="col-md-1 col-lg-1 col-xl-1"> <?=($i+1)?> </h5>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="./templates/image/<?=$item['2'] ?>"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?=$item['1'] ?></h6>
                      <h6 class="text-black mb-0">Màu đỏ</h6>
                    </div>
                   
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <input type="text" style="width:40px;"  value="<?=$item['4']?>" disabled>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?=$item['3'] ?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="index.php?act=delcart&i=<?=$i?>" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>
                   
                   <?php $i++;  }  }?>
                   <div class="d-flex justify-content-between mb-5" style=" margin-left: 579px">
                    <h6 class="text-uppercase">Tổng:  <?=$tt?>0.000 đ</h6>
                    <h6></h6>
                  </div>
                   
                   <hr class="my-4">
                   <a href="index.php?act=delcart">Xóa giỏ hàng</a>

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="index.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Trở lại cửa hàng</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                <form action="index.php?act=thanhtoan" method="post">
                  
                  
                  
                  
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm lược</h3>
                  <hr class="my-4">
                  <h4>Thông tin đặt hàng</h4>
                  <input type="hidden" name="tongdonhang" value="<?=$sl?>">
                  <table>
                    <?php
                    if(isset($_SESSION['user_id']) &&($_SESSION['user_id']!= "" ) ){
                        echo '<tr>
                        <td><input type="text" name="hoten" placeholder="Nhập họ tên" value="'.$_SESSION['fullname'].'"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="diachi" placeholder="Nhập địa chỉ" value="'.$_SESSION['address'].'"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="Nhập Email"value="'.$_SESSION['user_email'].'"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="sodienthoai" placeholder="Nhập số điện thoại"value="'.$_SESSION['phone'].'"></td>
                    </tr>';
                    }else{

                    ?>  
                    
                      <tr>
                          <td><input type="text" name="hoten" placeholder="Nhập họ tên" va></td>
                      </tr>
                      <tr>
                          <td><input type="text" name="diachi" placeholder="Nhập địa chỉ"></td>
                      </tr>
                      <tr>
                          <td><input type="text" name="email" placeholder="Nhập Email"></td>
                      </tr>
                      <tr>
                          <td><input type="text" name="sodienthoai" placeholder="Nhập số điện thoại"></td>
                      </tr>
                      <tr><td>Phương thức thanh toán</td></tr>
                      <tr>
                      <?php } ?>
                          <td>
                              <input type="radio" name="pttt" value="1">Thanh toán khi nhận hàng <br>
                              <input type="radio" name="pttt" value="2">Thanh toán chuyển khoản <br>
                              
                          </td>
                      </tr>
                    
                  </table>
                  <hr class="my-4">
                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase"><?= $sl ?> sản phẩm</h5>
                      
                    </div>
                    
                    <!-- 
                  <h5 class="text-uppercase mb-3">Mã giảm giá</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Nhập mã giảm giá của bạn</label>
                    </div>
                  </div> -->
                  
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Tổng tiền</h5>
                    <h6><input type="text" name="tongtien"  value="<?=$tt?>0.000 đ" ></h6>
                  </div>
                  
                  <input type="submit" name="thanhtoan" class="btn btn-primary" id="liveToastBtn" value="Đặt hàng">
                </form>

                


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript" src="./templates/bootstrap/js/themgiohang.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/jquery-3.6.0.min.js"></script>
</body>
</html>