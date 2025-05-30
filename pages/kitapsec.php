<?php include '../php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitap Seç</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/kitapsec.css">
</head>
<body>
    <?php include 'header.php';?> 

    <?php
        $kategori_sorgu = "";
        $yayinevi_sorgu = "";
        $yazar_sorgu = "";
        $string="";
        $toplam_sorgu="";
        if(isset($_GET['kategori'])) {
            $kategori_filtre = $_GET['kategori'];
            foreach($kategori_filtre as $filtre) 
                $kategori_sorgu = "$kategori_sorgu or kategori_id=$filtre";
            $kategori_sorgu = substr($kategori_sorgu,3);
            $toplam_sorgu = "WHERE ($kategori_sorgu)";
        }
        if(isset($_GET['yayinevi'])) {
            $yayinevi_filtre = $_GET['yayinevi'];
            foreach($yayinevi_filtre as $filtre) 
                $yayinevi_sorgu = "$yayinevi_sorgu or yayinevi_id=$filtre";
            $yayinevi_sorgu = substr($yayinevi_sorgu,3);
            if($kategori_sorgu =="")
                $toplam_sorgu = "WHERE ($yayinevi_sorgu)";
            else
                $toplam_sorgu = "$toplam_sorgu and ($yayinevi_sorgu)";
        }
        if(isset($_GET['yazar'])) {
            $yazar_filtre = $_GET['yazar'];
            foreach($yazar_filtre as $filtre) 
                $yazar_sorgu = "$yazar_sorgu or yazar_id=$filtre";
            $yazar_sorgu = substr($yazar_sorgu,3);
            if($kategori_sorgu =="" && $yayinevi_sorgu =="")
                $toplam_sorgu = "WHERE ($yazar_sorgu)";
            else
                $toplam_sorgu = "$toplam_sorgu and ($yazar_sorgu)";
        }
        if(isset($_GET['string'])) {
            $string = $_GET['string'];
            if($toplam_sorgu == "")
                $toplam_sorgu = "WHERE kitap.isim LIKE '%$string%'";
            else
                $toplam_sorgu = "$toplam_sorgu and kitap.isim LIKE '%$string%'";
        }

        if(isset($_GET['siralama'])) {
            switch($_GET['siralama']) {
                case '1':
                    $siralama = "order by kitap.id desc";
                    break;
                case '2':
                    $siralama = "order by kitap.id asc";
                    break;
                case '3':
                    $siralama = "order by kitap.isim asc";
                    break;
                case '4':
                    $siralama = "order by kitap.isim desc";
                    break;
            }
        }
        else {
            $_GET['siralama'] = '1';
            $siralama = "order by kitap.id desc";
        }

         $kitaplar = $db->query("SELECT kitap.*, yazar.isim as yazar_isim, 
         yayinevi.isim as yayinevi_isim, yazar.isim as yazar_isim
         FROM ((kitap inner join yazar on kitap.yazar_id = yazar.id) 
         inner join yayinevi on kitap.yayinevi_id = yayinevi.id) $toplam_sorgu 
         $siralama")->fetchAll(PDO::FETCH_ASSOC);

         $kategoriler = $db->query('SELECT * FROM kategori')->fetchAll(PDO::FETCH_ASSOC);
         $yayinevleri = $db->query('SELECT * FROM yayinevi')->fetchAll(PDO::FETCH_ASSOC);
         $yazarlar = $db->query('SELECT * FROM yazar')->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="filter-menu w-25">
            <div class="baslik" onclick="listeAcKapat('kategori-liste')">
                <h5>Kategori</h5>
                <i class="fa-solid fa-arrow-turn-down fa-lg mt-3"></i>
            </div>
            <ul id="kategori-liste">
                <?php foreach($kategoriler as $kategori) { ?>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="<?= $kategori['id'] ?>" value="kategori">
                        <label class="form-check-label" for="<?= $kategori['isim'] ?>"><?= $kategori['isim'] ?></label>
                    </li>
                <?php } ?>
            </ul>
            <div class="baslik" onclick="listeAcKapat('yayinevi-liste')">
                <h5>Yayınevi</h5>
                <i class="fa-solid fa-arrow-turn-down fa-lg mt-3"></i>
            </div>
            <ul id="yayinevi-liste">
                <?php foreach($yayinevleri as $yayinevi) { ?>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox" id="<?= $yayinevi['id'] ?>" value="yayinevi">
                        <label class="form-check-label"><?= $yayinevi['isim'] ?></label>
                    </li>
                <?php } ?>
            </ul>
            <div class="baslik" onclick="listeAcKapat('yazar-liste')">
                <h5>Yazar</h5>
                <i class="fa-solid fa-arrow-turn-down fa-lg mt-3"></i>
            </div>
            <ul id="yazar-liste">
                <?php foreach($yazarlar as $yazar) { ?>
                    <li class="form-check">
                        <input class="form-check-input" type="checkbox"  id="<?= $yazar['id'] ?>" value="yazar">
                        <label class="form-check-label"><?= $yazar['isim'] ?></label>
                    </li>
                <?php } ?>
            </ul>
            <button onclick="filtrele()" class="btn btnmini">Filtrele</button>
        </div>

        <div class="book-menu w-75">
            <div class="head">
                <h5>
                    <?php if($string!="") echo ("'$string' araması için");
                    ?>
                    <?= count($kitaplar) ?> kitap  listelenmektedir.
                </h5>
                <select class="form-select selectbar">
                    <option value="1" <?php if($_GET['siralama']=='1') echo 'selected' ?>>
                        Yayın Tarihi (Yeni-Eski)
                    </option>
                    <option value="2" <?php if($_GET['siralama']=='2') echo 'selected' ?>>
                        Yayın Tarihi (Eski-Yeni)
                    </option>
                    <option value="3" <?php if($_GET['siralama']=='3') echo 'selected' ?>>
                        Kitap Adı (A-Z)
                    </option>
                    <option value="4" <?php if($_GET['siralama']=='4') echo 'selected' ?>>
                        Kitap Adı (Z-A)
                    </option>
                </select>
            </div>
            <?php            
                    $baslangic=0;
                    $sayfa=1;
                    $son_sayfa = ceil(count($kitaplar)/9);
                    if(isset($_GET['page'])) {
                        $sayfa = $_GET['page'];
                        $baslangic = ($sayfa-1)*9;
                    }
                    $bitis = $baslangic + 9;
                    if(count($kitaplar)<$bitis)
                        $bitis = count($kitaplar);
                    for($i=$baslangic;$i<$bitis;$i++) { ?>
                <a class="book-group" href="kitapdetay.php?id=<?= $kitaplar[$i]['id'] ?>">
                    <img src="<?= str_replace('\\','/',$kitaplar[$i]['kapak']) ?>" alt="<?= $kitaplar[$i]['isim'] ?>">
                    <h5><?= $kitaplar[$i]['isim'] ?></h5>
                    <small><?= $kitaplar[$i]['yazar_isim'] ?></small>
                    <small><?= $kitaplar[$i]['yayinevi_isim'] ?></small>                
                </a>
            <?php } ?>

            <nav class="paging_nav">
                <?php 
                    $komut_satiri = "";
                    $komutlar = explode("&",$_SERVER['REQUEST_URI']);
                    for($i=1; $i<count($komutlar); $i++)
                        $komut_satiri = "$komut_satiri&$komutlar[$i]";
                ?>
                <ul class="pagination">
                    <!-- geri butonu -->
                    <li class="page-item <?php if($sayfa==1) echo 'disabled'?>">
                    <a class="page-link" href="kitapsec.php?page=<?=$sayfa-1?><?=$komut_satiri?>"><i class="fa-solid fa-angle-left"></i></a>
                    </li>
                    <?php
                        $link = $sayfa - 1;
                        //önceki butonu
                        if($sayfa!=1)
                            echo ('<li class="page-item">
                                    <a class="page-link" href="kitapsec.php?page='.$link.''.$komut_satiri.'">'.$link.'</a>
                                  </li>');
                        //şuanki butonu
                        echo ('<li class="page-item active">
                                    <a class="page-link" href="#">'.$sayfa.'</a>
                                </li>');
                        //sonraki butonu
                        $link = $sayfa + 1;
                        if($sayfa!=$son_sayfa)
                            echo ('<li class="page-item">
                                    <a class="page-link" href="kitapsec.php?page='.$link.''.$komut_satiri.'">'.$link.'</a>
                                  </li>');
                    ?>
                    <!-- ileri butonu-->
                    <li class="page-item <?php if($son_sayfa==$sayfa) echo 'disabled'?>">
                    <a class="page-link" href="kitapsec.php?page=<?=$sayfa+1?><?=$komut_satiri?>"><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let selectbar = document.querySelector(".selectbar");
        selectbar.addEventListener("change", function() {
            var adres = window.location.href;
            if(adres.includes("&siralama"))
                adres = adres.split("&siralama")[0];
            (adres.includes("?")) ? adres+="&" : adres+="?";
            adres += "siralama=" + selectbar.value;
            window.location.href = adres;
        });
        
        function listeAcKapat(parametre) {
            let liste = document.getElementById(parametre);
            if(liste.style.visibility == "hidden") {
                liste.style.visibility = "visible";
                liste.style.position = "relative";
            }
            else {
                liste.style.visibility = "hidden";
                liste.style.position = "absolute";
            }
        }

        function filtrele() {
            let kategoriler = Array.from(document.querySelectorAll("#kategori-liste>li>input"));
            var checkbox;
            let kategori_filtre = [];
            var query1 = "";
            var sayac = 0;            
            kategoriler.forEach(function(value) {
                checkbox = document.getElementById(value.id);
                if(checkbox.value == "kategori" && checkbox.checked == 1)
                    kategori_filtre.push(value.id);
            });
            kategori_filtre.forEach(function(value) {
                query1 += "&kategori["+sayac+"]="+value;
                sayac++;
            });
            
            let yayinevleri = Array.from(document.querySelectorAll("#yayinevi-liste>li>input"));
            let yayinevi_filtre = [];
            var query2 = "";
            sayac = 0;            
            yayinevleri.forEach(function(value) {
                checkbox = document.getElementById(value.id);
                if(checkbox.value == "yayinevi" && checkbox.checked == 1)
                    yayinevi_filtre.push(value.id);
            });
            yayinevi_filtre.forEach(function(value) {
                query2 += "&yayinevi["+sayac+"]="+value;
                sayac++;
            });

            let yazarlar = Array.from(document.querySelectorAll("#yazar-liste>li>input"));
            let yazar_filtre = [];
            var query3 = "";
            sayac = 0;            
            yazarlar.forEach(function(value) {
                checkbox = document.getElementById(value.id);
                if(checkbox.value == "yazar" && checkbox.checked == 1)
                    yazar_filtre.push(value.id);
            });
            yazar_filtre.forEach(function(value) {
                query3 += "&yazar["+sayac+"]="+value;
                sayac++;
            });
            window.location.href = 'kitapsec.php?page=1'+query1+query2+query3;
        }
    </script>
</body>
</html>