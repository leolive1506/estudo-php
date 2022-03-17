<?php 
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if($id) {
    $usuarioDao->delete($id);
}

header("Location: index.php");
exit;
?>