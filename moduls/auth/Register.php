<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/cuahangiphone/templates/bootstrap/css/style.css?ver=<?php echo rand(); ?>">
<?php

// Khai báo biến để lưu thông báo lỗi
$passwordErr = "";
$phoneErr ="";
$fullnameErr ="";
$emailErr ="";

// // Xử lý khi biểu mẫu được gửi đi
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $password = $_POST['password'];
//     $password_confirm = $_POST['password_confirm'];

//     // Kiểm tra xem mật khẩu và mật khẩu xác nhận có giống nhau không
//     if ($password !== $password_confirm) {
//         $passwordErr = "Mật khẩu xác nhận không khớp!";
//     }
//     $phone = $_POST['phone'];
//     if(strlen($phone)  < 10){
//         $phoneErr = "Số điện thoại ko hợp lệ";
//     }
//     $fullname = $_POST['fullname'];
//     if(strlen($fullname)  < 20){
//         $fullnameErr = "Tên của bạn phải hơn 16 kỹ tự";
//     }
//     // $email = $_POST['email'];
//     // $sql = "SELECT id FROM users WHERE email = :email";
//     // $stmt = $conn->prepare($sql);
//     // $stmt->bindParam(':email', $email);
//     // $stmt->execute();
    
//     // if ($stmt->rowCount() > 0) {
//     //     $emailErr = 'Email đã tồn tại';
//     // }
    
    
// }
$thanhcong ="";
$err ="";
global $conn;
$errors = array();
// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Kiểm tra dữ liệu đã nhập
    $errors = array();
   
    if (strlen($fullname) < 16) {
        $errors['fullnameErr'] = "Tên phải có ít nhất 16 ký tự";
    }
    
    if (empty($email)) {
        $errors['emailErr'] = 'Email không được để trống';
    } else {
        // Kiểm tra xem email đã tồn tại trong CSDL hay không
        
        $sql = "SELECT id FROM user WHERE email = '$email'";
        if (getRows($sql) > 0) {
            $errors['emailErr'] = 'Email đã tồn tại';
        }
    }
    
    if (strlen($phone) < 10) {
        $errors['phoneErr'] = "Số điện thoại không đúng";
    }
    
    if (strlen($password) < 8) {
        $errors['passwordErr'] = "Mật khẩu phải có ít nhất 8 ký tự";
    } elseif ($password != $password_confirm) {
        $errors['passwordErr'] = "Mật khẩu không khớp";
    }
    

    // Nếu không có lỗi, thực hiện chèn vào CSDL
    if (empty($errors)) {
        try {
            // Tạo kết nối PDO
            
            // Thiết lập chế độ lỗi PDO thành ngoại lệ
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL để chèn dữ liệu
            $sql = "INSERT INTO user (fullname, email, phone, password,role) VALUES (:fullname, :email, :phone, :password,1)";

            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);

            // Bind các tham số
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $password);

            // Thực thi câu lệnh
            $stmt->execute();

            $thanhcong = "Đăng ký thành công";
        } catch(PDOException $e) {
            $err = "Lỗi: " . $e->getMessage();
        }

        // Đóng kết nối
        $conn = null;
    }
}


?>






<title>Rigister Form</title>




</head>
<body>
    <div class="login-container">
        <h2>Đăng ký</h2>
        <form action="index.php?act=dangky" method="post">
        <p style="color: green;"><?=  $thanhcong  ?></p>
        <p style="color: red;"><?= $err ?></p>
        <input type="text" name="fullname" placeholder="Username" required>
        <p style="color: red;"><?= isset($errors['fullnameErr']) ? $errors['fullnameErr'] : '' ?></p>
        <input type="email" name="email" placeholder="Email" required>
        <p style="color: red;"><?= isset($errors['emailErr']) ? $errors['emailErr'] : '' ?></p>
        <input type="text" name="phone" placeholder="Số điện thoại" required>
        <p style="color: red;"><?= isset($errors['phoneErr']) ? $errors['phoneErr'] : '' ?></p>
        <input type="password" name="password" placeholder="Password" required>
        <p style="color: red;"><?= isset($errors['passwordErr']) ? $errors['passwordErr'] : '' ?></p>
        <input type="password" name="password_confirm" placeholder="Nhập lại Password" required>
        <p style="color: red;"><?= isset($errors['passwordErr']) ? $errors['passwordErr'] : '' ?></p>

        <input type="submit" value="Đăng ký"  >
        </form>
        <div class="links">
            <a href="index.php?act=dangnhap">Đăng Nhập</a>
        </div>
    </div>
</body>
</html>
