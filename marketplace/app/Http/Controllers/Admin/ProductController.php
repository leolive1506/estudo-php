<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    // faz
    // new ProductController(new Product());
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->orderBy('id', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $stores = Store::all(['id', 'name']) ;
        return view('admin.products.create', compact('stores'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $store = Store::findOrFail($data['store']);
        $store->products()->create($data);
        request()->session()->flash('msg', 'Salvo com sucesso');
        return redirect()->route('products.index');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = $this->product->find($id);
        $product->update($data);
        request()->session()->flash('msg', 'Salvo com sucesso');
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {

    }
}
