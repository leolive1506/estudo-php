<?php  
    $array = ['asd', 'ddd', 'kkkk'];
    $array2 = [
        ...$array,
        'leo lindo' . '</br>'
    ];

    print_r($array2) ;

$tipo = 'video';
switch($tipo) {
    case 'foto':
        echo 'Exibindo FOTO' . '</br>';
    break;
    case 'video':
        echo 'Exibindo video' . '</br>';
    break;
    case 'text':
        echo 'Exibindo texto' . '</br>';
    break;
}

for($i = 0; $i <= 10; $i++) {
    for($x = 0; $x <= 10; $x++) {
        echo '-';
    }
    echo '</br>';
}

for($i = 0; $i <= 10; $i++) {
    for($x = 0; $x <= $i; $x++) {
        echo '-';
    }
    echo '</br>';
}