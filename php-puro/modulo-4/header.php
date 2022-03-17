<h1>Cabeçalho</h1>
<?php 
if(isset($_COOKIE['nome'])) {
    echo "<h2>{$_COOKIE['nome']}</h2>";
}
?>
<hr>