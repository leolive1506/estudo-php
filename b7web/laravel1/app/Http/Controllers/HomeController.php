<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        Tarefa::where('resolvido', 1)->update([
            'resolvido' => 0
        ]);

        echo "Deletado mermão";
    }
}