<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use App\Models\Raca;
use Illuminate\Http\Request;

class RacasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $racas = Raca::all();
        return view('racas.index', compact('racas'));
    }

    public function create()
    {
        return view('racas.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'nome' => 'required|string',
        ]);

        $inputs = $req->all();


        Raca::create($inputs);

        return redirect()->route('racas.index');
    }

    public function edit($id)
    {
        $raca = Raca::findOrFail($id);

        return view('racas.edit', compact('raca'));
    }

    public function update(Request $req, $id)
    {
        $raca = Raca::findOrFail($id);
        $this->validate($req, [
            'nome' => 'required|string'
        ]);

        $inputs = $req->all();
        $raca->update($inputs);

        return redirect()->route('racas.index');
    }

    public function destroy($id)
    {
        $raca = Raca::findOrFail($id);
        if ($raca) {
            $raca->delete();
        }

        return redirect()->route('racas.index');
    }

    public function show($id)
    {
        $raca = Raca::with(['personagens'])->findOrFail($id);

        return view('racas.show', compact('raca'));
    }
}
