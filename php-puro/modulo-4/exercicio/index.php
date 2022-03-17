<?php 
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<p>
    Olá <?php echo $_SESSION['user'] ?>
    <a href="deleteUser.php">Sair</a>
</p>