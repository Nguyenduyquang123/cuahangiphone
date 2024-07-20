<?php 
   session_start();
   require_once("../sanpham.php");
   require_once("../danhmuc.php");
  

    require_once("/xampp/htdocs/cuahangiphone/includes/connect.php");
    require_once("/xampp/htdocs/cuahangiphone/includes/database.php");
    require_once("/xampp/htdocs/cuahangiphone/includes/functions.php");
    require_once("/xampp/htdocs/cuahangiphone/moduls/auth/donhang.php");

    

    
   
   
    include "view/header.php";
   
    $tongsp = countproduct();
    $tonguser = countuser();
    $tongctg = countcategory();
    $newuser = limit10user();
    $neworder =limit10order();
 
    if(isset($_POST['xem'])) {
        $date_start = $_POST['start_date'];
        $date_end = $_POST['end_date'];
        $start_date = date("Y-m-d", strtotime($date_start));
        $end_date = date("Y-m-d", strtotime($date_end));
        $start_date .= " 00:00:00";
        $end_date .= " 23:59:59";

        $showosumorder = showosumorder($start_date, $end_date);
        $showorder = showorder($start_date, $end_date);
        // Now you can use $showorder array to display your orders
        
    }



    if(isset($_GET['pg'])){
        switch($_GET['pg']){
            case 'orders';
            $alldh1 =alldonhang1(0);
            $alldh =alldonhang();

            include "view/orders.php";
            break;
            case 'orderdetail';
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $alldh =onedonhang($id);
                
            }
            if(isset($_POST['xacnhan'])){
                $id =$_GET['id'];
                $trangthai = $_POST['xuly'];
                updateonedh($id,$trangthai);
                header('location: index.php?pg=orders');
            }

            include "view/orderdetai.php";
            
            break;
        
            
           
            case 'orders_delete';
            if(isset($_GET['id'])){

             $deldt = Deletedetail('order_details',$_GET['iddh']);
             $del = Delete('orders',$_GET['id']);
            }
            header('location: index.php?pg=orders');
            break;
            case 'caterogies';
            $alldm = alldm();
            include "view/caterogies.php";
            break;
            case 'addcaterogies';
            if(isset($_POST['btnadd'])){
                $name =$_POST['name'];
                $hienthi =$_POST['hienthi'];
                $link =$_POST['link'];
                danhmuc_insert( $name,$link,$hienthi );
                $tb= "Thêm thành công!";
            }
            include "view/addcaterogies.php";
            break;
            case 'caterogies_delete';
            if(isset($_GET['id'])&&($_GET['id']>0)){
             $del = delete('category',$_GET['id']);
            }
            header('location: index.php?pg=caterogies');
            break;
            case 'caterogies_update':
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $kqone = getonedm($id);
                    include "view/editcaterogies.php";
                    
                }
            break;
            
               
            
                case 'caterogies_update1':
                if(isset($_POST['btnedit'])) {
                    
                    $id = $_GET['id'];
                    $name = $_POST['name'];
                    $hienthi = $_POST['hienthi'];
                    $link = $_POST['link'];
                    updatedm($id, $name, $link, $hienthi);
                
                    $tb = "sửa danh mục thành công";
                }
                header('location: index.php?pg=caterogies');
            break;
            
            case 'addProduct';
           
            if(isset($_POST['btnadd'])) {
                $name = $_POST['name'];
                $dm = $_POST['iddm'];
                $dis= $_POST['price_sale'];
                $price =$_POST['price'];
                $img = basename($_FILES['image']['name']);
    
                $target_dir = "/xampp/htdocs/cuahangiphone/templates/image/"; // Directory where you want to save the uploaded files
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Check if file already exists
                // if (file_exists($target_file)) {
                //     echo "Sorry, file already exists.";
                //     $uploadOk = 0;
                // }
                
                // Check file size
                
                
                // Check if $uploadOk is set to 0 by an error
                
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    
                
                
                
                sanpham_insert($dm,$name,$img,$dis,$price);
                $tb= "Thêm sản phẩm thành công thành công!";
                header("Location: index.php?pg=addcolorpr");     
            }else{
                $alldm = alldm();
            }
            include "view/addProduct.php";
            break;
            case 'products_update':
                $alldm = alldm();
                $allsp = gettall_sp1();
                if(isset($_GET['idpr']) && ($_GET['id'] > 0)) {
                    $idpr = $_GET['idpr'];
                    $id = $_GET['id'];
                    $kqone = getonesp($idpr);
                    $kqonecl =getonecl($id);
                    include "view/editproduct.php";
                    
                }
            break;
            include "view/addProduct.php";
            break;
            case 'products_update1':
                if(isset($_POST['btnedit'])) {
                    
                    $id = $_GET['idpr'];
                    $idcl = $_GET['id'];
                    $name = $_POST['name'];
                    $dm = $_POST['iddm'];
                    $dis= $_POST['price_sale'];
                    $price =$_POST['price'];
                   
                   
                    $color = $_POST['color'];
                    $des= $_POST['detail'];
                    $sl =$_POST['sl'];

                    
                    updatecl($idcl,$color,$des,$sl);
                    updatesp($id,$dm,$name,$dis,$price);
                
                    $tb = "sửa sản phẩm thành công";
                }
                header('location: index.php?pg=products');
            break;
            include "view/addProduct.php";
            break;
            case 'addcolorpr';
           
            if(isset($_POST['btnaddpr'])) {
                $idsp = $_POST['idsp'];
                $color = $_POST['color'];
                $des= $_POST['detail'];
                $sl =$_POST['sl'];
                $img = basename($_FILES['image']['name']);
    
                $target_dir = "/xampp/htdocs/cuahangiphone/templates/image/"; // Directory where you want to save the uploaded files
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                
                // Check file size
                
                
                // Check if $uploadOk is set to 0 by an error
                
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    
                
                
                
                sanpham_insert1($idsp,$color,$des,$img,$sl);
                $tb= "Thêm sản phẩm thành công thành công!";
                                
            }
            $allsp = gettall_sp1();
            include "view/addcolorpr.php";
            break;
            
            case 'products';
            $allpr = showpro(0);
            

            include "view/products.php";
            break;
            case 'products_delete';
            if(isset($_GET['idpr'])&&($_GET['idpr']>0)){
                $dels = deletes('colorsp' ,$_GET['id']);
                $del = delete('product', $_GET['idpr']);
               }
               header('location: index.php?pg=products');
               break;
               
            include "view/products.php";
            break;
            case 'users';
            $alluser = showuser();
            include "view/users.php";
            break;
            case 'users';
            include "view/users.php";
            break;
            case 'banners';
            include "view/banners.php";
            break;
            case 'binhluan';
            $comment = showcomment1();
            include "view/comment.php";
            break;
            case 'thoat':
            unset($_SESSION['user_id']);
            unset($_SESSION['fullname1']);
          

            header("Location: /cuahangiphone/index.php");
           
            exit();
            break;
            case 'adduser':
         
                // Kiểm tra nếu form được submit
                if (isset($_POST['btnadd'])) {
                    $passwordErr = "";
                    $phoneErr ="";
                    $fullnameErr ="";
                    $emailErr ="";
    
    
                        
                        
                    // }
                    $thanhcong ="";
                    $err ="";
                    global $conn;
                    $errors = array();
                    // Lấy dữ liệu từ form
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                  

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
                    } 
                    

                    // Nếu không có lỗi, thực hiện chèn vào CSDL
                    if (empty($errors)) {
                        try {
                            // Tạo kết nối PDO
                            
                            // Thiết lập chế độ lỗi PDO thành ngoại lệ
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL để chèn dữ liệu
                            $sql = "INSERT INTO user (fullname, email, phone,address, password,role) VALUES (:fullname, :email, :phone,:address, :password,1)";

                            // Chuẩn bị câu lệnh SQL
                            $stmt = $conn->prepare($sql);

                            // Bind các tham số
                            $stmt->bindParam(':fullname', $fullname);
                            $stmt->bindParam(':email', $email);
                            $stmt->bindParam(':phone', $phone);
                            $stmt->bindParam(':address', $address);
                            $stmt->bindParam(':password', $password);

                            // Thực thi câu lệnh
                            $stmt->execute();

                            $thanhcong = "Đăng ký thành công";
                        } catch(PDOException $e) {
                            $err = "Lỗi: " . $e->getMessage();
                        }

                        // Đóng kết nối
                        $conn = null;
                        header("Location: index.php?pg=users");
                    }
                }
                                    
                            
                
                    
                include "view/adduser.php";
            break;
            case 'user_delete':
                    
                $id = $_GET['id'];
                Delete('user',$id);
                
                    
                header("Location: index.php?pg=users");
                
            break;
            case 'comment_delete':
                    
                $id = $_GET['id'];
                Delete('comment',$id);
                
                    
                header("Location: index.php?pg=binhluan");
                
            break;
            case 'hangton':
                 $ht = showhangton();
          
                    
                include "view/hangton.php";
                
            break;
        

            default:
            

            include "view/home.php";
            break;

        }
    }else{

        include "view/home.php";
    }
    


    include "view/footer.php";

?>
<a href="/templates/image/"></a>