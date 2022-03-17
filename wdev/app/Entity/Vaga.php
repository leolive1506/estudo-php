<?php 
namespace App\Entity;

use App\Db\Database;
use PDO;

class Vaga {
    public int $id;
    public $titulo;
    public $descricao;
    public $ativo;
    public $data;

    public function cadastrar()
    {
        $this->data = date('Y-m-d H:i:s');
        $db = new Database('vagas');
        $this->id = $db->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data,
        ]);
        
        header('location: index.php?status=success');
        exit;
    }

    /**
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('vagas'))->update('id = '. $this->id, [
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data,
        ]);
    }

    public function excluir()
    {
        return (new Database('vagas'))->delete('id = '. $this->id);
    }

    public static function getVagas($where = null, $order = null, $limit = null)
    {
        return (new Database('vagas'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        // TIPO FETCH DE CLASSES, TIPO DE OBJ
    }

    public static function getVaga(int $id) 
    {
        // fetchObject unitario onde pega apenas uma posição
        return (new Database('vagas'))->select('id = '. $id)
            ->fetchObject(self::class);
    }
}