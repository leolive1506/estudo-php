<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TarefasController extends Controller
{
    public function index()
    {
        // $list = DB::select('SELECT * FROM tarefas');
        // $list = DB::select('SELECT * FROM tarefas WHERE resolvido = :status', ['status' => 0]);
        $list = Tarefa::all();

        return view('tarefas.index', compact('list'));
    }

    public function create()
    {

        $permissao = [
            'campoView' => Gate::allows('nome-do-campo')
        ];

        return view('tarefas.create', $permissao);
    }

    public function store(Request $req)
    {
        // com validate volta pra pag anterior caso de erro e com msg de erro prontas
        $req->validate([
            'titulo' => 'required|string'
        ]);

        // DB::insert('INSERT INTO tarefas (titulo) values (:titulo)', ['titulo' => $titulo]);


        $titulo = $req->input('titulo');

        $tarefa = new Tarefa;
        $tarefa->titulo = $titulo;
        $tarefa->save();


        return redirect()->route('tarefas.index');
    }

    public function edit($id)
    {
        // $data = DB::select('SELECT * from tarefas where id = :id', [
        //     'id' => $id
        // ]);

        $data = Tarefa::find($id);

        if ($data) {
            return view('tarefas.edit', [
                'data' => $data
            ]);
        } else {
            return redirect()->route('tarefas.index');
        }
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'titulo' => 'required|string'
        ]);

        $titulo = $req->all();

        // DB::update('UPDATE tarefas set titulo = :titulo where id = :id', [
        //     'titulo' => $titulo,
        //     'id' => $id
        // ]);

        Tarefa::findOrFail($id)->update($titulo);

        return redirect()->route('tarefas.index');
    }

    public function destroy($id)
    {
        // DB::delete('DELETE FROM tarefas WHERE id = :id', [
        //     'id' => $id
        // ]);

        Tarefa::findOrFail($id)->delete();

        return redirect()->route('tarefas.index');
    }

    public function done($id)
    {
        // duas opçoes
        // 1. select + update
        // 2. update matemático
        // DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
        //     'id' => $id
        // ]);

        $t = Tarefa::find($id);
        if ($t) {
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }

        return redirect()->route('tarefas.index');
    }
}