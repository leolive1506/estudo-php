<?php 
class Basico1 {
    public function somar($x, $y) {
        return $x + $y;
    }
}

class Basico2 {
    public function somar($x, $y) {
        $res = $x;
        for($q = 0; $q < $y; $q++) {
            $res++;
        }
        return $res;
    }
}

class Matematica {
    private $basico;
    public function __construct($b) {
        $this->basico = $b;
    }

    public function somar($x, $y) {
        return $this->basico->somar($x, $y);
    }
}

$mat = new Matematica(new Basico1());
echo $mat->somar(10, 15) . '</br>';

interface DatabaseInterface {
    public function listar();
}

class Database {
    private $engine;
    public function __construct(DatabaseInterface $eng) {
        $this->engine = $eng;
    }

    public function listar() {
        return $this->engine->listar();
    }
}

class MysqlEngine implements DatabaseInterface {
    public function listar() {
        echo 'oi mysql';
    }
}

class MongoDBEngine implements DatabaseInterface {
    public function listar() {
        echo 'oi mongoDB';
    }
}

$db = new Database(new MysqlEngine());
$db->listar();