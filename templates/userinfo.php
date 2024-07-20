
<div class="container">

        <div class="col-lg-8">
            <?php 
            
            
            
            ?>
            <br>
    <div class="card">
        <div class="card-body">
            <form action="#" method="post">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="fullname">Họ và tên:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="fullname" class="form-control" id="fullname" value=" <?=$oneuser[0]['fullname'];?> " >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="email">E-mail:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="email" value=" <?=$oneuser[0]['email'];?> ">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="phone">Điện thoại:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="tel" name="phone" class="form-control" id="phone" value=" <?=$oneuser[0]['phone'];?> ">
                    </div>
                </div>
                

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="address">Địa chỉ:</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="address" class="form-control" id="address"  value="<?=$oneuser[0]['address']?>"  placeholder="Địa chỉ của bạn" required>
                        <p style="color: red;"><?php if(empty($_SESSION['address'])) echo "Địa chỉ của bạn"; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <button type="submit" name="adduser" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
           
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="mb-3">Tình trạng của dự án</h5>
            <!-- Progress bars go here -->
        </div>
    </div>
</div>



<script type="text/javascript" src="./templates/bootstrap/js/themgiohang.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/jquery-3.6.0.min.js"></script>
</body>
</html>