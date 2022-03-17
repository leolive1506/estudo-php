<?php 
class User {
    private string $nome;
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = ucfirst($nome);
    }
}

$user = new User();
$user->setNome('azeitoninha');

echo "Nome é {$user->getNome()}";