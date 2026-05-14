<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: iletisim.html");
    exit;
}

$ad = $_POST["ad"] ?? "";
$email = $_POST["email"] ?? "";
$telefon = $_POST["telefon"] ?? "";
$konu = $_POST["konu"] ?? "";
$cinsiyet = $_POST["cinsiyet"] ?? "";
$tercihler = $_POST["tercihler"] ?? [];
$mesaj = $_POST["mesaj"] ?? "";
$onay = isset($_POST["onay"]) ? "Kabul edildi" : "Kabul edilmedi";

function temizle($veri) {
    return htmlspecialchars(trim($veri));
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>İletişim Formu Sonuçları</title>
    <link rel="stylesheet" href="css/iletisim.css">
</head>
<body>

<div class="iletisim-sayfa">
    <div class="form-kutusu">
        <h1>Gönderilen Form Bilgileri</h1>

        <p><strong>Ad Soyad:</strong> <?php echo temizle($ad); ?></p>
        <p><strong>E-posta:</strong> <?php echo temizle($email); ?></p>
        <p><strong>Telefon:</strong> <?php echo temizle($telefon); ?></p>
        <p><strong>Konu:</strong> <?php echo temizle($konu); ?></p>
        <p><strong>Cinsiyet:</strong> <?php echo temizle($cinsiyet); ?></p>

        <p><strong>İletişim Tercihleri:</strong>
            <?php
            if (!empty($tercihler)) {
                echo temizle(implode(", ", $tercihler));
            } else {
                echo "Seçilmedi";
            }
            ?>
        </p>

        <p><strong>Mesaj:</strong><br>
            <?php echo nl2br(temizle($mesaj)); ?>
        </p>

        <p><strong>KVKK Onayı:</strong> <?php echo $onay; ?></p>

        <br>
        <a href="iletisim.html">İletişim Sayfasına Geri Dön</a>
    </div>
</div>

</body>
</html>