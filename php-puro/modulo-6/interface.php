<?php 
interface Database {
    public function listar();
    public function alterar();
    public function adicionar();
}

class MysqlDB implements Database {
    public function listar() {
        echo 'listar com mysql';
    }

    public function alterar() {
        echo 'alterar com mysql';
    }

    public function adicionar() {
        echo 'adicionar com mysql';
    }
} 

class OracleDB implements Database {
    public function listar() {
        echo 'listar com Oracle';
    }

    public function alterar() {
        echo 'alterar com Oracle';
    }

    public function adicionar() {
        echo 'adicionar com Oracle';
    }
} 

$db = new OracleDB();
$db->adicionar();
