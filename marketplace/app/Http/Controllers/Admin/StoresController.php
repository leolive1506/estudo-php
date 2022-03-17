<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'desc')->paginate(10);
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        $users = User::all(['id', 'name']);
        return view('admin.stores.create', compact('users'));
    }

    public function store(Request $req)
    {
        $inputs = $req->all();
        $user = User::findOrFail($inputs['user']);
        // passando user como foreing key
        $store = $user->store()->create($inputs);

        request()->session()->flash('msg', 'Salvo com sucesso');

        return redirect()->route('stores.index');
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $users = User::all(['id', 'name']);
        return view('admin.stores.edit', compact('store', 'users'));
    }
    public function update(Request $req, $id)
    {
        $data = ($req->all());
        $store = Store::find($id);
        $store->update($data);

        request()->session()->flash('msg', 'Salvo com sucesso');

        return redirect()->route('stores.index');
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        request()->session()->flash('msg', 'Deletado com sucesso');

        return redirect()->route('stores.index');
    }
}
