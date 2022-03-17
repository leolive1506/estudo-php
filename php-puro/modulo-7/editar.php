<?php 
require 'config.php';

function redirectErro() {
    header("Location: index.php");
    exit;
}

$info = [];
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id) {
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        // fetch pega o primeiro item
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
         redirectErro();
    }
} else {
    redirectErro();
}
?>
<h1>Editar Usuário</h1>
<form action="editar_action.php" method="POST">
    <input type="hidden" name="id" value="<?= $info['id'] ?>">
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $info['nome'] ?>">
    </div>

    <div>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="<?= $info['email'] ?>">
    </div>
    <button type="submit">Salvar</button>
</form>