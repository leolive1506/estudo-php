<?php 

namespace App\Users;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
    public function testFindUserByIndex()
    {
        $user = new User();
        $this->assertEquals('Daniel', $user->findUserByIndex(0));
    }

    public function testIsArray()
    {
        $user = new User();
        $user->setUsers('Jurema');
        // ver se é do tipo array
        $this->assertIsArray($user->getUsers());
    }

    public function testSetUsersDataArray()
    {
        $user = new User();
        $user->setUsersData(['nome' => 'Leonildo', 'cpf' => '3333333']);
        $this->assertEquals('Leonildo', $user->findUserNameDataByIndex(0));
        // fwrite(STDERR, print_r($user->getUsersData(), TRUE));
    }

    public function testNotEmptyArrayUser()
    {
        $user = new User();
        $user->getUsers();
        $this->assertNotEmpty($user);
    }

    public function testCountUsers()
    {
        $user = new User();
        $this->assertContains('Leonardo', $user->getUsers());
    }

}