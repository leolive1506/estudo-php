<?php 
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('Location: index.php?status=error');
    exit;
}

$vaga = Vaga::getVaga($_GET['id']);
// validar a vaga se não for do tipo Vaga
if(!$vaga instanceof Vaga) {
    header('Location: index.php?status=error');
    exit;
}

if(isset($_POST['excluir']))  {
    $vaga->excluir();
    header('Location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';

