<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yazar</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/yazardetay.css">
</head>
<body>
    <?php include 'header.php';?> 

    <?php
        $id = $_GET['id'];
        $yazarlar = $db->query("select * from yazar where id=$id")->fetchAll(PDO::FETCH_ASSOC);
        $yazar = $yazarlar[0];
        $kitaplar = $db->query("select kitap.*, yayinevi.isim as yayinevi_isim, 
        kategori.isim as kategori_isim from 
        ((kitap inner join yayinevi on kitap.yayinevi_id = yayinevi.id) 
        inner join kategori on kitap.kategori_id = kategori.id) where yazar_id=$id")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="biyografi-box">
            <img src="<?= str_replace('\\','/',$yazar['resim']) ?>" alt="<?= $kitap['isim'] ?>">
            <h3><?= $yazar['isim'] ?></h3>
            <p id="ozgecmis-baslik">Özgeçmiş</p>
            <p id="ozgecmis-info"> <?= $yazar['ozgecmis'] ?> </p>
        </div>
        <div class="eserler-box">
            <h5>Toplam <?= count($kitaplar) ?> kitap bulunmaktadır.</h5>
            <a id="yonlendir" href="kitapsec.php?page=1&yazar[0]=<?= $yazar['id']?>">Tümünü Göster</a>
            <?php for($i=0;$i<5;$i++) { if(isset($kitaplar[$i])) {?> 
                <div class="eser-box">
                    <img src="<?= str_replace('\\','/',$kitaplar[$i]['kapak']) ?>" alt="kitap">
                    <div class="eser-info">
                        <h5><?= $kitaplar[$i]['isim'] ?></h5>
                        <p><?= $kitaplar[$i]['kategori_isim'] ?></p>
                        <p><?= $kitaplar[$i]['yayinevi_isim'] ?></p>
                        <a href="kitapdetay.php?id=<?= $kitaplar[$i]['id']?>" class="btn btn3 btn-primary">İncele</a>
                    </div>
                </div>
            <?php } } ?>            
        </div>
    </div>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
</body>
</html>