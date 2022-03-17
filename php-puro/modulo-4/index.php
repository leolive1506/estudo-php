<?php
session_start();
require('header.php');

if(isset($_SESSION['aviso'])) {
    echo $_SESSION['aviso'];
    $_SESSION['aviso'] = null;
}

$texto = file_get_contents('texto.txt');
// echo $texto;
$texto .= "\nLeonardo Lopes";
file_put_contents('nome.txt', $texto);
?>

<a href="apagar.php">Apagar cookie</a>

<form action="recebedor.php" method="POST">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </div>

    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade">
    </div>
    <button type="submit">Enviar</button>
</form>

<p><?php $texto ?></p>