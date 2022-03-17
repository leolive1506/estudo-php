<?php
setcookie('nome', null, time() - 3600);
header('Location: index.php');
exit;