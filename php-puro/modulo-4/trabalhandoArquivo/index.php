<?php 
session_start();
if(isset($_SESSION['aviso'])) {
    echo $_SESSION['aviso'];
    session_destroy();
}
if(isset($_SESSION['salvo'])) {
    echo $_SESSION['salvo'];
    session_destroy();
}
?>
<form action="recebedor.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="arquivo">Selecione o arquivo</label>
        <input type="file" name="arquivo" id="arquivo">
    </div>
    <button type="submit">Enviar</button>
</form>