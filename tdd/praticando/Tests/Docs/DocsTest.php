<?php 

namespace App\Docs;

use PHPUnit\Framework\TestCase;

class DocsTest extends TestCase
{
    public function testContainsArray()
    {
        $this->assertContains(3, [1, 2, 3]);
    }
    // public function testContainsText()
    // {
    //     $this->assertContains('baz', 'foobar');
    // }

    public function testAzeitona()
    {
        $this->assertContains('foo', ['foo'], '', true);
    }

    public function testFailure()
    {
        $this->assertContainsOnly('int', [1, 2]);
    }

    public function testCount()
    {
        $this->assertCount(2, ['foo', 'asdfasdf', 'asdfds']);
    }
}
