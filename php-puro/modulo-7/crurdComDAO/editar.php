<?php 
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

function redirectErro() {
    header("Location: index.php");
    exit;
}

$usuario = false;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id) {
    $usuario = $usuarioDao->findById($id);
} 

if($usuario === false) {
    redirectErro();
}

?>
<h1>Editar Usuário</h1>
<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $usuario->getNome(); ?>">
    </div>

    <div>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="<?= $usuario->getEmail(); ?>">
    </div>
    <button type="submit">Salvar</button>
</form>