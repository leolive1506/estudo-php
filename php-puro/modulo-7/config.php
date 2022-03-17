<?php 
$db_engine = 'mysql';
$db_name = 'curso_php';
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';

$pdo = new PDO("{$db_engine}:dbname={$db_name};host={$db_host}", "{$db_user}", "{$db_password}");