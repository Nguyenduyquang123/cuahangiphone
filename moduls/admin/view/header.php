<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="layout/assets/css/main.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    
    <title>Admin</title>
    <style>
       .user-card {
    display: flex;
    align-items: center;
    color: white;
    font-family: Arial, sans-serif;
    }
    .user-info {
        display: flex;
        flex-direction: column;
    }
    .user-info .name {
        font-size: 18px;
        font-weight: bold;
    }
    .user-info .role {
        font-size: 14px;
        color: #bdc3c7;
    }
    </style>
</head>

<body>
    <div class="container-fluid main-page">

        <div class="app-main">
            <nav class="sidebar bg-primary">
                
                <ul>
                    <li>
                    <div class="user-card">
                       
                        <div class="user-info">
                            <div class="name"><?php if(isset($_SESSION['fullname1'])){echo $_SESSION['fullname1'];}?></div>
                            <div class="role">Administrator</div>
                        </div>
                        <hr>
                    </div>
                    <br>
                    <a href="index.php?pg=thoat" class="logout-button">
                    <i class="fas fa-power-off logout-icon"></i> Logout
                    </a>
                    </li>
               
                    <li>
                        <a href="index.php"><i class="fa-solid fa-house ico-side"></i>Dashboards</a>
                    </li>
                    <li>
                        <a href="index.php?pg=orders"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản kí đơn hàng</a>
                    </li>
                    <li>
                        <a href="index.php?pg=caterogies"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh muc</a>
                    </li>
                    <li>
                        <a href="index.php?pg=products"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <li>
                        <a href="index.php?pg=users"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
                    </li>
                    <li>
                        <a href="index.php?pg=banners"><i class="fa-solid fa-user ico-side"></i>Quản lí banner</a>
                    </li>
                    <li>
                        <a href="index.php?pg=binhluan"><i class="fa-solid fa-user ico-side"></i>Quản lí bình luận</a>
                    </li>
                    <li>
                        <a href="index.php?pg=hangton"><i class="fa-solid fa-user ico-side"></i>Hàng tồn kho</a>
                    </li>
                </ul>
            </nav>