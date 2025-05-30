<?php include '../php/baglan.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profil.css">    
</head>
<body>
    <?php include 'header.php';?> 

    <div class="container">
        <div class="sidebar">
            <a href="#" id="hesapbilgi" onclick="takas(hesapbilgi)"><i class="fa-solid fa-gear fa-xl"></i>Hesap Bilgilerim</a>
            <a href="#" id="sifredegistir" onclick="takas(sifredegistir)"><i class="fa-sharp fa-solid fa-key fa-xl"></i>Şifre Değiştir</a>
            <a href="#" id="favoriler" onclick="takas(favoriler)"><i class="fa-heart fa-solid fa-key fa-xl"></i>Favoriler</a>
            <a href="#" id="gecmiskiralamalar" onclick="takas(gecmiskiralamalar)"><i class="fa-solid fa-clock-rotate-left fa-xl"></i>Geçmiş Kiralamalar</a>
        </div>
        <div class="hesapbilgi"> <!-- hesapbilgi -->
            <div class="grup">
                <label>Ad:</label>
                <label><?= $_SESSION['kullanici_ad'] ?></label>
            </div>
            <div class="grup">
                <label>Soyad:</label>
                <label><?= $_SESSION['kullanici_soyad'] ?></label>
            </div>
            <div class="grup">
                <label>E-mail:</label>
                <label><?= $_SESSION['kullanici_email'] ?></label>
            </div>
            <div class="grup">
    <label>Ceza Durumu:</label>
    <?php
        if (isset($_SESSION['kullanici_ceza_tarihi']) && !empty($_SESSION['kullanici_ceza_tarihi'])) {
            $ceza_tarihi = $_SESSION['kullanici_ceza_tarihi'];
            $ceza_tarihi_formatli = explode("-", $ceza_tarihi);
            $ceza_tarihi_formatli = "$ceza_tarihi_formatli[2]/$ceza_tarihi_formatli[1]/$ceza_tarihi_formatli[0]";
            $ceza_durumu = (date("Y-m-d") >= $ceza_tarihi) ? 'Yok' : "$ceza_tarihi_formatli tarihine kadar cezalı";
        } else {
            $ceza_durumu = 'Ceza Durumu Bilgisi Yok';
        }
    ?>
    <label><?= $ceza_durumu ?></label>
</div>


    <div class="sifredegistir"> <!-- şifredeğiştir -->
        <form action="../php/islem.php" method="post" id="sifre_form">
            <input type="hidden" name="islem" value="sifre_degistir">       
            <input type="hidden" id="gerceksifre" value="<?= $_SESSION['kullanici_sifre'] ?>">       
            <label>Mevcut Şifre:</label>
            <div class="input_group">
                <input name="mevcutsifre" id="eskisifre" class="form-control" type="password" required>
                <i id="icon1" onclick="sifreGoster(eskisifre,icon1)" class="fa-regular fa-eye fa-2xl"></i>
            </div>
            <label>Yeni Şifre:</label>
            <div class="input_group">            
                <input name="yenisifre" id="sifre1" class="form-control" type="password" required>
                <i id="icon2" onclick="sifreGoster(sifre1,icon2)" class="fa-regular fa-eye fa-2xl"></i>
            </div>
            <label>Yeni Şifre Tekrarı:</label>
            <div class="input_group">
                <input name="yenisifretekrar" id="sifre2" class="form-control" type="password" required>
                <i id="icon3" onclick="sifreGoster(sifre2,icon3)" class="fa-regular fa-eye fa-2xl"></i>
            </div>
            <div class="uyari mb-2" style="color:red"></div>        
            <button id="sifre_buton" onClick="sifre_kontrol()" type="button" class="btn btn-primary" disabled>Güncelle</button>
        </form>
    </div>

    <?php
        $kullanici_id = $_SESSION['kullanici_id'];
        $query_fav = $db->query("select * from favori 
        where kullanici_id=$kullanici_id order by id desc")->fetchAll(PDO::FETCH_ASSOC);        
    ?>

    <div class="favoriler"> <!-- favoriler -->
        <?php foreach($query_fav as $fav) {?>
            <div class="kitap_box">
                <?php
                    $kitap_id = $fav['kitap_id'];
                    $kitap = $db->query("select kitap.*, yazar.isim as yazar_isim, 
                    yayinevi.isim as yayinevi_isim from ((kitap inner join yazar on kitap.yazar_id = yazar.id) 
                    inner join yayinevi on kitap.yayinevi_id = yayinevi.id) 
                    where kitap.id=$kitap_id")->fetch(PDO::FETCH_ASSOC);
                ?>
                <img src="<?= str_replace('\\','/',$kitap['kapak']) ?>" alt="kitap">
                <div class="kitap_bilgi">
                    <h5><?= $kitap['isim'] ?></h5>
                    <p><?= $kitap['yazar_isim'] ?></p>
                    <p><?= $kitap['yayinevi_isim'] ?></p>
                    <a href="kitapdetay.php?id=<?= $kitap['id']?>" class="btn btn3 btn-primary">İncele</a>
                </div>
            </div>
        <?php } ?>
    </div>
    
    <?php
        $kullanici_id = $_SESSION['kullanici_id'];
        $kiralamalar = $db->query("select kiralama.*,kitap.isim as kitap_isim from 
        (kiralama inner join kitap on kiralama.kitap_id=kitap.id) 
        where kullanici_id=$kullanici_id order by id desc")->fetchAll(PDO::FETCH_ASSOC);        
    ?>

    <div class="gecmiskiralamalar"> <!-- geçmişkiralamalar -->            
        <table class="table table-bordered table-dark table-hover m-2 text-center">
            <thead>
                <tr>
                    <th>Kitap Adı</th> <th>Kira Tarihi</th> <th>Son Teslim Tarihi</th> <th>Teslim Tarihi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($kiralamalar as $kiralama) { $kitap_id = $kiralama['kitap_id'] ?>
                <tr>
                    <?php
                        $kira_tarihi = explode("-", $kiralama['kira_tarihi']);
                        $kira_tarihi = "$kira_tarihi[2]/$kira_tarihi[1]/$kira_tarihi[0]";
                        $son_teslim_tarihi = explode("-", $kiralama['son_teslim_tarihi']);
                        $son_teslim_tarihi = "$son_teslim_tarihi[2]/$son_teslim_tarihi[1]/$son_teslim_tarihi[0]";
                        $teslim_edilme_tarihi = explode("-", $kiralama['teslim_edilme_tarihi']);
                        $teslim_edilme_tarihi = "$teslim_edilme_tarihi[2]/$teslim_edilme_tarihi[1]/$teslim_edilme_tarihi[0]";
                    ?>
                    <td><?= $kiralama['kitap_isim'] ?></td> 
                    <td><?= $kira_tarihi ?></td> 
                    <td><?= $son_teslim_tarihi ?></td> 
                    <td>
                        <?= ($kiralama['teslim_edilme_tarihi']!='0000-00-00') 
                                ? $teslim_edilme_tarihi 
                                : ('<button onClick="yonlendir('.$kitap_id.')" class="btn btn-success">Teslim Et</button>') ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- popup -->
    <div class="overlay">
        <div class="popup text-center">
            <h2>Hesap Bilgileri</h2>
            <form  action="../php/islem.php" method="post" class="m-5">
                <input type="hidden" name="islem" value="hesap_bilgi_guncelle">
                <div class="form-group">
                    <label>Ad</label>
                    <input type="text" name="ad" class="form-control" value="<?= $_SESSION['kullanici_ad'] ?>">
                </div>
                <div class="form-group">
                    <label>Soyad</label>
                    <input type="text" name="soyad" class="form-control" value="<?= $_SESSION['kullanici_soyad'] ?>">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="<?= $_SESSION['kullanici_email'] ?>">
                    </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <button onClick="popupKapat()" class="btn btn-danger">İptal</button>
            </form>
        </div>
    </div>

    <!--JS-->
    <script src="../js/global.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let hesapbilgi = document.querySelector(".hesapbilgi");
        let sifredegistir = document.querySelector(".sifredegistir");
        let favoriler = document.querySelector(".favoriler");
        let gecmiskiralamalar = document.querySelector(".gecmiskiralamalar");        

        let container = document.querySelector(".container");
        
        function takas(eklenecek) {
            eklenecek.style.visibility = "visible";
            eklenecek.style.position = "relative";
            container.replaceChild(eklenecek,container.lastElementChild);
        }

        let popup = document.querySelector(".overlay");   

        function popupAc() {            
            popup.style.visibility = "visible";
            popup.style.display = "block";
        }

        function popupKapat() {
            popup.style.visibility = "hidden";
            popup.style.display = "none";            
        };

        let gercek_sifre = document.querySelector("#gerceksifre");
        let mevcut_sifre = document.querySelector("#eskisifre");
        let sifre1 = document.querySelector("#sifre1");
        let sifre2 = document.querySelector("#sifre2");
        let sifre_buton = document.querySelector("#sifre_buton");
        let uyari = document.querySelector(".uyari");
        var mesaj = document.createElement("small");
        mesaj.textContent = "Yeni şifre eşleşmiyor";

        sifre1.addEventListener("keyup", ayni_mi);
        sifre2.addEventListener("keyup", ayni_mi);

        function ayni_mi() {
            if(sifre1.value == sifre2.value && sifre1.value != ''){
                sifre_buton.removeAttribute("disabled");
                uyari.removeChild(mesaj);
            }
            else {
                sifre_buton.setAttribute("disabled","");
                uyari.appendChild(mesaj);
            }
        }

        function sifre_kontrol() {
            if(mevcut_sifre.value == gercek_sifre.value) { // şifre doğruysa
                Swal.fire({
                    title: 'Güncelleme Başarılı',
                    icon: 'success',
                    showConfirmButton: false
                });
                setTimeout(function() {
                    var form = document.querySelector("#sifre_form"); 
                    var gonder_buton = document.createElement("button");
                    gonder_buton.type = "submit";
                    form.appendChild(gonder_buton);
                    gonder_buton.click();
                }, 1500);
            }
            else { // şifre yanlışsa
                Swal.fire({
                title: 'Şifre Yanlış',
                icon: 'warning',
                showConfirmButton: false,
                timer: 900
                });
            }
        }

        function yonlendir(id) {
            window.location.href = "kitapdetay.php?id="+id;
        }
        
        var icon1 = document.querySelector("#icon1");
        var icon2 = document.querySelector("#icon2");
        var icon3 = document.querySelector("#icon3");
        var sifre_input1 = document.querySelector("#eskisifre");
        var sifre_input2 = document.querySelector("#sifre1");
        var sifre_input3 = document.querySelector("#sifre2");
        function sifreGoster(input,icon) {
            if(input.type == "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
            else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }            
        }       
    </script>    
</body>
</html>