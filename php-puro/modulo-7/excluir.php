<?php 
require 'config.php';


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id) {
    $sql=$pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();
}

header("Location: index.php");
exit;
?>