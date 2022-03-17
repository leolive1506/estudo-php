<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $req)
    {
        $nome = $req->input('nome', 'Leo');
        $idade = $req->input('idade', '17');
        $estado = $req->input('estado');

        $lista = [
            ['nome' => 'ovo', 'qt' => '2'],
            ['nome' => 'leite', 'qt' => '1'],
            ['nome' => 'farinha', 'qt' => '3'],
            ['nome' => 'manteiga', 'qt' => '1/2'],
            ['nome' => 'oleo', 'qt' => '2'],
        ];

        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'estado' => $estado,
            'lista' => $lista
        ];



        return view('admin.config', $data);
    }



    public function info()
    {
        echo 'info';
    }

    public function permissoes()
    {
        echo 'permissoes';
    }
}