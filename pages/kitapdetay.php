<?php 
include '../php/baglan.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kitap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/kitapdetay.css">
    <script src="https://kit.fontawesome.com/3c7f8fcb44.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include 'header.php'; ?> 

<?php
$id = $_GET['id'];
$kitap_sorgu = $db->query("SELECT kitap.*, yazar.isim as yazar_isim, 
yayinevi.isim as yayinevi_isim, kategori.isim as kategori_isim FROM 
(((kitap 
INNER JOIN yazar ON kitap.yazar_id = yazar.id) 
INNER JOIN yayinevi ON kitap.yayinevi_id = yayinevi.id) 
INNER JOIN kategori ON kitap.kategori_id = kategori.id) 
WHERE kitap.id = $id")->fetchAll(PDO::FETCH_ASSOC);

$kitap = $kitap_sorgu[0];
$kullanici_id = $_SESSION['kullanici_id'];
$query_fav = $db->query("SELECT * FROM favori WHERE kullanici_id=$kullanici_id AND kitap_id=$id")->fetch(PDO::FETCH_ASSOC);
$favori = isset($query_fav['id']) ? $query_fav['id'] : '0';

$query = $db->query("SELECT aktif_kira_sayisi, ceza_tarihi FROM kullanici WHERE id=$kullanici_id")->fetch(PDO::FETCH_ASSOC);
$kullanici_kira_sayisi = $query['aktif_kira_sayisi'];
$ceza_tarihi = $query['ceza_tarihi'];

$query2 = $db->query("SELECT * FROM kiralama WHERE kullanici_id=$kullanici_id AND kitap_id=$id AND aktiflik='1'")->fetch(PDO::FETCH_ASSOC);
if ($query2) {
    $durum = $query2['aktiflik'];
    $son_tarih = date("d/m/Y", strtotime($query2['son_teslim_tarihi']));
} else {
    $durum = '0';
    $son_tarih = '0';
}
?>

<div class="container">
    <a href="#" onclick="fav(<?= $kitap['id'] ?>)"><i id="fav" class="fa-regular fa-heart fa-2xl"></i></a>
    <div class="img-box">
        <img src="<?= str_replace('\\', '/', $kitap['kapak']) ?>" alt="<?= $kitap['isim'] ?>">
    </div>
    <div class="info-box">
        <h1 class="w-75"><?= $kitap['isim'] ?></h1>
        <div class="baslik-info">
            <p><?= $kitap['yazar_isim'] ?></p>
            <p><?= $kitap['yayinevi_isim'] ?></p>
        </div>

        
        <div class="ozet">
            
            <div class="ozet" id="ozet-text">
    <p><?= htmlspecialchars($kitap['ozet']) ?></p>
</div>

<button id="sesliOzetBtn" class="btn btn-primary">Dinle</button>
<button id="sesliOzetPauseBtn" class="btn btn-secondary" style="display:none;">Duraklat</button>
<button id="sesliOzetResumeBtn" class="btn btn-success" style="display:none;">Devam Ettir</button>
<button id="sesliOzetStopBtn" class="btn btn-danger" style="display:none;">Durdur</button>

<script>
let utterance;
let isSpeaking = false;

const btnDinle = document.getElementById('sesliOzetBtn');
const btnDuraklat = document.getElementById('sesliOzetPauseBtn');
const btnDevam = document.getElementById('sesliOzetResumeBtn');
const btnDurdur = document.getElementById('sesliOzetStopBtn');

btnDinle.addEventListener('click', () => {
    if (!('speechSynthesis' in window)) {
        alert('Tarayıcınız sesli özet özelliğini desteklemiyor.');
        return;
    }

    if (!isSpeaking) {
        const metin = document.getElementById('ozet-text').innerText;
        utterance = new SpeechSynthesisUtterance(metin);
        utterance.lang = 'tr-TR';

        utterance.onend = () => {
            isSpeaking = false;
            toggleButtons(false);
        };

        speechSynthesis.speak(utterance);
        isSpeaking = true;
        toggleButtons(true);
    }
});

btnDuraklat.addEventListener('click', () => {
    if (speechSynthesis.speaking && !speechSynthesis.paused) {
        speechSynthesis.pause();
        togglePauseResumeButtons(true);
    }
});

btnDevam.addEventListener('click', () => {
    if (speechSynthesis.paused) {
        speechSynthesis.resume();
        togglePauseResumeButtons(false);
    }
});

btnDurdur.addEventListener('click', () => {
    if (speechSynthesis.speaking) {
        speechSynthesis.cancel();
        isSpeaking = false;
        toggleButtons(false);
    }
});

function toggleButtons(speaking) {
    btnDinle.style.display = speaking ? 'none' : 'inline-block';
    btnDuraklat.style.display = speaking ? 'inline-block' : 'none';
    btnDurdur.style.display = speaking ? 'inline-block' : 'none';
    btnDevam.style.display = 'none';
}

function togglePauseResumeButtons(paused) {
    btnDuraklat.style.display = paused ? 'none' : 'inline-block';
    btnDevam.style.display = paused ? 'inline-block' : 'none';
}

</script>

        </div>
        <div class="detay w-25" style="display:inline-table;">
            <div class="detay-group"><label>Kitap Adı:</label><p><?= $kitap['isim'] ?></p></div>
            <div class="detay-group"><label>Yazar:</label><p><?= $kitap['yazar_isim'] ?></p></div>
            <div class="detay-group"><label>Yayınevi:</label><p><?= $kitap['yayinevi_isim'] ?></p></div>
            <div class="detay-group"><label>Stok Adedi:</label><p><?= $kitap['stok'] ?></p></div>
            <div class="detay-group"><label>Sayfa Sayısı:</label><p><?= $kitap['sayfa_sayisi'] ?></p></div>
            <div class="detay-group"><label>ISBN:</label><p><?= $kitap['isbn'] ?></p></div>
        </div>

        <button onClick="kirala(<?= $kitap['id'] ?>, <?= $kullanici_kira_sayisi ?>, <?= $kitap['stok'] ?>, '<?= $ceza_tarihi ?>')" id="kira_buton" class="btn btn2 btn-danger">Kirala</button>
        <button onClick="teslimEt(<?= $query2['id'] ?? 0 ?>,<?= $kitap['id'] ?>)" id="teslim_buton" class="btn btn2 btn-success" style="display:none">Teslim Et</button>
    </div>
</div>

<div class="yorumlar">
    <h2>Yorumlar</h2>
    <form action="../php/yorum_ekle.php" method="POST">
        <input type="hidden" name="kitap_id" value="<?= $kitap['id'] ?>">
        <input type="hidden" name="kullanici_id" value="<?= $kullanici_id ?>">
        <div class="mb-3">
            <label for="yorum" class="form-label">Yorumunuz:</label>
            <textarea class="form-control" name="yorum_metni" id="yorum" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
    <hr>
    <?php
    $yorumlar = $db->query("SELECT y.yorum_metni, y.eklenme_tarihi, CONCAT(k.ad, ' ', k.soyad) AS kullanici_adi 
                            FROM yorumlar y 
                            INNER JOIN kullanici k ON y.kullanici_id = k.id 
                            WHERE y.kitap_id = $id 
                            ORDER BY y.eklenme_tarihi DESC")->fetchAll(PDO::FETCH_ASSOC);

    if (count($yorumlar) > 0) {
        foreach ($yorumlar as $yorum) {
            echo '<div class="yorum">';
            echo '<strong>' . htmlspecialchars($yorum['kullanici_adi']) . '</strong>';
            echo '<p>' . nl2br(htmlspecialchars($yorum['yorum_metni'])) . '</p>';
            echo '<small>' . date("d.m.Y H:i", strtotime($yorum['eklenme_tarihi'])) . '</small>';
            echo '</div><hr>';
        }
    } else {
        echo "<p>Henüz yorum yapılmamış. İlk yorumu sen yap!</p>";
    }
    ?>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function kirala(kitap_id, kullanici_kira_sayisi, stok, ceza_tarihi) {
    let hata = "yok";

    if (kullanici_kira_sayisi >= 3) {
        hata = "Aktif olarak en fazla 3 kiralama yapabilirsiniz.";
    } else if (stok == 0) {
        hata = "İstediğiniz kitap stokta mevcut değildir.";
    }

    const bugun = new Date();
    const bugunFormatted = bugun.toISOString().split('T')[0];

    if (ceza_tarihi > bugunFormatted) {
        let cezaFormatli = ceza_tarihi.split("-").reverse().join("/");
        hata = cezaFormatli + " tarihine kadar cezalısınız.";
    }

    if (hata !== "yok") {
        Swal.fire({
            title: "Kiralama Başarısız",
            text: hata,
            icon: "warning",
            confirmButtonText: "Tamam"
        });
    } else {
        window.location.href = "../php/odeme.php?id=" + kitap_id;
    }
}

function teslimEt(kira_id, kitap_id) {
    Swal.fire({
        title: "Teslim İşlemi Başarılı",
        icon: "success",
        showConfirmButton: false
    });
    setTimeout(function () {
        window.location.href = "../php/islem.php?islem=teslim_et&id=" + kitap_id + "&kira_id=" + kira_id;
    }, 1500);
}

function fav(kitap_id) {
    let fav_durum = <?= $favori ?>;
    if (fav_durum == 0) {
        window.location.href = "../php/islem.php?islem=favla&id=" + kitap_id;
    } else {
        window.location.href = "../php/islem.php?islem=unfavla&kitap_id=" + kitap_id + "&id=" + fav_durum;
    }
}

window.onload = function () {
    let fav_durum = <?= $favori ?>;
    if (fav_durum != 0) {
        document.querySelector("#fav").classList.replace("fa-regular", "fa-solid");
    }

    let kiralik_mi = <?= $durum ?>;
    if (kiralik_mi) {
        let kira_buton = document.querySelector("#kira_buton");
        let teslim_buton = document.querySelector("#teslim_buton");
        teslim_buton.style.display = "block";
        document.querySelector(".info-box").replaceChild(teslim_buton, kira_buton);

        let info = document.querySelector(".baslik-info");
        let baslik = document.createElement("h5");
        let mesaj = document.createElement("span");
        mesaj.textContent = "*Son teslim tarihi: <?= $son_tarih ?>";
        mesaj.classList.add("badge", "bg-secondary");
        mesaj.style.color = "black";
        baslik.appendChild(mesaj);
        info.appendChild(baslik);
    }
}
</script>

<?php
if (isset($_SESSION['sweet_alert'])) {
    $alert = $_SESSION['sweet_alert'];
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({title: '$alert[0]', text: '$alert[1]', icon: '$alert[2]', confirmButtonText: 'Tamam'});
        });
    </script>";
    unset($_SESSION['sweet_alert']);
}
?>

</body>
</html>
