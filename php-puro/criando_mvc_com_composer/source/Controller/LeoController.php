<?php

namespace App\Controller;

use App\Classes\Database;
use App\Classes\User;
use App\Controller\Controller;
use App\Model\Usuarios;


class LeoController extends Controller{
    public static function index()
    {
        $db = (new Database)->getDriver();
        $users = (new Usuarios($db))->index();
        return self::view('userDB/index', ['users' => $users]);
    }

    public static function create()
    {
        $user = new User();
        $user->setNome(filter_input(INPUT_POST, 'nome'));
        $user->setEmail(filter_input(INPUT_POST, 'email'));
        $db = (new Database)->getDriver();
        (new Usuarios($db))->create($user);
        self::redirect('/users');
        
    }
    
}