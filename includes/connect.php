<!-- kết nối database -->
<?php

// $modul = 'home';
// $active = 'dashboard';
const _MODUL = 'home';
const _ACTIVE = 'dashboard';
const _CODE = true;

define('_WEB_HOST','http://'. $_SERVER['HTTP_HOST'].'/MyPro/manager_user');
define('_WEB_HOST_TEMPLATES',_WEB_HOST.'/teamplates');

//path

define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATES', _WEB_PATH . '/teamplates'
);


const _HOST ='localhost';
const _DB ='websitebanhang';
const _USER ='root';
const _PASS = '';


try{

    if(class_exists('PDO')){

        $dsn = 'mysql:dbname='._DB.';host'._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //set utf8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //tạo thông báo ngoại lệ khi gặp lỗi

        ];

        $conn = new PDO($dsn, _USER,_PASS,$options);

        //  if($conn){
        //     echo 'kết nối thành công';
        // }
    }

}catch(Exception $e){

    echo '<div style="color:red;padding:5px 14px; border:1px solid red;">';
    echo $e ->getMessage().'<br>';
    echo '</div>';
    die();//kết thúc chương trình
}
 