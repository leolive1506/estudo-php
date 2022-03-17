<?php
require 'config.php';
$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionar.php">Adicionar Usuário</a>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($lista as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['nome'] ?></td>
                <td><?= $user['email'] ?></td>
                <td>
                    <a href="editar.php?id=<?= $user['id'] ?>">Editar</a>
                    <a onclick="return confirm('Excluir?')" href="excluir.php?id=<?= $user['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
