<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container1 {
           
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .product {
            display: flex;
            align-items: flex-start;
        }
        .product img {
            width: 150px;
            height: auto;
            border-radius: 8px;
        }
        .product-info {
            flex-grow: 1;
            margin-left: 20px;
        }
        .product-info h2 {
            font-size: 18px;
            margin: 0 0 10px;
            font-weight: normal;
            width: 367px;
        }
        .product-info p {
            margin: 5px 0;
            color: #666;
        }
        .product-info .price {
            font-size: 14px;
            text-decoration: line-through;
            color: #999;
        }
        .product-info .discount-price {
            font-size: 14px;
            color: #ff4c4c;
        }
        .product-info .quantity {
            margin: 10px 0;
            color: #333;
        }
        .product-info .return-policy {
            display: inline-block;
            padding: 5px 10px;
            background-color: #e0f3e0;
            color: #1e824c;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 10px;
        }
        .total-price {
            font-size: 20px;
            color: #ff4c4c;
            text-align: right;
           
        }
        .actions {
            display: flex;
            justify-content: flex-end;
            
        }
        .actions button {
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }
        .actions .buy-again {
            background-color: #ff4c4c;
            color: #fff;
        }
        .actions .contact-seller {
            background-color: #f8f8f8;
            color: #333;
        }
        .actions .view-shop {
            background-color: #f8f8f8;
            color: #333;
        }
        .buy-again  a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
    
</head>
<body>
  
    
    <?php 
    foreach($donhanguser as $item){
        $btn = ' ';
        $btntt = ' ';
        if($item['trangthai'] == "Đợi xứ lý"){
            $btn = '<button class="buy-again"><a href="index.php?act=deletedonhang&iddh='.$item['iddh'].'">Hủy đơn</a> </button>';
        }
        if($item['trangthai'] == "Giao hàng thành công"){
            $btntt = ' <button class="view-shop" style="background-color: #35a79c; color:white;">'.$item['trangthai'].'</button> ';
        }else{
            $btntt = '<button class="view-shop">'.$item['trangthai'].'</button> ';
        };
        echo ' <div class="container1">
        <div class="product">
            <img src="./templates/image/'.$item['img'].'" alt="Product Image">
            <div class="product-info">
                <h2>'.$item['tensp'].'</h2>
               
                <p class="quantity">x'.$item['soluong'].'</p>
                <p class="discount-price">'.$item['dongia'].'0.000đ</p>
                
            </div>
            <p>Thời gian đặt hàng: '.$item['order_date'].'</p>
        </div>
        <div class="total-price">
            Thành tiền: <span>'.$item['soluong'] * $item['dongia'] .'0.024đ</span>
        </div>
        <div class="actions">
            
            '.$btn.'
            '.$btntt.'
            <button class="view-shop">Xem Shop</button>
        </div>
    </div>';
    }
   
    ?>
</body>
</html>
