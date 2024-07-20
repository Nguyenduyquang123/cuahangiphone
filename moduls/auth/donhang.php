<?php 

function taodonhang($madh,$user_id,$hoten,$email,$phone,$diachi,$pttt,$tongdonhang,$tongtien,$order_date){
    global $conn;
    $sql = "INSERT INTO orders (madh,user_id ,fullname, email, phone, address, pttt, tongdonhang,tongtien, order_date) VALUES (:madh,:user_id, :hoten, :email,:phone ,:diachi, :pttt, :tongdonhang,:tongtien, :order_date)";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':madh', $madh);
    $statement->bindParam(':user_id', $user_id);
    $statement->bindParam(':hoten', $hoten);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':phone', $phone);
    $statement->bindParam(':diachi', $diachi);
    $statement->bindParam(':pttt', $pttt);
    $statement->bindParam(':tongdonhang', $tongdonhang);
    $statement->bindParam(':tongtien', $tongtien);
    $statement->bindParam(':order_date', $order_date);
    $statement->execute();
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function addtocart($iddh,$product_id,$tensp,$img,$dongia,$soluong){
    global $conn;
    $sql = "INSERT INTO order_details (iddh,product_id ,tensp, img, dongia, soluong) VALUES (:iddh,:product_id, :tensp, :img,:dongia ,:soluong)";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':iddh', $iddh);
    $statement->bindParam(':product_id', $product_id);
    $statement->bindParam(':tensp', $tensp);
    $statement->bindParam(':img', $img);
    $statement->bindParam(':dongia', $dongia);
    $statement->bindParam(':soluong', $soluong);
   
    $statement->execute();
    $last_id = $conn->lastInsertId();
    return $last_id;
}

function  updateonedh($id,$trangthai){
    global $conn;
    $sql = "UPDATE orders SET  trangthai ='".$trangthai."'  WHERE  id = '".$id."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    

} 

?>