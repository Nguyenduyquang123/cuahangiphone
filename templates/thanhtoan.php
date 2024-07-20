<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        font-size: 20px;
    }
    .centrer1 {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Đảm bảo rằng nội dung sẽ nằm giữa trang theo chiều dọc */
}

</style>
<body>

<div class="centrer1">

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 30">
                      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                          <img src="./templates/image/v.png" style="width: 30px; height: 30px;" class="rounded me-2" alt="...">
                          <strong class="me-auto">ĐẶT HÀNG THÀNH CÔNG</strong>
                          <small>1 giây trước</small>
                          <a href="C:/Users/nguye/Desktop/baitap/home.php"><input type="hidden" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></input></a>
                        </div>
                        <div class="toast-body">
                          Cửa hàng cảm ơn bạn đã tin tưởng và mua hàng của chúng tôi 
                    
                        </div>
                      </div>
    </div>
</div>
<script>
// Sử dụng hàm setTimeout để chuyển hướng sau một khoảng thời gian
setTimeout(function() {
    window.location.href = "index.php?act=delcart"; // Thay đổi đường dẫn thành địa chỉ của trang chủ của bạn
}, 2000); // Thời gian chuyển hướng: 4 giây (4000 miligiây)
</script>
  
</body>
<script type="text/javascript" src="./templates/bootstrap/js/themgiohang.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="./templates/bootstrap/js/jquery-3.6.0.min.js"></script>
</html>
