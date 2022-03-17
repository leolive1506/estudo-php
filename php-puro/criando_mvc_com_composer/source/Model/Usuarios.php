<?php 

namespace App\Model;

use App\Classes\User;
use PDO;

class Usuarios {
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }
    
    public function index() 
    {
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
            // somente realizar essa operação se for realmente necessáriot ter o obj
            foreach($data as $item) {
                $user = new User();
                $user->setId($item['id']);
                $user->setNome($item['nome']);
                $user->setEmail($item['email']);
                $array[]  = $user;
            }
        }
        return $array;
    }

    public function create(User $user)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) values (:nome, :email)");

        $sql->bindValue(":nome", $user->getNome());
        $sql->bindValue(":email", $user->getEmail());
        $sql->execute();
    }
}