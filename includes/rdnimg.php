<?php
session_start();

if (!empty($_SESSION['rand_code'])) {
    unset($_SESSION['rand_code']);
}   

if (empty($_SESSION['rand_code'])) {
    $str = "";
    $a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($i = 0; $i <= 10; $i++) {
        $str.= $a[rand(0, 61)];
    }
    $_SESSION['rand_code'] = $str;
}

header('Content-Type: image/png');
$im = imagecreatetruecolor(120, 30);

// Colores
$color_fondo = imagecolorallocate($im, 240, 240, 240); // Fondo gris claro
$color_texto = imagecolorallocate($im, 0, 100, 200);   // Texto azul

// Rellenar fondo
imagefill($im, 0, 0, $color_fondo);

// Dibujar texto
imagestring($im, 10, 5, 5, $str, $color_texto);

imagepng($im);
imagedestroy($im);
?>
