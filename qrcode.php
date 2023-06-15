<?php
    $urlSistema = "http://localhost/login.html";
    $urlQRCode = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=" . urlencode($urlSistema);
?>
<!DOCTYPE html>
<html>
<head>
    <title>QR Code</title>
</head>
<body>
    <!-- Exibir a imagem do QR code diretamente na página -->
    <img src="<?php echo $urlQRCode; ?>" alt="QR Code">
</body>
</html>