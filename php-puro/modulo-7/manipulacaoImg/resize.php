<?php 
$arquivo = 'paisagem.jpeg';
$maxWith = 200;
$maxHeight = 200;

// pegar tamanho img
list($originalWith, $originalHeight) = getimagesize($arquivo);

// pegar proporção
$proporcao = $originalWith / $originalHeight;
$proporcaoDest = $maxWith / $maxHeight;

$finalWith = 0;
$finalHeight = 0;

if($proporcaoDest > $proporcao) {
    $finalWith = $maxHeight * $proporcao;
    $finalHeight = $maxHeight;
} else {
    $finalHeight = $maxWith / $proporcao;
    $finalWith = $maxWith;
}


// criar img
$imagem = imagecreatetruecolor($finalWith, $finalHeight);
$originalImg = imagecreatefromjpeg($arquivo);

// pegar img original, jogar na criada so que diminuida proporcionalmente
// imagecopyresampled($imagemQTaCriado, QuemTaCopiando, posicoesOriginais(x, y), posicoesFinais(x, y), tamanhoFinal, alturaFinal, originalwidth, originalheight)
imagecopyresampled(
    $imagem, $originalImg,
    0, 0, 0, 0,
    $finalWith, $finalHeight,
    $originalWith, $originalHeight
);

// salvar ou mostrar na tela
imagejpeg($imagem, 'imagem_nova.jpg', 100);