<?php

$arquivo = 'paisagem.jpg'; // Imagem
$width = 100; //largura
$height = 100; //altura

list($originalWidth, $originalHeigth) = getimagesize($arquivo);// vai pegar os dois valores de altura e largura da imagem

$ratio = $originalWidth / $originalHeigth;
$ratioDest = $width / $height;

$finalWidth = 0;
$finalHeight = 0;
$finalX = 0;
$finalY = 0;

if($ratioDest > $ratio) {
    $finalWidth = $height * $ratio;
    $finalHeight = $height;

}else{
    $finalHeight = $width / $ratio;
    $finalWidth = $width;
}

if($finalWidth < $width){
    $finalWidth = $width;
    $finalHeight = $width / $ratio;

    $finalY = - (($finalHeight - $height) / 2);
}else{
    $finalHeight = $height;
    $finalWidth = $height * $ratio;
    $finalX = - (($finalWidth - $width) /2);
}

$imagem = imagecreatetruecolor($width, $height);
$originalImg = imagecreatefromjpeg($arquivo);

imagecopyresampled($imagem, 
    $originalImg, 
    $finalX, $finalY, 0, 0, 
    $finalWidth, 
    $finalHeight, 
    $originalWidth,
    $originalHeigth
);

header("content-type: image/jpeg");
imagejpeg($imagem, null, 100);