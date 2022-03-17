<?php 
session_start();
$lista = file_get_contents('nomes.txt');
$nome = filter_input(INPUT_POST, 'nome');
if(!$nome) {
    $_SESSION['aviso'] = 'Preencha';
    header('Location: index.php');
    exit;
}

$lista .= "\n{$nome}";
file_put_contents('nomes.txt', $lista);
header('Location: index.php');