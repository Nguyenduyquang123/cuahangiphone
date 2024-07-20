<?php 
    require_once("/xampp/htdocs/cuahangiphone/includes/connect.php");
function gettall_sp($view){
    global $conn;
    $pageSize = 8;
    $startRow = 0;
    $startRow1 = 0;
    $sql = "SELECT * FROM Product ";
    if(isset($_GET['startRow'])==true) $startRow =$_GET['startRow'];
    if(isset($_GET['startRow1'])==true) $startRow1 =$_GET['startRow1'];
    if($view==1){
        $sql.=" ORDER BY view DESC LIMIT $startRow1,$pageSize ";
    }
    else{
        $sql.=" GROUP BY id DESC LIMIT $startRow,$pageSize";
    }
    
   

    $statement = $conn -> prepare($sql);
    $statement ->execute();

    $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $statement->fetchAll();
    return $kq;

}
function gettall_sp1(){
    global $conn;
    
    $sql = "SELECT * FROM Product ";
    
    
   

    $statement = $conn -> prepare($sql);
    $statement ->execute();

    $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $statement->fetchAll();
    return $kq;

}
function sanphamtheodm($idcategory){
    global $conn;
    $sql = "SELECT * FROM product WHERE category_id = $idcategory LIMIT 16   ";
    $statement = $conn -> prepare($sql);
    $statement ->execute();

    $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $statement->fetchAll();
    return $kq;

}
function sanphamtheodm1($namesearch) {
    global $conn;
    $sql = "SELECT * FROM product WHERE 1";
    $params = [];

    if ($namesearch != "") {
        $sql .= " AND productname LIKE :namesearch";
        $params[':namesearch'] = '%' . $namesearch . '%';
    }

    $sql .= " LIMIT 16";

    $statement = $conn->prepare($sql);
    $statement->execute($params);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function showprodetail($id){
    if($id > 0 ){

        global $conn;
        $sql ="SELECT * FROM product p  INNER JOIN colorsp l ON p.id = l.product_id WHERE 1 ";
        if($id>0) $sql.= "AND p.id=".$id;
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        return  $statement->fetch();
    }//else{
    //     return 0;
    //}
}


function sanpham_insert($dm,$name,$img,$dis,$price){
    global $conn;
    $sql = "INSERT INTO product(category_id,productname,image,discount,price) VALUES (?, ?, ?, ?,? )";
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho các tham số và thực thi truy vấn
    $stmt->execute([$dm,$name, $img, $dis, $price]);
}
function showpro($view){
    

        global $conn;
        $pageSize = 13;
        $startRow = 0;
        $startRow1 = 0;
        $sql ="SELECT * FROM product p  INNER JOIN colorsp l ON p.id = l.product_id    ";
       
       
        if(isset($_GET['startRow'])==true) $startRow =$_GET['startRow'];
        if(isset($_GET['startRow1'])==true) $startRow1 =$_GET['startRow1'];
        if($view==1){
            $sql.=" ORDER BY view DESC LIMIT $startRow1,$pageSize ";
        }
        else{
            $sql.=" GROUP BY id DESC LIMIT $startRow,$pageSize";
        }
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq;
}//else{
    //     return 0;
    //}
   
    function showhangton(){
    

        global $conn;
    
        $sql ="SELECT * FROM product p  INNER JOIN colorsp l ON p.id = l.product_id  ORDER BY l.soluong DESC  ";
       
       
        
       
       
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq;
}//else{
    function  sanpham_insert1($idsp,$color,$des,$img,$sl){

        global $conn;
        $sql = "INSERT INTO colorsp(product_id,color,description,image_detail,soluong) VALUES (?, ?, ?, ?,? ) ";
        $stmt = $conn->prepare($sql);
    
        // Gán giá trị cho các tham số và thực thi truy vấn
        $stmt->execute([$idsp,$color,$des,$img,$sl]);
    }
    function getonesp($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT *FROM product WHERE id = " .$id);
        $stmt -> execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
 
    function getonecl($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT *FROM colorsp WHERE id_prdetail = " .$id);
        $stmt -> execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function updatesp($id,$dm,$name,$dis,$price){
        global $conn;
        $sql = "UPDATE product SET category_id = '".$dm."', productname ='".$name."',discount = '".$dis."',price = '".$price."'  WHERE  id = '".$id."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updatecl($idcl,$color,$des,$sl){
        global $conn;
        $sql = "UPDATE colorsp SET  color ='".$color."',description = '".$des."',soluong = '".$sl."'  WHERE  id_prdetail = '".$idcl."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function alldonhang1($view){
        global $conn;
        
         $pageSize = 8;
            $startRow = 0;
            $startRow1 = 0;
    $sql = "SELECT * FROM orders Where 1  ";
       
       
        if(isset($_GET['startRow'])==true) $startRow =$_GET['startRow'];
        if(isset($_GET['startRow1'])==true) $startRow1 =$_GET['startRow1'];
        if($view==1){
            $sql.=" ORDER BY view DESC LIMIT $startRow1,$pageSize ";
        }
        else{
            $sql.=" GROUP BY id DESC LIMIT $startRow,$pageSize";
        }
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq; 
        }
    function alldonhang(){
    global $conn;
    $sql = "SELECT * FROM orders o INNER JOIN order_details d ON o.id = d.iddh  ORDER BY o.id DESC  ";
    $statement = $conn -> prepare($sql);
    $statement ->execute();

    $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $statement->fetchAll();
    return $kq; 
    }
    function onedonhang($id){
        global $conn;
        $sql = "SELECT * FROM orders o INNER JOIN order_details d ON o.id = d.iddh WHERE id = $id ORDER BY o.id DESC  ";
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq; 
        }
    function showuser(){
    

        global $conn;
        $sql ="SELECT * FROM user WHERE 1    ";
         
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq;
}
function donhanguser($user_id){
    global $conn;
    $sql = "SELECT * FROM orders o INNER JOIN order_details d ON o.id = d.iddh WHERE user_id = $user_id ORDER BY o.id DESC  ";
    $statement = $conn -> prepare($sql);
    $statement ->execute();

    $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $statement->fetchAll();
    return $kq; 
    }
    function addview($id){
        global $conn;
        $sql = "UPDATE product SET view = view + 1 WHERE id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
     }
     function updatesl($id){
        global $conn;
        $sql = "UPDATE colorsp SET soluong = soluong - 1 WHERE product_id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
     }
     function addsl($id){
        global $conn;
        $sql = "UPDATE colorsp SET soluong = soluong + 1 WHERE product_id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
     }
     function showcomment($prd_id){
        global $conn;
        $sql = "SELECT * FROM comment c INNER JOIN product p ON c.prd_id = p.id INNER JOIN user u ON c.user_id = u.id WHERE c.prd_id = $prd_id ORDER BY c.id DESC  ";
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq; 
        }
        function showcomment1(){
            global $conn;
            $sql = "SELECT c.id,u.fullname,p.productname,c.conten,c.date,c.trangthai FROM comment c INNER JOIN product p ON c.prd_id = p.id INNER JOIN user u ON c.user_id = u.id  ORDER BY c.id DESC  ";
            $statement = $conn -> prepare($sql);
            $statement ->execute();
        
            $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
            $kq = $statement->fetchAll();
            return $kq; 
            }
   
       
?>