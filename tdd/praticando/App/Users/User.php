<?php 
namespace App\Users;

class User
{
    private $users = ['Daniel', 'Douglas', 'Leonardo'];
    private $usersData = [
        [
            'nome' => 'Daniel',
            'cpf' => '123412341243'
        ], 
        [
            'nome' => 'Douglas',
            'cpf' => '432112341243'
        ], 
        [
            'nome' => 'Leonardo',
            'cpf' => '098712341243'
        ]
    ];

    public function getUsers()
    {
        return $this->users;
    }

    public function getUsersData()
    {
        return $this->usersData;
    }

    public function setUsersData($array)
    {
        array_unshift($this->usersData, $array);
    }

    public function setUsers($userTexto)
    {
        array_unshift($this->users, $userTexto);
    }

    public function findUserByIndex($index)
    {
        return $this->users[$index];
    }

    public function findUserNameDataByIndex($index)
    {
        return $this->usersData[$index]['nome'];
    }

    public function showUsersData()
    {
        foreach($this->usersData as $index => $user) {
            echo "<p>{$index}: {$user}</p>".PHP_EOL;
        }
    }

    public function showUsers()
    {
        foreach($this->users as $index => $user) {
            echo "<p>{$index}: {$user}</p>".PHP_EOL;
        }
    }
}