<?php session_start();
    session_destroy();
    echo "Çıkış yaptınız";
    header("Refresh:0; url=../login.php");
?>