<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'nome' => 'required|string'
        ]);

        $inputs = $req->all();

        Classe::create($inputs);

        return redirect()->route('classes.index');
    }

    public function show($id)
    {
        $classe = Classe::with(['personagens'])->findOrFail($id);
        return view('classes.show', compact('classe'));
    }

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $req, $id)
    {
        $classe = Classe::findOrFail($id);
        $this->validate($req, [
            'nome' => 'required|string'
        ]);

        $inputs = $req->all();

        $classe->update($inputs);
        return redirect()->route('classes.index');
    }

    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        if ($classe) {
            $classe->delete();
        }

        return redirect()->route('classes.index');
    }
}
