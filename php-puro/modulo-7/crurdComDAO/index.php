<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);

$lista = $usuarioDao->findAll();

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
                <td><?= $user->getId() ?></td>
                <td><?= $user->getNome() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td>
                    <a href="editar.php?id=<?= $user->getId() ?>">Editar</a>
                    <a onclick="return confirm('Excluir?')" href="excluir.php?id=<?= $user->getId() ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
