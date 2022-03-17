<?php
namespace CodeExpress\Aritmetico;

class Subtracao
{
    private $num1;
    private $num2;

    public function getNum1() {
        return $this->num1;
    }

    public function setNum1($num1 = null) {
        if(is_null($num1)) {
            throw new \InvalidArgumentException("Parametro nao informado");
        }
        $this->num1 = $num1;
    }

    public function getNum2() {
        return $this->num2;
    }

    public function setNum2($num2 = null) {
        if(is_null($num2)) {
            throw new \InvalidArgumentException("Parametro nao informado");
        }
        $this->num2 = $num2;
    }

    public function subtrair()
    {
        return $this->num1 - $this->num2;
    }
}