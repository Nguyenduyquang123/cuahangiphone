<?php 
    session_start();
    ob_start();
    if(!isset($_SESSION['giohang'])){
        $_SESSION['giohang'] =[];
    }
    require_once("./moduls/sanpham.php");
    require_once("./moduls/danhmuc.php");
    require_once("./moduls/auth/donhang.php");
    require_once("./includes/connect.php");
    require_once("./includes/functions.php");
    require_once("./includes/database.php");


    
    //load dữ liệu vào trang chủ
    $sp1 = gettall_sp(0);
    $sp2 = gettall_sp(1);
    $dasm= getalldm(1);
    $dasm1= getalldm(2);

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'dangnhap';
            $error_message = "";
            if(isset($_POST['dangnhap'])) {
                // Kết nối đến CSDL (Giả sử đã được thiết lập trước đó)
                global $conn;
                
                // Nhận dữ liệu từ biểu mẫu đăng nhập
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                
                // Xử lý đăng nhập
                $sql = "SELECT * FROM user WHERE email = :email AND password = :pass";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pass', $pass);
                $stmt->execute();
                
                // Kiểm tra xem có người dùng khớp với thông tin đăng nhập không
                if($stmt->rowCount() > 0) {
                    // Lấy thông tin người dùng
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['role'] = $user['role'];
                    if( $user['role'] == 2){
                        
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['fullname1'] = $user['fullname'];
                        header("Location: /cuahangiphone/moduls/admin/index.php");
                    }else{
                        // Lưu thông tin người dùng vào session
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['user_email'] = $user['email'];
                        $_SESSION['phone'] = $user['phone'];
                        $_SESSION['fullname'] = $user['fullname'];
                        $_SESSION['address'] = $user['address'];
                        
                        // Chuyển hướng người dùng đến trang chính sau khi đăng nhập thành công
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    // Đăng nhập không thành công, hiển thị thông báo lỗi
                    $error_message = "Email hoặc mật khẩu không chính xác.";
                }
                
            }
            include "./moduls/auth/login.php";
            die();
            break;
            case 'dangky';
            include "./moduls/auth/Register.php";
            die();
            break;
            case 'thanhtoan';
            if(!isset($_SESSION['user_id'])){
                header("Location: index.php?act=dangnhap");
            }else{
                if(isset($_POST['thanhtoan'])&&($_POST['thanhtoan'])){
                  //lấy dữ liệu
                  
                  $tongdonhang = $_POST['tongdonhang'];
                  $user_id = $_SESSION['user_id'];
                  $hoten = $_POST['hoten'];
                  $diachi = $_POST['diachi'];
                  date_default_timezone_set('Asia/Ho_Chi_Minh'); // Múi giờ cho Việt Nam
                 $currentDateTime = new DateTime();
                
                  $order_date =   date("Y-m-d H:i:s");
                  
                  if(empty($diachi)){
                    header("Location: index.php?act=userinfo");
                  }
                  $email = $_POST['email'];
                  $phone = $_POST['sodienthoai'];
                  $pttt = $_POST['pttt'];
                  $tongtien = $_POST['tongtien'];
                  $madh='ToApple'.rand(0,99999);
                  //tọa đơn hàng
                  //trả về 1 id đơn hàng
                  $iddh=taodonhang($madh,$user_id,$hoten,$email,$phone,$diachi,$pttt,$tongdonhang,$tongtien,$order_date);
                  if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                    foreach($_SESSION['giohang'] as $item){
                        addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4]);
                        updatesl($item[0]);
                    }
                    
                  
                  }
                  if($pttt == '2'){
                     header('location: /cuahangiphone/templates/vnpay_php/vnpay_pay.php?iddh='.$iddh.'');
                  }
                 
            }
              include"./templates/thanhtoan.php";
              exit();
            }
            
        break;
        }
        
    }    
    include "templates/header.php";
    
    if(isset($_GET['act'])){
        switch($_GET['act']){
           
            case 'sanpham';
            $dasm= getalldm(1);
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $iddm = $_GET['id'];
                $dssp_dm = sanphamtheodm($iddm);   
            }else{
                $namesearch = "";
                if(isset($_POST['btnsearch'])){
                    $namesearch = $_POST['namesearch'];
                }
                
                $iphone = sanphamtheodm1($namesearch);
                
            }
            include"./templates/cuahang.php";
            break;
            case 'home';
           
            $dasm= getalldm(1);
            $dasm1= getalldm(2);
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $iddm = $_GET['id'];
                $dssp_dm = sanphamtheodm($iddm);   
            }
            include"./templates/home.php";
            break;
            case 'search';
           
          
            include"./templates/search.php";
            break;
            case 'productdetail';
            $dasm= getalldm(1);
            $id = $_GET['id'];
            $cmdt =  showcomment($id);
            $pro = showprodetail($id);
            $addview =addview($id);
            include"./templates/productdetail.php";
            break;
            case 'addcart';
            if(isset($_POST['addtocart'])){
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $img = $_POST['img'];
                $discount = $_POST['giagiam'];
                if(isset($_POST['sl'])&&($_POST['sl'] > 0)){
                    $sl = $_POST['sl'];
                }else{
                    $sl=1;

                }
                $fg=0;
                //nếu sp đã có thì nhập lại sl
                $i=0;
                foreach($_SESSION['giohang'] as $item){
                    
                    if($item[0]==$id){
                        $slnew= $sl + $item[4];
                        $_SESSION['giohang'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }

                //ko có sp thì add vào giỏ
                if($fg==0){
                    $item=array($id,$tensp,$img,$discount,$sl);
                    $_SESSION['giohang'][] = $item;
                }

                // khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
            
                header('location: index.php?act=addcart');

            }


            include"./templates/giohang.php";
            break;

            
            case 'delcart';
            if(isset($_GET['i'])&&($_GET['i']>=0)){
               if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0))
                   array_splice($_SESSION['giohang'],$_GET['i'],1); 

            }else{
                if(isset( $_SESSION['giohang'])) unset($_SESSION['giohang']);unset($_SESSION['soluong']);
            }
            
            if(isset( $_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                 header('location: index.php?act=addcart');
            }else{
                header('location: index.php');
                
            }
            
            
            break;
          
            case 'thoat';
            unset($_SESSION['role']);
            unset( $_SESSION['user_id']);
            unset( $_SESSION['user_email']);
            unset( $_SESSION['fullname']);
            unset( $_SESSION['address']);
            
            header("Location: index.php");
            
            break;
           
            break;
            case 'userinfo':

                $oneuser = userone($_SESSION['user_id']);
            
                if (isset($_POST['adduser'])) {
                    $id = $_SESSION['user_id'];
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
            
                    updateuser($id, $fullname, $email, $phone, $address);
            
                    $_SESSION['address']= $_POST['address'];
            
                    header("Location: index.php");
                }
            
                include "./templates/userinfo.php";
            
                break;
                case 'donhangcuaban':
                    $user_id = $_SESSION['user_id'];
                    $donhanguser =donhanguser($user_id);
                   
                
                    include "./templates/donhang.php";
                
                break;
                case 'deletedonhang':
                    
                    $iddh = $_GET['iddh'];
                    Deletedetail('order_details', $iddh);
                    Delete('orders',$iddh);
                    global $conn;
                    $sql = 'SELECT * FROM order_details WHERE iddh = :iddh';
                    $statement = $conn->prepare($sql);
                    $statement->bindParam(':iddh', $iddh, PDO::PARAM_INT); // Sử dụng bindParam để ràng buộc giá trị $iddh
                    $statement->execute();
                    $kq = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($kq as $row) {
                        $id = $row['product_id'];
                        // Do something with $id, like storing in an array if needed
                        addsl($id); // For example, print it
                    }
                    
                  
                        
                   
                    header("Location: index.php?act=donhangcuaban");
                    
                break;
                case 'addcomment';
                if(isset($_POST['btncomnent'])){
                    if(!isset($_SESSION['user_id'])){
                        header("Location: index.php?act=dangnhap");
                    }
                    $iduser = $_SESSION['user_id'];

                    // addcomment()
                }
               include"./templates/productdetail.php";
                break;
            
        break;
       
        }
    }else{
        
        include"/xampp/htdocs/cuahangiphone/templates/home.php";


    }
    include "templates/footer.php";

?>
