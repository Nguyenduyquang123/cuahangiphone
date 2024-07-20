<!-- xứ lý cơ sở dũ liệu -->
<?php


 function query($sql, $data=[], $check = false){
    global $conn;
    $ketqua = false;
   
    try{
        $statement = $conn -> prepare($sql);

        if(!empty($data)){
            $ketqua = $statement -> execute($data);
        }
        else{
            $ketqua = $statement -> execute();
        }

    }catch(Exception $exp){
        echo $exp -> getMessage().'<br>';
        echo 'File: ' .$exp -> getFile().'<br>';
        echo 'Line:'.$exp -> getLine();
        die();
    }

    if($check){
        return $statement;
    }

    return $ketqua;
 }

 function insert($table ,$data){
    $key = array_keys($data);
    $truong = implode(',',$key);
    $valuetb = ':'.implode(',:',$key);

    $sql ='INSERT INTO ' . $table . ' ('.$truong.')'. 'VALUES('. $valuetb .')';

    $kq = query($sql,$data);
    return $kq;
 }
 function update($table ,$data,$condition=''){
    $update = '';
    foreach($data as $key => $values){
        $update .= $key .'= :' .$key . ',' ;
        
    }
    $update= trim($update,',');

    if(!empty($condition)){
        $sql = 'UPDATE ' . $table . '  SET ' . $update . ' WHERE ' . $condition;
    }else{
        $sql = 'UPDATE ' . $table . ' SET ' . $update;
    }
    $kq = query($sql,$data);
    return $kq;
 }

 function Delete($table ,$condition='') {
    if(empty($condition)){
        $sql = 'DELETE FROM '  . $table;
    }
    else{
        $sql = 'DELETE FROM '  . $table .' WHERE id = ' .$condition;
    }
    $kq = query($sql);
    return $kq;
 }
 function Deletedetail($table ,$condition='') {
    if(empty($condition)){
        $sql = 'DELETE FROM '  . $table;
    }
    else{
        $sql = 'DELETE FROM '  . $table .' WHERE iddh = ' .$condition;
    }
    $kq = query($sql);
    return $kq;
 }
 function Deletes($table ,$condition='') {
    if(empty($condition)){
        $sql = 'DELETE FROM '  . $table;
    }
    else{
        $sql = 'DELETE FROM '  . $table .' WHERE id_prdetail = ' .$condition;
    }
    $kq = query($sql);
    return $kq;
 }


 // lấy nhiều dòng dữ liệu 
 function getRaw($sql){
    $kq = query($sql,'',true);
        if(is_object($kq)){
            $dataFetch = $kq -> fetchAll(PDO::FETCH_ASSOC);
        }
        return $dataFetch;
    
 }
 // lấy 1 dòng
 function oneRaw($sql){
    $kq = query($sql,'',true);
        if(is_object($kq)){
            $dataFetch = $kq->fetch(PDO::FETCH_ASSOC);
        }
        return $dataFetch;
    
 }
//đếm số dòng
// function getRows($sql){
//     $kq = query($sql,'',true);
//         if(!empty($kq)){
//            return $kq->rowCount();
//         }
       
    
//  }