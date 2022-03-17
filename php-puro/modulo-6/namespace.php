<?php 
require 'classes/matematica/Basico.php';

require 'classe1.php';
require 'classe2.php';
use classes\matematica\Basico as Basico;

$a = new classe1\MinhaClasse();
echo $a->testar();

$basico = new Basico();
$basico->oi();