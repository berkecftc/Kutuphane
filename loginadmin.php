<?php include 'php/baglan.php'?>
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
        .kullanici-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            color: white;
            border: none;
            background-color: #dc3545;
            z-index: 999;
        }

        .kullanici-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>    

    <div id="admin-giris" class="login-box">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="text" id="admin-no" name="admin-no" placeholder="Admin Adı" required>
            <input type="password" id="admin-pswd" name="admin-pswd" placeholder="Parola" required>
            <button class="btn">Giriş Yap</button>
        </form>
    </div>
    
    <!-- Kullanıcı Girişi Butonu -->
    <button class="kullanici-btn" onclick="window.location.href='login.php'">Kullanıcı Girişi</button>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- alertler -->
    <script type="text/javascript">
        function alertHata() {
            Swal.fire({
                title: 'Hatalı Giriş',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Tamam'  
            })
        }

        function alertGiris() {
            Swal.fire({
                title: 'Giriş Başarılı',
                icon: 'success',
                showConfirmButton: false
            });
            setTimeout(function() {
                window.location.href = 'pages/panel.php';
            }, 1000);
        }
    </script>    

    <?php 
        if(isset($_POST['admin-no']) && isset($_POST['admin-pswd'])){ // kontrol
            $id = $_POST['admin-no'];
            $sifre = $_POST['admin-pswd'];
            if($id == 'admin' && $sifre == '1234')
                echo '<script> alertGiris(); </script>';
            else{
                echo '<script> alertHata(); </script>';
            }
        }
    ?>
      
</body>
</html>
