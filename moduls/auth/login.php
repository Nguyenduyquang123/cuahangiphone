<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/cuahangiphone/templates/bootstrap/css/style.css?ver=<?php echo rand(); ?>">


<title>Login Form</title>

</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <form action="index.php?act=dangnhap" method="post">
            <p style="color: red;"><?= $error_message?></p>
            <input type="Email" name="email" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" name="dangnhap" value="Đăng nhập">
        </form>
        <div class="links">
            <a href="#">Quên mật khẩu ?</a>
            <span>|</span>
            <a href="index.php?act=dangky">Đăng ký</a>
        </div>
    </div>
</body>
</html>
