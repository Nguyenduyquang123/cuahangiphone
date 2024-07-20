<div class="main-content">
                <h3 class="title-page">
                    Thêm thành viên
                </h3>
          
                <form class="addPro" action="index.php?pg=adduser" method="post"  enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">Họ tên</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Username" required>
                        <!-- <p style="color: green;"><?=  $thanhcong  ?></p>
                         <p style="color: red;"><?= $err ?></p> -->
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <p style="color: red;"><?= isset($errors['fullnameErr']) ? $errors['fullnameErr'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="name">Điện thoại</label></label>
                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
                        <p style="color: red;"><?= isset($errors['emailErr']) ? $errors['emailErr'] : '' ?></p>
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ</label></label>
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                        <p style="color: red;"><?= isset($errors['phoneErr']) ? $errors['phoneErr'] : '' ?></p>

                    </div>
                    <div class="form-group">
                        <label for="name">Mật khẩu</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" required>
                        <p style="color: red;"><?= isset($errors['passwordErr']) ? $errors['passwordErr'] : '' ?></p>

                    </div>
                                  
                    <div class="form-group">
                        <button type="submit" name="btnadd" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
             
</div>