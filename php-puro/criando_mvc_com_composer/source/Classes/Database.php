<?php 
namespace App\Classes;

use PDO;

class Database extends PDO {
    private $db_engine = 'mysql';
    private $db_name = 'curso_php';
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_password = 'root';

    private PDO $pdo;
    
    public function __construct() 
    {
        $this->pdo = new PDO("{$this->db_engine}:dbname={$this->db_name};host={$this->db_host}", "{$this->db_user}", "{$this->db_password}");
    }

    public function getDriver()
    {
        return $this->pdo;
    }

}