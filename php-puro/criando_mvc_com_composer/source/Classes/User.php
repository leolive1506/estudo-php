<?php 

namespace App\Classes;

class User {
    protected $id;
    protected $nome;
    protected $email;

    public function setId($id) 
    {
        $this->id = $id;
    }
    public function getId() 
    {
            return $this->id;
    }
    public function setNome($nome) 
    {
        $this->nome = $nome;
    }
    public function getNome() 
    {
        return $this->nome;
    }
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    public function getEmail() 
    {
        return $this->email;
    }
}