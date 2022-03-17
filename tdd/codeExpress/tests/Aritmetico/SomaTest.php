<?php 

namespace CodeExpress\Aritmetico;

use PHPUnit\Framework\TestCase;

class SomaTest extends TestCase
{
    public function testSomaDoisNumeros() {
        $soma = new Soma();
        $soma->setNum1(10);
        $soma->setNum2(20);
        // $this->assertTrue(10 === $soma->somar());
        $this->assertEquals(10, $soma->somar());
    }

    

}