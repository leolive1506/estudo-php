<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function checar_se_colunas_user_esta_correta()
    {
        $user = new User();
        $expected = [
            'name',
            'email',
            'password',
        ];
        $arrayCompared = array_diff($expected, $user->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
