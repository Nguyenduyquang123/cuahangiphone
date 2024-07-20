<!-- các hàm chung project -->
<?php



function layouts($layoutName='header',$data=[]){
    if(file_exists(_WEB_PATH_TEMPLATES . '/layout/'. $layoutName .'.php')){
        require_once _WEB_PATH_TEMPLATES . '/layout/'. $layoutName .'.php';
    }

}


//kiếm tra phương thức get
function isGet(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        return true;
    }
    return false;
}
//kiếm tra phương thức post
function isPost(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        return true;
    }
    return false;
}
//hàm filter lọc dữ liệu

function filter(){
    if(isGet()){
        //xứ lý cái dữ liệu trước khi hiển thị ra
        if(!empty($_GET)){
            foreach($_GET as $key => $value){
                $key = strip_tags($key);
                if(is_array($value)){
                    $filterArr[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                }else{
                    $filterArr[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    if(isPost()){
        //xứ lý cái dữ liệu trước khi hiển thị ra
        if(!empty($_POST)){
            foreach($_POST as $key => $value){
                $key = strip_tags($key);
                if(is_array($value)){
                $filterArr[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                }else{
                    $filterArr[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

// kiếm tra email

function isEmail($email){
    $checkEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}

//kiếm tra int 
function isNumberInt($number){
    $checkNumber = filter_var($number,FILTER_VALIDATE_INT);
    return $checkNumber;
}
//kiếm tra float
function isfloat($float){
    $checkfloat = filter_var($float,FILTER_VALIDATE_FLOAT);
    return $checkfloat;
}

//hàm kiếm tra số dt
function isPhone($phone){
    //0354194707
    $checkZero =false;

    // dk1: ký tự đầu tiên là số 0
    if($phone[0] == '0'){
        $checkZero = true;
        $phone = substr($phone,1); //xóa số 0 đầu tiên
    }

    //dk2: đăng sau là 9 số
    $checkNumber = false;
    if(isNumberInt($phone) && (strlen($phone)==9)){
        $checkNumber = true;
    }
    if($checkZero && $checkNumber){
        return true;
    }
    return false;
}

// thông báo lỗi
function getSmg($smg ,$type ='success'){
    echo '<div class="alert alert-'.$type.'">';
    echo $smg;
    echo '</div>';
}
function getRows($sql) {
    // Thực hiện truy vấn SQL
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Đếm số lượng hàng và trả về
    $rowCount = $stmt->rowCount();
    return $rowCount;
}



function userone($id){
    global $conn;
    $stmt = $conn->prepare("SELECT *FROM user WHERE id = " .$id);
    $stmt -> execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function  updateuser($id,$fullname,$email,$phone,$address){
    global $conn;
    $sql = "UPDATE user SET  fullname ='".$fullname."',email = '".$email."',phone = '".$phone."',address = '".$address."'  WHERE  id = '".$id."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    

} 
//  // Get the total number of products
//  $totalProducts = countproduct();

//  // Get the total number of members
//  $totalMembers = $db->query("SELECT COUNT(*) AS total_members FROM members")->fetch_assoc()['total_members'];
 
//  // Get the total number of categories
//  $totalCategories = $db->query("SELECT COUNT(*) AS total_categories FROM categories")->fetch_assoc()['total_categories'];
 
//  // Get the total number of orders
//  $totalOrders = $db->query("SELECT COUNT(*) AS total_orders FROM orders")->fetch_assoc()['total_orders'];
 
//  // Get the total revenue
//  $totalRevenue = $db->query("SELECT SUM(amount) AS total_revenue FROM orders")->fetch_assoc()['total_revenue'];
 
//  // Get the latest orders
//  $latestOrders = $db->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 10")->fetch_all(MYSQLI_ASSOC);
 
// tổng sản phẩm
function countproduct(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_products FROM product");
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_products'];
}
//tổng tài khoản
function countuser(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_user FROM user");
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_user'];
}
// 10 tài khoản mới tạo
function limit10user(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM user GROUP BY id DESC LIMIT 10 ");
    $stmt -> execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
// tổng danh mục
function countcategory(){
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_category FROM category");
    $stmt -> execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_category'];
}
// 10 đơn hàng mới 
function limit10order(){
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM orders GROUP BY id DESC LIMIT 10 ");
    $stmt -> execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function showorder($start_date, $end_date) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM orders 
        WHERE order_date BETWEEN :start_date AND :end_date");
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}
function showosumorder($start_date, $end_date) {
    global $conn;
    $stmt = $conn->prepare("SELECT SUM(tongtien) AS total_revenue FROM orders 
        WHERE order_date BETWEEN :start_date AND :end_date");
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_revenue'];
}

