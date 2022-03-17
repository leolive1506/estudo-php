<?php 

namespace CodeExpress\Aritmetico;

use PHPUnit\Framework\TestCase;

class SubtracaoTest extends TestCase
{
    public function assertPreConditions(): void
    {
        $this->assertTrue(class_exists('CodeExpress\Aritmetico\Subtracao'));
    }
    
    public function testSubtracaoDoisNumeros() {
        $subtracao = new Subtracao();
        $subtracao->setNum1(15);
        $subtracao->setNum2(10);
        $this->assertSame(5, $subtracao->subtrair());
    }
    
 
    public function testValidSeValoresNaoForemPassados()
    {
        $subtracao = new Subtracao();
        $this->expectException(\InvalidArgumentException::class);
        $subtracao->setNum1(40);
        $subtracao->setNum2();
        $this->assertSame(5, $subtracao->subtrair());
    }
}