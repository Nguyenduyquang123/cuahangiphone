<!-- hàm liên quan session hay cookie -->
<?php


//hàm gán session 
function setSession($key,$value){
    return $_SESSION[$key] = $value; 
}

//hàm đọc session
function getSession($key=' '){
    if(empty($key)){
        return $_SESSION;
    }else{
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }
}

// Hàm xóa session

function removeSession($key=' '){
    if(empty($key)){
        session_destroy();
        return true;
    }else{
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
            return true;
        }
    }
}

//hàm gán flash data 
function setFlashData($key,$value){
    $key ='flash_'.$key;
    return setSession($key,$value);
}

//hàm đọc flash data 

function getFlashData($key){
    $key = 'flash_'.$key;
    $data = getSession($key);
    removeSession($key) ;
    return $data;
}