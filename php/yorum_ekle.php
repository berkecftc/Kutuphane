<?php

include 'baglan.php'; // Veritabanı bağlantısını dahil et

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kitap_id = intval($_POST['kitap_id']);
    $kullanici_id = intval($_POST['kullanici_id']);
    $yorum_metni = trim($_POST['yorum_metni']); // Yorumun başındaki ve sonundaki boşlukları temizle

    // Blacklist - Yasaklı kelimeler
    $blacklist = ["küfür1", "küfür2", "kötükelime", "örnekküfür"];

    // Yorum metnini temizle, boşlukları kaldır ve küçük harf yap
    $yorum_metni_clean = preg_replace('/\s+/', '', strtolower($yorum_metni));

    // Blacklist kontrolü
    foreach ($blacklist as $kelime) {
        if (stripos($yorum_metni_clean, strtolower($kelime)) !== false) {
            $_SESSION['sweet_alert'] = ['Uyarı', 'Yorumunuzda uygun olmayan kelimeler var!', 'warning'];
            header("Location: ../pages/kitapdetay.php?id=$kitap_id");
            exit();
        }
    }

    // Yorum boş değilse ekle
    if (strlen($yorum_metni) > 0) {
        $yorum_metni = htmlspecialchars($yorum_metni, ENT_QUOTES, 'UTF-8'); // XSS koruması için yorumdaki özel karakterleri temizle

        // Yorum veritabanına ekleniyor
        $sql = "INSERT INTO yorumlar (kitap_id, kullanici_id, yorum_metni, eklenme_tarihi) VALUES (?, ?, ?, NOW())";
        $stmt = $db->prepare($sql);
        $stmt->execute([$kitap_id, $kullanici_id, $yorum_metni]);

        $_SESSION['sweet_alert'] = ['Başarılı', 'Yorumunuz başarıyla eklendi!', 'success'];
        header("Location: ../pages/kitapdetay.php?id=$kitap_id");
        exit();
    } else {
        $_SESSION['sweet_alert'] = ['Uyarı', 'Yorum boş bırakılamaz!', 'warning'];
        header("Location: ../pages/kitapdetay.php?id=$kitap_id");
        exit();
    }
}
?>
