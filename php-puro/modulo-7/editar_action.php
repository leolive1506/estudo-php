<?php 
require 'config.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

function redirectErro() {
    header("Location: adicionar.php");
    exit;
} 

if($id && $nome && $email) {
    // UPDATE usuarios SET nome = '...', email = '... where id = '...'
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":id", $id);
    $sql->execute();
    header('Location: index.php');
    exit;
    
} else {
    redirectErro();
}