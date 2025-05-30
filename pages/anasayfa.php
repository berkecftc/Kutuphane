<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anasayfa</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/anasayfa.css">
</head>
<body>
<?php include 'header.php';?>   

<?php 
    $kitaplar = $db->query("select * from kitap order by id desc limit 5")->fetchAll(PDO::FETCH_ASSOC);
    $yazarlar = $db->query("select * from yazar order by id desc limit 3")->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">

    <!--  Son Çıkanlar -->
    <div class="kitaplar">
        <div class="baslik">
            <h3>Son Çıkanlar</h3>
            <a href="kitapsec.php?page=1">Tümünü Göster</a>
        </div>
        <div class="kitap">
            <?php foreach($kitaplar as $kitap) {  ?>
                <a href="kitapdetay.php?id=<?= $kitap['id'] ?>" style="background-image: url('<?= str_replace('\\','/',$kitap['kapak']) ?>');"></a>
            <?php } ?>
        </div>        
    </div>

    <!--  Yazarlar -->
    <div class="yazarlar">
        <div class="baslik">
            <h3>Yazarlar</h3>
            <a href="yazarsec.php">Tümünü Göster</a>
        </div>
        <div class="yazar">
            <?php foreach($yazarlar as $yazar) {  ?>
                <a href="yazardetay.php?id=<?= $yazar['id'] ?>">
                    <img src="<?= str_replace('\\','/',$yazar['resim']) ?>" alt="">
                    <h5><?= $yazar['isim'] ?></h5>
                </a>
            <?php } ?>
        </div>
    </div>

    <!--  Bu Ay En Çok Favori Eklenen Kitaplar -->
    <div class="favoriler">
    <div class="baslik">
        <h3>Bu Ay En Çok Favorilere Eklenen Kitaplar</h3>
    </div>
    <div class="kitap-liste">
        <?php
        $sql = "SELECT k.*, COUNT(f.id) as favori
                FROM favori f
                JOIN kitap k ON f.kitap_id = k.id
                GROUP BY f.kitap_id
                ORDER BY favori DESC
                LIMIT 3";
        $enCokFavori = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($enCokFavori as $kitap) {
        ?>
        <div class="kitap-kart">
            <img src="<?= str_replace('\\','/',$kitap['kapak']) ?>" alt="">
            <h6><?= $kitap['isim'] ?></h6>
            <p>Favori Sayısı: <?= $kitap['favori'] ?></p>
            <a href="kitapdetay.php?id=<?= $kitap['id'] ?>" class="btn btn-outline-primary btn-sm">Detaylar</a>
        </div>
        <?php } ?>
    </div>
</div>







<!--JS-->
<script src="../js/global.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

<div class="kitap-gorsel"></div>




</body>
</html>
