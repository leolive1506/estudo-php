<?php 
require 'config.php';
require 'dao/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

function redirectErro() {
    header("Location: adicionar.php");
    exit;
} 

if($nome && $email) {
    if($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setEmail($email);
        $usuarioDao->create($novoUsuario);
        
        header("Location: index.php");
        exit;
    } else {
        redirectErro();
    }
    
} else {
    redirectErro();
}