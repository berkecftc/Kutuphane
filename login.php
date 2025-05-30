<?php include 'php/baglan.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kütüphane Yönetim Sistemi</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Css-->
    <link rel="stylesheet" href="css/login.css">
    <style>
        /* Admin Giriş Butonu için CSS */
        .admin-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }
        .admin-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div id="kullanici-giris" class="login-box">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="islem" value="kullanici_giris">
            <input type="email" id="kullanici-mail" name="kullanici-mail" placeholder="Kullanıcı Email" required>
            
            <div class="input_group">
                <input type="password" id="kullanici-pswd" name="kullanici-pswd" placeholder="Parola" required>
                <i onClick="sifreGoster()" class="fa-regular fa-eye fa-lg"></i>
            </div>
            <button class="btn">Giriş Yap</button>
        </form>
        <p>Hesabın yok mu? <a id="kayit-form-ac" href="#">Kaydol</a></p>        
    </div>
    
    <div id="kullanici-kayit" class="login-box">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="islem" value="kullanici_ekle">
            <input type="text" id="kullanici-ad" name="kullanici-ad" placeholder="Ad" required>
            <input type="text" id="kullanici-soyad" name="kullanici-soyad" placeholder="Soyad" required>
            <input type="email" id="kullanici-mail" name="kullanici-mail" placeholder="E-mail" required>
            <input type="password" id="kullanici-pswd" name="kullanici-pswd" placeholder="Parola" required>
            <button type="submit" class="btn">Kaydol</button>
        </form>
        <p>Hesabın var mı? <a id="giris-form-ac" href="#">Giriş yap</a></p>        
    </div>

    <!-- Admin Girişi Butonu -->
    <button class="admin-btn" onclick="window.location.href='loginadmin.php'">Admin Girişi</button>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function kullaniciEkleAlert() {
            Swal.fire({
                title: 'Kullanıcı Eklendi',
                icon: 'success',
                showConfirmButton: false
            });
            setTimeout(function() {
                window.location.href = 'login.php'; 
            }, 1500);
        }

        function hataliGirisAlert() {
            Swal.fire({
                title: 'Hatalı Mail ya da Şifre',
                icon: 'warning',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Tamam'  
            })
        }

        function girisYap() {
            Swal.fire({
                title: 'Giriş Başarılı',
                icon: 'success',
                showConfirmButton: false
            });
            setTimeout(function() {
                window.location.href = 'pages/anasayfa.php'; 
            }, 1500);
        }
    </script>    

    <?php 
        if(isset($_POST['islem'])) {
            if($_POST['islem'] == 'kullanici_ekle') {
                $ad = $_POST['kullanici-ad'];
                $soyad = $_POST['kullanici-soyad'];
                $email = $_POST['kullanici-mail'];
                $sifre = $_POST['kullanici-pswd'];
                $query = $db->prepare("INSERT INTO kullanici(ad,soyad,email,sifre) VALUES (?,?,?,?)");
                $query->execute(array($ad,$soyad,$email,$sifre));
                echo '<script> kullaniciEkleAlert(); </script>';
            }
            if($_POST['islem'] == 'kullanici_giris') {
                $mail = $_POST['kullanici-mail'];
                $sifre = $_POST['kullanici-pswd'];
                $sorgu = $db->query("SELECT * FROM `kullanici` WHERE `email`='$mail'")->fetchAll(PDO::FETCH_ASSOC);
                if($sorgu == NULL || $sorgu[0]['sifre'] != $sifre)
                    echo '<script> hataliGirisAlert(); </script>';
                else {
                    $_SESSION['kullanici_id'] = $sorgu[0]['id'];
                    $_SESSION['kullanici_ad'] = $sorgu[0]['ad'];
                    $_SESSION['kullanici_soyad'] = $sorgu[0]['soyad'];
                    $_SESSION['kullanici_email'] = $sorgu[0]['email'];
                    $_SESSION['kullanici_sifre'] = $sorgu[0]['sifre'];
                    echo '<script> girisYap(); </script>';
                }
            }
        }
    ?>       

    <script>
        let girisForm = document.getElementById("kullanici-giris");
        let kayitForm = document.getElementById("kullanici-kayit");
        let body = document.querySelector("body");

        document.querySelector("#kayit-form-ac").addEventListener("click",kayitFormAc);
        document.querySelector("#giris-form-ac").addEventListener("click",girisFormAc);

        function kayitFormAc() {
            kayitForm.style.visibility = "visible";
            body.replaceChild(kayitForm,girisForm);
        }

        function girisFormAc() {
            body.replaceChild(girisForm,kayitForm);
        }
        
        let icon = document.querySelector(".fa-regular");
        let sifre_input = document.querySelector("#kullanici-pswd");
        function sifreGoster() {
            if(sifre_input.type == "password") {
                sifre_input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
            else {
                sifre_input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }            
        }        
    </script> 
</body>
</html>
