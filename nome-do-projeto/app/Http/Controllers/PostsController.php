<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        // buscar tudo
        // $posts = Post::all();

        $busca = null;

        // o valor / parametro do has é o name do input enviado
        // nesse caso busca é o name do input de busca do form
        if ($request->has('busca')) {
            $busca = $request->get('busca');
        }

        // select * from posts where titulo = 'fulano'

        // asc ou desc
        // faz o where sempre e não é bom
        // $posts = Post::where('titulo', 'like', '%' . $busca . '%')
        //     ->orderBy('id', 'desc')
        //     ->get();


        // faz a busca so se a variavel informada no when não tiver null ou em branco
        // use ($variavel) é pra passar a variavel dentro de uma função anônima
        $posts = Post::when($busca, function ($query) use ($busca) {
            return $query->where('titulo', 'like', '%' . $busca . '%')
                ->orWhere('conteudo', 'like', '%' . $busca . '%');
        })
            ->orderBy('id', 'desc')
            ->get();
        return view('posts.index', compact('posts'));
        // nome da variavel sem "$" que será enviada para a view
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // 1) validar os dados
        // 'nome_do_campo' => 'regras' (oq ele espera)
        $this->validate($request, [
            'titulo' => 'required|string',
            'conteudo' => 'required|string',
            'tags' => 'nullable|string'
        ]);

        // Request $request
        // req do tipo request
        //Obj(TIpo) $variavel

        // todo put ou post tem qeu ter um request
        // dd console.log laravel
        // dd($request->all());





        // 2) pegar todos os campos
        $inputs = $request->all();

        // mostrando tudo que está dentro do array
        // dd($inputs);

        // somente a chave/index/posição de um array pelo name (do input)
        // dd($inputs['titulo']);



        // 3) criar obj para salvar no banco
        // pegar o model($post) e chamar a função create
        $post = Post::create($inputs);
        // $post = Post::create([
        //     // 'campo no banco' => da onde esta vindo o valor
        //     'titulo' => $inputs['titulo'],
        //     'conteudo' => $inputs['conteudo'],
        //     'tags' => $inputs['tags']
        // ]);

        // $post = new Post();

        // $post->titulo = $inputs['titulo'];
        // $post->conteudo = $inputs['conteudo'];
        // $post->tags = $inputs['tags'];
        // $post->save();

        // dd($post);

        // redirecionar o usuário para algum lugar após a ação
        // quando salvar (store)
        // quando atualizar (update)
        // quando excluir (destroy)
        // redirecionar o user para a página de listagem

        // redirecionar

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string',
            'conteudo' => 'required|string',
            'tags' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            request()->session()->flash('status', 'error');
            request()->session()->flash('mensagem', 'Problema na validação dos dados.');

            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request->all(), $id);

        // ver se o id existe
        // firstOrFail - tenta buscar o id
        $post = Post::findOrFail($id);

        $inputs = $request->all();
        // atualizar

        /*
            1º maneira
            $post->titulo = $inputs['titulo'];
            tds os demais campos
            $post->save()
        */

        $post->update($inputs);

        request()->session()->flash('status', 'success');

        // flash message
        request()->session()->flash('mensagem', 'Post atualizado com sucesso');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        request()->session()->flash('status', 'success');
        request()->session()->flash('mensagem', 'Post excluído com sucesso');

        return redirect()->route('posts.index');
    }
}