<?php

namespace App\Http\Controllers;

use App\Models\TipoEquipamento;
use Illuminate\Http\Request;

class TiposEquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoEquipamento::all();
        return view('tiposequipamentos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposequipamentos.create');
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
            'nome' => 'required|string'
        ]);

        $inputs = $req->all();
        $tipo = TipoEquipamento::create($inputs);

        return redirect()->route('tiposequipamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_atual = TipoEquipamento::findOrFail($id);
        return view('tiposequipamentos.edit', compact('tipo_atual'));
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
        $tipo_atual = TipoEquipamento::findOrFail($id);
        if($tipo_atual) {
            $inputs = $req->all();
            $tipo_atual->update($inputs);
        }
        return redirect()->route('tiposequipamentos.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_atual = TipoEquipamento::findOrFail($id);
        $tipo_atual->delete();
        return redirect()->route('tiposequipamentos.index');
    }
}
