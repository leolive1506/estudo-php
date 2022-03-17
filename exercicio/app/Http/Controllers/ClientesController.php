<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    public function index(Request $req)
    {
        $busca = null;

        $option = null;

        if ($req->has('q')) {
            $busca = $req->get('q');
        }

        if ($req->has('option')) {
            $option = $req->get('option');
        }



        $clientes = Cliente::when($busca, function ($query) use ($busca, $option) {
            return $query->where($option, 'like', '%' . $busca . '%');
        })
            ->orderBy('nome', 'asc')
            ->get();

        return view("clientes.index", compact("clientes"));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'data_de_nascimento' => 'required|string',
            'telefone' => 'required|string',
            'observacoes' => 'nullable|string'
        ]);

        $inputs = $request->all();

        $client = Cliente::create($inputs);

        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'data_de_nascimento' => 'required|string',
            'telefone' => 'required|string',
            'observacoes' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            request()->session()->flash('status', 'error');
            request()->session()->flash('mensagem', 'Problema na validação dos dados');

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $clientes = Cliente::findOrFail($id);

        $inputs = $request->all();

        $clientes->update($inputs);

        request()->session()->flash('status', 'success');
        request()->session()->flash('mensagem', 'Post atualizado');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        request()->session()->flash('status', 'success');
        request()->session()->flash('mensagem', "Post excluído");

        return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', compact('cliente'));
    }
}