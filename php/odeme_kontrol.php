<?php
include 'baglan.php';


// Ödeme kontrolü burada gerçek yapılmayacak, direkt kiralama olacak

if (!isset($_POST['kitap_id'])) {
    header('Location: ../kitaplar.php');
    exit;
}

$kitap_id = intval($_POST['kitap_id']);
$kullanici_id = $_SESSION['kullanici_id'];

// Ödeme "başarılı" kabul ediyoruz
$_SESSION['sweet_alert'] = ['Ödeme Başarılı!', 'Kiralamaya yönlendiriliyorsunuz.', 'success'];

// Ödeme başarılıysa kiralama işlemi
header("Location: islem.php?islem=kirala&id=$kitap_id");
exit;
?>
