<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yayınevi</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/yazarsec.css">
</head>
<body>    
    <?php include 'header.php';?> 

    <?php
        $yayinevleri = $db->query("select * from yayinevi order by id desc")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <h1>Yayınevleri</h1>
        <p><?= count($yayinevleri)?> Yazar Listelenmektedir.</p>
        <div class="container liste w-75">
            <ul>
                <?php foreach($yayinevleri as $yayinevi) { ?>
                    <li><a href="yayinevidetay.php?id=<?= $yayinevi['id']?>"><?= $yayinevi['isim']?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>