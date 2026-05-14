<?php
session_start();



$kullanici = isset($_POST['kullanici']) ? trim($_POST['kullanici']) : '';
$sifre     = isset($_POST['sifre'])     ? trim($_POST['sifre'])     : '';

$hatalar = [];

if (empty($kullanici)) {
    $hatalar[] = "Kullanıcı adı boş bırakılamaz.";
} elseif (!preg_match('/^[a-zA-Z0-9]{10,12}@sakarya\.edu\.tr$/', $kullanici)) {
    $hatalar[] = "Geçerli bir Sakarya Üniversitesi e-posta adresi giriniz.";
}

if (empty($sifre)) {
    $hatalar[] = "Şifre boş bırakılamaz.";
}

if (!empty($hatalar)) {
    $hata_str = implode('|', $hatalar);
    header("Location: login.html?hata=" . urlencode($hata_str));
    exit();
}

$ogrenci_no = explode('@', $kullanici)[0];

if ($sifre === $ogrenci_no) {
    $_SESSION['kullanici'] = $kullanici;
    $_SESSION['ogrenci_no'] = $ogrenci_no;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoş geldiniz</title>
  

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            display: flex; align-items: center; justify-content: center;
            min-height: 100vh; background-color: #EEDEDC;
            font-family: Arial, sans-serif;
        }
        .basari-kart {
            background: #f8c8dc; border-radius: 20px;
            padding: 50px 40px; text-align: center;
            box-shadow: 0 10px 20px rgba(204,125,200,0.2);
            max-width: 420px; width: 100%;
        }
        .check-icon {
            width: 60px; height: 60px; border-radius: 50%;
            background: #27ae60; color: white;
            font-size: 32px; display: flex;
            align-items: center; justify-content: center;
            margin: 0 auto 20px;
        }
        h1 { color: #362B1D; font-size: 1.5rem; margin-bottom: 10px; }
        .ogrenci-no {
            display: inline-block; background: #fde8f0;
            border: 1.5px solid #e0b8cc; border-radius: 50px;
            padding: 8px 20px; font-size: 1rem;
            font-weight: bold; color: #523352; margin: 14px 0;
        }
        p { color: #6b5c50; font-size: 0.9rem; margin-bottom: 24px; }
        a {
            display: inline-block; padding: 12px 28px;
            background: #c06080; color: white; border-radius: 10px;
            text-decoration: none; font-weight: bold; font-size: 0.9rem;
            transition: opacity 0.2s;
        }
        a:hover { opacity: 0.85; }
    </style>
</head>
<body>
<div class="basari-kart">
    <div class="check-icon">✓</div>
    <h1>Hoşgeldiniz</h1>
    <div class="ogrenci-no"><?php echo htmlspecialchars($ogrenci_no); ?></div>
    <p>Sisteme başarıyla giriş yaptınız.</p>
    <a href="index.html">Ana Sayfaya Git</a>
</div>
</body>
</html>
<?php
} else {
    header("Location: login.html?hata=" . urlencode("Kullanıcı adı veya şifre hatalı."));
    exit();
}
?>
