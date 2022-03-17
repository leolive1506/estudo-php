<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    // criar os metodos(function) que voce dessejar
    // PODE OU NÃO representar uma rota

    // rota / metodo inicial ou para listar algo -> index

    public function index()
    {
        // sempre colocar nome class sem o parte "Controller" + nome da função (nesse caso index)
        // toda view deve está dentro da pasta resources/views e extensão .blade.php
        // blade -> template engine

        // paginainicial pasta
        // index arquivo index.blade.php
        return view("paginainicial.index");
    }

    public function sobre()
    {
        return view("paginainicial.sobre");
    }
}