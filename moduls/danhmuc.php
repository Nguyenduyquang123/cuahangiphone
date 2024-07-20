<?php
    function getalldm($ht){

        global $conn;
        $sql = "SELECT * FROM Category WHERE hienthi = $ht ";
        
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq;
    }
    function danhmuc_insert($ten_danhmuc,$link,$hienthi){
        global $conn;
        $sql="INSERT INTO category(name,link,hienthi) VALUES(:name,:link,:hienthi)";
 
            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);

            // Bind các tham số
            $stmt->bindParam(':name', $ten_danhmuc);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':hienthi', $hienthi);


            // Thực thi câu lệnh
            $stmt->execute();
    }
    function alldm(){

        global $conn;
        $sql = "SELECT * FROM Category ";
        
        $statement = $conn -> prepare($sql);
        $statement ->execute();
    
        $result = $statement -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $statement->fetchAll();
        return $kq;
    }
    function updatedm($id,$name,$link,$hienthi){
        global $conn;
        $sql = "UPDATE Category SET name = '".$name."', link ='".$link."',hienthi = '".$hienthi."'  WHERE  id = '".$id."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function getonedm($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM category WHERE id = " .$id);
        $stmt -> execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
?>