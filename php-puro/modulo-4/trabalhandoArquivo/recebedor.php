<?php
echo "<pre>";
print_r($_FILES);
// mover p sistema
if(in_array($_FILES['arquivo']['type'], array('image/jpeg', 'image/jpg', 'image/png'))) {
    $extensao = explode('.', $_FILES['arquivo']['name']);
    $nome = md5(time() . rand(0, 1000)) . ".{$extensao[1]}";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], "arquivos/{$nome}");
} else {
    echo 'Arquivo nao permitido';
}
