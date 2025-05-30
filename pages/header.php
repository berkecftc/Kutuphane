<header>
    <div class="search-box">               
        <input type="search" class="form-control" id="input">
        <button class="btn btnsearch" onClick="kitapAra()">
            <i class="fa fa-search fa-lg"></i>
        </button>
        <div class="profilbox">
            <i class="fa-regular fa-user fa-xl"></i>
            <label><?= $_SESSION['kullanici_ad'] ?></label>
            <i class="fa-solid fa-arrow-turn-down"></i>
            <div class="profilmenu">
                <a href="profil.php">Profilim</a>
                <a href="#" onClick="cikisYap()">Çıkış yap</a>
            </div>
        </div>
    </div>
            
    <nav class="navbar">
        <ul class="nav">
            <li class="nav-item"><a href="anasayfa.php" class="nav-link">Anasayfa</a></li>
            <li class="nav-item"><a href="kitapsec.php?page=1" class="nav-link">Kitap</a></li>
            <li class="nav-item"><a href="yazarsec.php" class="nav-link">Yazar</a></li>
            <li class="nav-item"><a href="yayinevisec.php" class="nav-link">Yayınevi</a></li>
        </ul>
    </nav>
</header>

<script>
    function kitapAra() {
        var string = document.getElementById("input").value;
        window.location.href = 'kitapsec.php?page=1&string='+string;
    }
</script>