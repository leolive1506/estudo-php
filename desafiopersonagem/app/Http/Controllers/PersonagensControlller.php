<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Equipamento;
use App\Models\Personagem;
use App\Models\Raca;
use Illuminate\Http\Request;

class PersonagensControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personagens = Personagem::with(['raca', 'classe'])->get();

        $classes = Classe::all();
        $racas = Raca::all();
        return view('personagens.index', compact('personagens', 'racas', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $racas = Raca::all();
        $classes = Classe::all();
        return view('personagens.create', compact('racas', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req, [
            'nome' => 'required|string',
            'raca_id' => 'required|integer',
            'classe_id' => 'required|integer',
            'level_personagem' => 'required|integer',
            'observacoes' => 'nullable|string',
        ]);


        $inputs = $req->all();

        $personagem = Personagem::create($inputs);

        return redirect()->route('personagens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personagem = Personagem::findOrfail($id);
        $raca = Raca::findOrFail($personagem->raca_id);

        $classe = Classe::findOrFail($personagem->classe_id);

        $equipamentos = Equipamento::all();

        return view('personagens.show', compact('personagem', 'raca', 'classe', 'equipamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personagem = Personagem::find($id);
        $racas = Raca::all();
        $classes = Classe::all();

        return view('personagens.edit', compact('personagem', 'racas', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

        $this->validate($req, [
            'nome' => 'required|string',
            'raca_id' => 'required|integer',
            'classe_id' => 'required|integer',
            'level_personagem' => 'required|integer',
            'observacoes' => 'nullable|string'
        ]);

        $personagem = Personagem::findOrfail($id);

        if ($personagem) {
            $inputs = $req->all();

            $personagem->update($inputs);

            return redirect()->route('personagens.index');
        }

        return redirect()->route('personagens.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personagem = Personagem::findOrFail($id);
        if ($personagem) {
            $personagem->delete();
        }

        return redirect()->route('personagens.index');
    }
}

