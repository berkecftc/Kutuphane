<?php 
include '../php/baglan.php'; 


// Kitap ID'yi al
if (!isset($_GET['id'])) {
    header('Location: kitaplar.php');
    exit;
}

$kitap_id = intval($_GET['id']);
$kitap = $db->query("SELECT * FROM kitap WHERE id = $kitap_id")->fetch(PDO::FETCH_ASSOC);

if (!$kitap) {
    header('Location: kitaplar.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ödeme Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .payment-form {
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="payment-form">
    <h2 class="text-center mb-4">Ödeme Yap</h2>
    <p><strong>Kitap:</strong> <?= htmlspecialchars($kitap['isim']) ?></p>
    <p><strong>Ücret:</strong> <?= htmlspecialchars($kitap['ucret']) ?> TL</p>
    <input type="hidden" name="ucret" value="<?= htmlspecialchars($kitap['ucret']) ?>">

    
    <form action="../php/odeme_kontrol.php" method="POST">
        <input type="hidden" name="kitap_id" value="<?= $kitap_id ?>">

        <div class="mb-3">
            <label class="form-label">Kart Numarası</label>
            <input type="text" name="kart_numara" class="form-control" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Son Kullanma Tarihi</label>
            <input type="text" name="son_kullanma" class="form-control" placeholder="AA/YY" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CVV</label>
            <input type="text" name="cvv" class="form-control" placeholder="123" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Ödeme Yap ve Kirala</button>
    </form>
</div>

</body>
</html>
