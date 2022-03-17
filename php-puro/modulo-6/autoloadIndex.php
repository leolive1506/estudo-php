<?php
// require 'autoload_old.php';
require 'vendor/autoload.php';
use classes\matematica\Basico;
use classes\foto\Upload;

$m = new Basico();
echo $m->somar(10, 20) . '</br>';

$upload = new Upload();
echo $upload->chegou();


