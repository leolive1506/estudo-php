<?php 
session_start();
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
if($nome) {
    $_SESSION['user'] = $nome;
    header('Location: index.php');
    exit;
} else {
    $_SESSION['aviso'] = 'Preecha seu nome';
    header('Location: login.php');
    exit;
}
