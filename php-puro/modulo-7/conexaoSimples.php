<?php
require 'config.php';

$sql = $pdo->query('SELECT * FROM usuarios');
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "Total: {$sql->rowCount()}";

echo '<pre>';
print_r($dados);

