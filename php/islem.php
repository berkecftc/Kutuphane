<?php include '../php/baglan.php'; 


?>
<!DOCTYPE html>
<head>
</head>
<body>

<?php
    $yonlendir = "";

    if(isset($_GET['islem']) && isset($_GET['id'])) { // GET
        switch($_GET['islem']) {
            case 'sil': // silme
                $id = $_GET['id'];
                $tablo = $_GET['tablo'];

                if( $tablo == 'kitap' || $tablo == 'yazar') { // resim silme
                    ($tablo == 'kitap') ? $sutun = 'kapak' : $sutun = 'resim' ;
                    $resim_adres = $db->prepare("select $sutun from $tablo where id=?");
                    $resim_adres->execute(array($id));
                    foreach($resim_adres as $adres)
                        $sonuc=$adres[$sutun];
                    unlink($sonuc);
                }

                $query = $db->prepare("delete from $tablo where id=?");
                $query->execute(array($id));
                break;
            case 'guncelle': // güncelleme
                $id = $_GET['id'];
                $sutun = $_GET['sutun'];
                $tablo = $_GET['tablo'];
                $deger = $_GET['deger'];
                $query = $db->prepare("update $tablo set $sutun=? where id=?");
                $query->execute(array($deger,$id));
                break;
            case 'kategori_ekle': // kategori ekleme
                $tablo = 'kategori';
                $isim = $_GET['isim'];
                $query = $db->prepare("insert into $tablo(isim) values (?)");
                $query->execute(array($isim));
                break;
            case 'kullanici_ekle': // kullanıcı ekleme
                $tablo = 'kullanici';
                $ad = $_GET['ad'];
                $soyad = $_GET['soyad'];
                $email = $_GET['email'];
                $sifre = $_GET['sifre'];
                $ceza_tarihi = date("Y-m-d");
                $aktif_kira_sayisi = '0';
                $query = $db->prepare("insert into $tablo(ad,soyad,email,sifre,ceza_tarihi,aktif_kira_sayisi) values (?,?,?,?,?,?)");
                $query->execute(array($ad,$soyad,$email,$sifre,$ceza_tarihi,$aktif_kira_sayisi));
                break;
            case 'yayinevi_ekle': // yayınevi ekleme
                $tablo = 'yayinevi';
                $isim = $_GET['isim'];
                $query = $db->prepare("insert into $tablo(isim) values (?)");
                $query->execute(array($isim));
                break;
            case 'kirala': // kitap kiralama
                $kitap_id = $_GET['id'];
                $kullanici_id = $_SESSION['kullanici_id'];
                $bugun = date("Y-m-d");
                $son_teslim = strtotime('20 day',strtotime($bugun)); //20 gün ekleme
                $son_teslim =  date('Y-m-d' ,$son_teslim );
                $query = $db->prepare("insert into kiralama(kullanici_id,kitap_id,kira_tarihi,son_teslim_tarihi,aktiflik) values (?,?,?,?,'1')");
                $query->execute(array($kullanici_id,$kitap_id,$bugun,$son_teslim));
                // kullanıcı kira sayısını arttırma
                $query2 = $db->query("select aktif_kira_sayisi from kullanici where id=$kullanici_id")->fetch(PDO::FETCH_ASSOC);
                $kullanici_kira_sayisi = $query2['aktif_kira_sayisi'];
                $kullanici_kira_sayisi+=1;        
                $query3 = $db->prepare("update kullanici set aktif_kira_sayisi=? where id=?");
                $query3->execute(array($kullanici_kira_sayisi,$kullanici_id));
                // kitap stok sayısını azaltma
                $query4 = $db->query("select stok from kitap where id=$kitap_id")->fetch(PDO::FETCH_ASSOC);
                $kitap_stok_sayisi = $query4['stok'];
                $kitap_stok_sayisi-=1;        
                $query5 = $db->prepare("update kitap set stok=? where id=?");
                $query5->execute(array($kitap_stok_sayisi,$kitap_id));
                $yonlendir = 'kitap';
                break;
            case 'teslim_et': // kitap teslim etme
                $kitap_id = $_GET['id'];
                $kira_id = $_GET['kira_id'];
                $kullanici_id = $_SESSION['kullanici_id'];
                $bugun = date("Y-m-d");
                $query = $db->prepare("update kiralama set aktiflik='0',teslim_edilme_tarihi=? where id=?");
                $query->execute(array($bugun,$kira_id));
                // kullanıcı kira sayısını azaltma
                $query2 = $db->query("select aktif_kira_sayisi from kullanici where id=$kullanici_id")->fetch(PDO::FETCH_ASSOC);
                $kullanici_kira_sayisi = $query2['aktif_kira_sayisi'];
                $kullanici_kira_sayisi-=1;        
                $query3 = $db->prepare("update kullanici set aktif_kira_sayisi=? where id=?");
                $query3->execute(array($kullanici_kira_sayisi,$kullanici_id));
                // kitap stok sayısını azaltma
                $query4 = $db->query("select stok from kitap where id=$kitap_id")->fetch(PDO::FETCH_ASSOC);
                $kitap_stok_sayisi = $query4['stok'];
                $kitap_stok_sayisi+=1;        
                $query5 = $db->prepare("update kitap set stok=? where id=?");
                $query5->execute(array($kitap_stok_sayisi,$kitap_id));
                // ceza gerekiyorsa uygulama
                $query6 = $db->query("select son_teslim_tarihi from kiralama where id=$kira_id")->fetch(PDO::FETCH_ASSOC);
                $son_teslim_tarihi = $query6['son_teslim_tarihi'];
                if($bugun>$son_teslim_tarihi) {                    
                    
                    $gun_fark = abs(strtotime($bugun)-strtotime($son_teslim_tarihi));
                    $gun_fark = $gun_fark/60/60/24;
                    $yeni_kullanici_ceza_tarihi = strtotime("$gun_fark day",strtotime($bugun));
                    $yeni_kullanici_ceza_tarihi =  date('Y-m-d' ,$yeni_kullanici_ceza_tarihi );
                    $query7 = $db->prepare("update kullanici set ceza_tarihi=? where id=?");
                    $query7->execute(array($yeni_kullanici_ceza_tarihi,$kullanici_id));
                    $_SESSION['kullanici_ceza_tarihi'] = $yeni_kullanici_ceza_tarihi;     
                }
                $yonlendir = 'kitap';
                break;
                case 'favla': // favori ekleme
                    $kitap_id = $_GET['id'];
                    $kullanici_id = $_SESSION['kullanici_id'];
                    $query = $db->prepare("insert into favori(kullanici_id,kitap_id) values (?,?)");
                    $query->execute(array($kullanici_id,$kitap_id));
                    $yonlendir = 'kitap';
                    break;
                case 'unfavla': // favori kaldırma
                    $favori_id = $_GET['id'];
                    $kitap_id = $_GET['kitap_id'];
                    $query = $db->prepare("delete from favori where id=?");
                    $query->execute(array($favori_id));
                    $yonlendir = 'kitap';
                    break;
        }
        if($yonlendir == 'kitap')
            header("refresh:0;url=../pages/kitapdetay.php?id=$kitap_id");
        else {
            $yonlendir = $tablo;
            header("refresh:0;url=../pages/panel.php#$yonlendir");
        }
    }

    if(isset($_POST['islem'])) { // POST
        switch($_POST['islem']) {
            case 'yazar_ekle': // yazar ekleme
                $tablo = 'yazar';
                $isim = $_POST['isim'];
                $ozgecmis = $_POST['ozgecmis'];
                //resim yükleme//
                $resim_isim = time();
                $resim_type = explode("/", $_FILES["dosya"]["type"])[1];
                $_FILES["dosya"]["name"] = "$resim_isim.$resim_type";
                $yol = "..\img\yazar";
                $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya"]["name"];
                move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);
                $resim = "$yol\\$resim_isim.$resim_type";
                //////
                $query = $db->prepare("insert into $tablo(isim,ozgecmis,resim) values (?,?,?)");
                $query->execute(array($isim,$ozgecmis,$resim));
                break;
            case 'kitap_ekle': // kitap ekleme
    $tablo = 'kitap';
    $isbn = $_POST['isbn'];
    $isim = $_POST['isim'];
    $stok = $_POST['stok'];
    $sayfa_sayisi = $_POST['sayfa_sayisi'];
    $ozet = $_POST['ozet'];
    $yazar_id = $_POST['yazar_id'];
    $yayinevi_id = $_POST['yayinevi_id'];
    $kategori_id = $_POST['kategori_id'];
    $ucret = $_POST['ucret'];
    
    //resim yükleme//
    if(isset($_FILES["dosya"]) && $_FILES["dosya"]["error"] == 0) {
        $resim_isim = time();
        $resim_type = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);
        $dosya_adi = $resim_isim . "." . $resim_type;
        $yol = "../img/kitap";
        $yuklemeYeri = $yol . "/" . $dosya_adi;
        if(move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri)) {
            $kapak = $yuklemeYeri;
        } else {
            $kapak = null; // veya varsayılan kapak
        }
    } else {
        $kapak = null;
    }
    
    $query = $db->prepare("insert into $tablo (isbn, isim, stok, sayfa_sayisi, ozet, yazar_id, yayinevi_id, kategori_id, kapak, ucret) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute(array($isbn, $isim, $stok, $sayfa_sayisi, $ozet, $yazar_id, $yayinevi_id, $kategori_id, $kapak, $ucret));
    break;

                
                
    
            case 'resim_guncelle': // resim güncelleme
                
                $id = $_POST['id'];
                $sutun = $_POST['sutun'];
                $tablo = $_POST['tablo'];
                unlink( $_POST['deger']); // eski resmi silme

                $resim_isim = time();
                $resim_type = explode("/", $_FILES["dosya"]["type"])[1];
                $_FILES["dosya"]["name"] = "$resim_isim.$resim_type";
                ($tablo == 'kitap') ? $yol = "..\img\kitap" : $yol = "..\img\yazar" ;
                $yuklemeYeri = __DIR__ . DIRECTORY_SEPARATOR . $yol . DIRECTORY_SEPARATOR . $_FILES["dosya"]["name"];
                move_uploaded_file($_FILES["dosya"]["tmp_name"], $yuklemeYeri);
                $deger = "$yol\\$resim_isim.$resim_type";
                
                $query = $db->prepare("update $tablo set $sutun=? where id=?");
                $query->execute(array($deger,$id));
                break;
            case 'hesap_bilgi_guncelle': // hesap bilgileri güncelleme
                
                $_SESSION['kullanici_ad'] = $_POST['ad'];
                $_SESSION['kullanici_soyad'] = $_POST['soyad'];
                $_SESSION['kullanici_email'] = $_POST['email'];
                $id = $_SESSION['kullanici_id'];
                $ad = $_POST['ad'];
                $soyad = $_POST['soyad'];
                $email = $_POST['email'];
                $query = $db->prepare("update kullanici set ad=?, soyad=?, email=? where id=?");
                $query->execute(array($ad,$soyad,$email,$id));
                $yonlendir = 'profil';
                break;
            case 'sifre_degistir': // şifre değiştirme
                
                $_SESSION['kullanici_sifre'] = $_POST['yenisifre'];
                $id = $_SESSION['kullanici_id'];
                $sifre = $_POST['yenisifre'];
                $query = $db->prepare("update kullanici set sifre=? where id=?");
                $query->execute(array($sifre,$id));
                $yonlendir = 'profil';
                break;            

        }
        if ( $yonlendir == 'profil')
            header("refresh:0;url=../pages/profil.php");
        else {
            $yonlendir = $tablo;
            header("refresh:0;url=../pages/panel.php#$yonlendir");
        }

    }
?>    
</body>
</html>