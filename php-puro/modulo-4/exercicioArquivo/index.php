<?php
session_start();
if (isset($_SESSION['aviso'])) {
    echo $_SESSION['aviso'];
    session_destroy();
}
?>
<form action="adicionar.php" method="POST">
    <div>
        <label for="nome">Adicionar nome</label>
        <input type="text" name="nome" id="nome">
    </div>
    <button type="submit">Enviar</button>
</form>

<h1>Lista de nomes</h1>
<ul>
    <?php
    $lista = explode("\n", file_get_contents('nomes.txt'));
    foreach ($lista as $item) {
        if (!empty($item)) {
            echo "<li>{$item}</li>";
        }
    }
    ?>
</ul>