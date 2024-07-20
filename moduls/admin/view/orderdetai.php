<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Chi Tiết Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .total, .discount, .shipping {
            font-weight: bold;
        }
        .total-amount {
            font-size: 1.2em;
            color: #ff0000;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    
<div class="main-content">
<h4 class="info-header">THÔNG TIN Khách hàng</h4>
            <table>
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr> 
                        <td><?=$alldh[0]['fullname']?></td>
                        <td><?=$alldh[0]['phone']?></td>
                        <td><?=$alldh[0]['email']?></td>
                       
                       
                        </tr> ;
                    
                    
                    
                  
                   
                </tbody>
            </table>


            <h4 class="info-header">THÔNG TIN VẬN CHUYỂN HÀNG</h4>
            <table>
                <thead>
                    <tr>
                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>
                        <th>trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
              
                    
                      
                       <tr>  
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$alldh[0]['pttt']?></td>
                        </tr> 
                       
                      
                    
                    
                    
                    
                      
                    </tr>
                    <div style="float: right;width: 200px; background-color: lightblue; ">
                            
                        1:Thanh toán khi nhận hàng <br>
                        2:Thanh toán chuyển khoản <br>
                       
                    </div>
                </tbody>
            </table>


    <h4>LIỆT KÊ CHI TIẾT ĐƠN HÀNG</h4>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá bán</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               
            </tr>
            <?php 
              
             
            
            $tongTienTatCaSanPham = 0;
                    foreach($alldh as $item){
                        $tong = $item['soluong'] * $item['dongia'];
                        $tongTienTatCaSanPham += $tong;
                        echo ' <tr> 
                        <td>'.$item['tensp'].'</td>
                     
                        <td><input type="number" value="'.$item['soluong'].'" disabled></td>
                        <td>'.$item['dongia'].'0.000đ</td>
                        <td>'. $tong.'0.000đ</td>
                        </tr> ';
                       
  

                    }
                    
                    
                    ?>
        </tbody>
    </table>
    <form action="" method="post">
    <div class="form-group">
        <label for="status">Trạng thái:</label>
        <select id="status" name="xuly">
            <option value="Đợi xứ lý">Chưa xứ lý</option> 
            <option value="Đã xác nhận đơn hàng">Đã xử lý</option>
            <option value="Giao hàng thành công">Giao hành thành công</option>
        </select>
    </div>
    <div class="summary">
        
        <p class="total">Thanh toán: <span class="total-amount"><?php   echo $tongTienTatCaSanPham ?>0.000đ</span></p>
            <button type="submit" name="xacnhan">Hoàn tất</button>
                   
        </div>
    </form>
   
</div>
</body>
</html>
