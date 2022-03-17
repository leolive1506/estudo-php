<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database
{
    const HOST = 'localhost';
    const NAME = 'wdev_vagas';
    const USER = 'root';
    const PASSWORD = 'root';

    // nome da table a ser manipulada
    private $table;
    // instancia conexão com db
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection()
    {
        try{
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // não fazer isso em produção
            die('ERROR: '. $e->getMessage());
        }
    }


    /**
     * Métodos responsável por executar queries dentro do bando de dados
     */
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR:'. $e->getMessage());
        }
    }

    /**
     * @param array
     * @return integer id inserido
     */
    public function insert(array $values) {
        // dadis da query
        $fields = array_keys($values);
        $fieldsTable = ''. implode(',', $fields) .'';
        /**
         * pega um array com x posições, se não tiver, cria novas posições com padrão especifico
         * 
         * precisa de um array com mesmo numeros de posições do fields e caso não tiver, as posições novas vão ser '?'
         */
        $binds = array_pad([], count($fields), '?');
        $valuesFields = ''. implode(',', $binds) .'';

        $query = "INSERT INTO {$this->table} ({$fieldsTable}) VALUES ({$valuesFields})";

        $this->execute($query, array_values($values));
        return $this->connection->lastInsertId();
    }

    public function update(string $where, array $values)
    {
        // dados
        $fields = array_keys($values);
        $query = 'UPDATE '. $this->table .' SET '. implode('=?,', $fields) .'=? WHERE '. $where;
        
        // executar a query
        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where)
    {
        $query = 'DELETE FROM ' .$this->table . ' WHERE ' . $where;
        $this->execute($query);
        return true;
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        // dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'order by ' . $order : '';
        $limit = strlen($limit) ? 'limit ' . $limit : '';

        $query = 'SELECT '. $fields . 'FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($query);
    }

}
