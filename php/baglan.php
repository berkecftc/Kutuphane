<?php
    session_start();
    
    $url = explode("/",$_SERVER['REQUEST_URI']);
    $sayfa = $url[(count($url)-1)];
    if(!$_SESSION && $sayfa!="login.php" && $sayfa!="loginadmin.php" && $sayfa!="panel.php") { // giriş yoksa login yönlendirme
        header("refresh:0;url=../login.php");
    }

    $dsn = 'mysql:host=localhost;dbname=kutuphaneee;charset=utf8';
    $user = 'root'; 
    $pswd = ''; 

    try{
        $db = new PDO($dsn, $user, $pswd); 
    }
    catch(Exception $e){ 
        echo "Bağlantı başarısız";
        echo "Hata: ",$e->getMessage(); 
    }
?>