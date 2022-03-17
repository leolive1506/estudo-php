<?php 
session_start();
if(isset($_SESSION['aviso'])) {
    echo "<p>{$_SESSION['aviso']}</p>";
    session_destroy();
}
?>
<form action="recebedor.php" method="POST">
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">
    </div>
    <button type="submit">Salvar</button>
</form>

