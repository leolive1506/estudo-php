<?php 
$hash = '$2y$10$y3KuA1E18xFsQMK35E/e/OtKNGHZVsF/yRW5AOzEdYaS0bxaMeSmi';
$senha = '1234';

if(password_verify($senha, $hash)) {
    echo 'ok';
}