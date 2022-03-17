# instalando laravel do composer de forma global para rodar comandos em qualquer pasta
```sh
composer global require laravel/installer
```

# Erro que pode dar
* Extensão do php zip não esta instalada
* Requerida no laravel
	* Habilitar a extensão

* Testar se esta tudo certo, digitar no terminal "laravel" sem as aspas
* Caso de erro ao digitar 
	*[Ir aqui](https://wallacemaxters.com.br/blog/2021/02/19/resolvendo-o-erro-laravel-comando-nao-encontrado)

# Criar um projeto laravel
laravel new nome_do_projeto

# Configs básicas
* Pastas
    * app
        * Código principal e lógicos do sistema
    * bootstrap
        * sistema de inicialização, onde começa a estrutura do laravel
    * config
        * arquivos de config sobre a própria aplicação
    * database
        * migrations -> pasta "mais importante"
    * public
        * Acessivel ao lado de fora do servidor, os que a pessoa podem acessar
    * resources (recursos)
        * js, lang, sass, views
        * onde vai ficar html, js, arquivos de linguagens
    * routes
        * Onde ficam as rotas (web)
            * rotas -> as url possiveis
        * web -> rotas que funcionam para a internet
            * seção, cookie
        * api 
            * rotas que não vao utilizar cookies, seção
            * Quando estiver fazendo uma api
        * console
            * usando laravel como terminal de comando
        * channels
            * quando tiver usando canais de broadcasting
            * integração sookets

    * storage
        * Se relaciona com database
        * Pode colocar arquivos gerados pelo user 
    * tests
        * Testes da aplicação
    * vendor
        * pasta do composer

* Assim qeu criar o projeto precisa criar uma aplication key
```sh
php artisan key:generate
```
    * Dentro de .env gera uma chava no APP_KEY=

* .env
    * Banco de dados
    * As configurações feitas vão para a pasta config -> database.php
        * Configurar os database, senha, user
    


# Módulo 2 (Rotas, controllers, views)
* Quando que so mostrar algo na tela
```php
Route::view('/teste', 'nome_da_view');
// mesma coisa que isso
Route::get('/teste', function() {
    return view('nome_da_view');
})
```
* Redirecionara para uma rota
```php
Route::redirect('/', '/teste');

Route::view('/teste', 'nome_da_view');
```

* Rotas com parâmetros
```php
// tudo que colocar após slug, é mostrado a pag 
Route::get('/caminho/{variavel}', function ($variavel) {
    echo "TITULO: " . $variavel;
});

Route::get('caminho/{variavel}/comentario/{id}', function ($variavel, $id) {
    echo "mostrando comentário: $variavel do ID: $id";
});
```

* Rotas com Regex + Provider
```php
// where('nome_do_campo', 'validação')

Route::get('/user/{name}', function ($name) {
    echo "Mostrando Nome: $name";
})->where('name', '[a-z]+');

Route::get('/user/{id}', function ($id) {
    echo "Mostrando id: $id";
})->where('id', '[0-9]+');
```

## Provider 
    * Padronizar filtros
    * app -> Providers -> RouteServiceProvider.php
        * -> metodo boot()
    ```php
    // Route::pattern('item', 'padrão');
    // sempre que tem id nas rotas insere esse padrão
    Route::pattern('id', '[0-9]+');
    ```

    * Agr todas as rotas em web.php que tiver id terão esse padrão e não precisa o where

## Rotas com nome + redirect
    * Nomear
    ```php
    Route::get('/config/info', function () {
        echo 'configurações INFO';
    })->name('config.info');

    ```
    * Usar redirect
    ```php
    return redirect()->route('nome_definido');

    ```

## Grupo de rotas
    * Agrupamento através de um prefixo

    
```php
// disso
Route::get('/config', function () {
    return view('config');
});

Route::get('/config/info', function () {
    echo 'configurações INFO';
})->name('config.info');

Route::get('/config/permissoes', function () {
    echo 'configurações PERMISSOES';
})->name('config.permissoes');


// p isso
Route::prefix('/config')->group(function() {
    // pegand o config inicial
    Route::get('/', function() {
        return view('config');
    });

    Route::get('/info', function() {
        echo 'configurações INFO dois';
    })->name('config.info');

    Route::get('/permissoes', function() {
        echo 'configurações PERMISSOES do negócio';
    })->name('config.permissoes');
});
```


## Fallback de rotas (404)

* No final usar fallback
    * Ta configurando uma alternativa quando algo não funcionar
    * Quando se trata de rotas, quando sistema verificar todas as rotas e nenhuma bater, executa oq tem dentro da função
    ```php
    Route::fallback(function () {
        echo 'Nenhuma rota encontrada';
        // ou pode redirecionar
        // return redirect('/');
    });
    ```
## Rotas + Controllers

* Cada rota vai ser designado um controller, onde vai ter a lógica dentro
```sh
php artisan make:controller NameController
# ou, para criar com os métodos pré-criados
php artisan make:controller NameController --resource
```

```php
Route::get('/', [NomeController::class, 'nome_funcao'])->name('nome_controller.nome_funcao');
```

* Ex:
```php
Route::prefix('/config')->group(function () {
    // pegand o config inicial
    Route::get('/', [ConfigController::class, 'index'])->name('config.index');

    Route::get('/info', [ConfigController::class, 'info'])->name('config.info');

    Route::get('/permissoes', [ConfigController::class, 'permissoes'])->name('config.permissoes');;
});

```

* Usar Route::resource
```php
Route::resource('tarefas', NameController::class);
/* 
    // CRIA ESSAS ROTAS ABAIXO
    GET - /prefix - index - prefix.index - LISTA TODOS ITEMS
    GET - /prefix/create - create - prefix.create - FORM DE CRIAÇÃO
    POST - /prefix - store - prefix.store - RECEBER OS DADOS E ADD ITEM
    GET - /prefix/{id} - show - prefix.show - ITEM INDIVIDUAL
    GET - /todo/{id}/edit - edit - prefix.edit - FORM DE EDIÇÃO
    PUT - /todo/{id} - update - prefix.update - RECEBER OS DADOS E ATUALIZAR ITEM
    DELETE - /todo/{id} - destroy - prefix.destroy - DELETAR ITEM
*/
```


## Controllers e Namespaces
* Subdivisão que pode fazer nos controllers
    * Criar uma pasta (ex: Admin)
    * Colocar os arquivos
    * Arruma o namespace do controller e importações no web e no controller
    * Ex:
    ```php
    // de
    namespace App\Http\Controllers;
    namespace App\Http\Controllers\Nome_da_pasta;
    ```

# Módulo 3 (Request, Blade e Templates)
## Request
* Passado como parametro e tem todas informações passadas como requisição(cabeçalho, form, aquivo, etc)
```php
public function index(Request $req)
{
    $url = $req->url();
    $method = $req->method();
    echo $method;

    return view('config');
}
```

* Pegar todos os dados de uma requisição recebida de um form
```php
 public function index(Request $req)
{
    $data = $req->all();

    echo "Meu nome é " . $data['nome'] . " " . $data['idade'] . ' anos';

    return view('config');
}
```

* Pegar por input ou pela query
```php
// pelo input
$dados = $req->input('nome');

// pela query(url)
$dados_query = $req->query('nome', 'dado_padrão')
```
* All -> pega de todo mundo
* input -> prioriza os dados do corpo da requisição, caso não tenha, pega da url
* query -> pega da url, se tiver dados no corpo não vai pegar

* Verificar se foi enviado algum dado (so ve enviou e não verifica se foi preechido)
```php
if ($req->has('name_input')) {
    echo 'Tem';
} else {
    echo 'Não tem';
}
```
* Para ver se foi preenchido usar filled (ve se foi enviado e preenchido)
```php
if ($req->filled('name_input')) {
    echo 'Tem';
} else {
    echo 'Não tem';
}
```
* Verificar se não existe
```php
$estado = ''
if ($req->missing('estado')) { 
    $estado = 'SP';
}
```

### Quando usar tipo post no form
* Colocar @csrf
    * É uma proteção

### Escolher quais os campos serão enviados
* evita o user criar um html a mais e enviar um dado que não tem no banco
```php
// pega os passados dentro do array
$dados = $req->only(['campo1', 'campo2']);

// pega todos exceto o passado dentro do array
$dados2 = $req->except(['campo_que_não_sera_recebido']);
```

## Blade
* É o template engine responsável por controlar os views

#### Enviar dados do controller p o view
* Bem simples
```php
$nome = $req->input('nome', 'Leo');
        $idade = 90;

        $data = [
            'nome' => $nome,
            'idade' => $idade
        ];

    return view('config', compact('data'));
}

//  na view config
<input type="text" name="nome" value="{{ $data['nome'] }}" />
```

### Dados globais
* dentro Http -> Providers -> arquivo AppServiceProvider.php
```php
use Illuminate\Support\Facades\Views;

// dentro do metodo boot()
public function boot()
{
    // View::share('nome_da_inforamação', 'valor_dela');
    View::share('versao', '1.0');
}
```
* Na pag que vai ser exebida
```php
<h1>Versão: {{ $versao }}</h1>
```

### Definindo um layout (template)
* Criar uma pasta layouts e dentro colocar o arquivo, usar yield para definir as áreas que vão mudar
```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - LARAVEL 1</title>
</head>

<body>
    <header>
        <h1>Header</h1>
    </header>

    <section>
        @yield('content')
    </section>    
</body>

</html>
```

* No arquivo da view
```php
@extends('layouts.admin')

@section('title', 'esse meme')


@section('content')
    <h1>Configurações</h1>

    <header>
        <ul>
            <li>
                <a href="{{ route('config.info') }}">Info</a>
            </li>
            <li>
                <a href="{{ route('config.permissoes') }}">Permissoes</a>
            </li>
        </ul>
    </header>

@endsection

```

### Estruturas de controle
* IF
```php
@if($idade > 18 && $idade <= 60)    
    Eu sou adulto
@elseif($idade > 60 && $idade <= 120)   
    Eu sou um idoso
@else
    Eu sou menor de idade
@endif
```
* Ver se tem
```php
@isset($variavel_definida)
        {{-- se tiver variavel_definida mostra --}}
        <h1>Versão: {{ $variavel_definida }}</h1>
@endisset
```

* Ver se não existe
```php
@empty($varivel)
    Não existe variavel
@endempty
```

* FOR
```php
@for ($i = 0; $i < 10; $i++)
    <p>O valor de i é igual a: {{ $i }}</p>
@endfor
```

* FOREACH
```php
<ul>
    @foreach ($lista as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
```

* FORELSE
```php
<ul>
    @forelse ($lista as $item)
        <li>{{ $item }}</li>
    @empty
        <p>Não tem nada mermão</p>
    @endforelse

</ul>
```

* While
```php
@while(condicao)
    asdfsadf
@endwhile
```

### Componentes
* Criar o component
```php
<div style="border: 1px solid #000; padding: 2rem; background-color: #ccc">
    <h1>{{ $titulo }}</h1>
    // aqui em baixo tem qeu chamar $slot
    {{ $slot }}
</div>

```
* Usar na view
```php
 @component('alert')
    @slot('titulo', 'Erro:')
    // ou
    // @slot('titulo')
    //     Erro:
    // @endslot
            
    <h1>Cade o trem mermão</h1>
@endcomponent


```

* Criar um atalho pra usar o componente
    * Em AppServiceProvider
    ```php
    use Illuminate\Support\Facades\Blade;
    // dentro do metodo boot()

    // Blade::component('pasta.arquivo_da_view', 'atalho')
    ```

## Módulo 4 (banco de dados, middleware, auth)

### Banco de dados
* Duas formas de usar: Query bilder, eloquent ORM
    * Query bilder: Tem acesso a todo banco de dados
    * eloquent ORM: Faz o mesmo porém atralado a um Model

#### Usando query bilder
```php
// no controller
use Illuminate\Support\Facades\DB;

// dentro do metodo
// selecionar tudo
$list = DB::select('SELECT * FROM table_do_banco_dados');

// com where passando variavel
$list = DB::select('SELECT * FROM tarefas WHERE resolvido = :status', ['status' => 0]);

// inserir dados
DB::insert('INSERT INTO tarefas (titulo) values (:titulo)', ['titulo' => $titulo]);

// atualizar dados
DB::update('UPDATE tarefas set titulo = :titulo where id = :id', [
    'titulo' => $titulo,
    'id' => $id
]);
```


### Flash
* Mostra a msg uma vez na tela e dps é destruida
```php
if ($req->filled('titulo')) {
    $titulo = $req->input('titulo');
    DB::insert('INSERT INTO tarefas (titulo) values (:titulo)', ['titulo' => $titulo]);
    return redirect()->route('tarefas.index');
} else {
    return redirect()
    ->route('tarefas.create')
    ->with('warning', 'Preecha o campo abaixo');
}
```

* Na view
```php
@if (session('warning'))
    @component('components.alert')
        {{ session('warning') }}
    @endcomponent
@endif
```

#### Usando validate
```php
// sem o validate
// if ($req->filled('titulo')) {
//     $titulo = $req->input('titulo');

//     DB::insert('INSERT INTO tarefas (titulo) values (:titulo)', ['titulo' => $titulo]);

//     return redirect()->route('tarefas.index');
// } else {
//     return redirect()->route('tarefas.create')->with('warning', 'Preecha o campo abaixo');
// }

// view
// @if (session('warning'))
//     @component('components.alert')
//         {{ session('warning') }}
//     @endcomponent
// @endif


// com validate volta pra pag anterior caso de erro e com msg de erro prontas
$req->validate([
    'titulo' => 'required|string'
]);

$titulo = $req->input('titulo');

DB::insert('INSERT INTO tarefas (titulo) values (:titulo)', ['titulo' => $titulo]);

return redirect()->route('tarefas.index');

// na view
@if ($errors->any())
    @component('components.alert')
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endcomponent
@endif
```
* Para traduzir as msg acessar esse [link do git hub](https://discord.com/channels/@me/910647869646729276/915702745300893729) 


#### Usando Eloquent ORM
```sh
php artisan make:model NomeModel
```

* Criar um Model (quem faz comunicação entre banco e código)
    * Colocar o nome da table no singular 
        * ele preve que o nome da table está no plural
            * Ex: model: Tarefa, preve que a table seja tabelas
            ```php
            // caso tenha outro nome pode especificar
            protected $table = 'tarefas';
            ```
        * Permitir alterações em massa no model
            ```php
            protected $fillable = ['campos1', 'campos2'];
            ```
        * Tbm preve que a primary key chama id
            * se tiver outro nome
            ```php
            protected $primaryKey = 'nome_id';
            ```
        * Especificar se a primary key é auto_increment (padrão é true)
        ```php
        public $incrementing = true
        public $incrementing = false
        ```
        * Tipo da primary key
        ```php
        protected $keyType = 'string';
        ```
        * Eloquente preve tb o created_at e uptaded_at
            * Se não quiser que tenha esses campos
                ```php
                public $timestamps = false;
                ```
            * se tiver com outro nome na table pode especificar qual o campo
            ```php
            const CREATED_AT = 'nome_do_campo';
            const UPDATED_AT = 'nome_do_campo';
            ```

#### Usar Model

* pega todos os registros da table
```php
$list = NomeModel::all();
```

* com WHERE
```php
$list = NomeModel::where('campo_da_table', 'valor_da_condição')
    ->where('campo_da_table_segunda_condicao_caso_seja_preciso', 'valor_da_condição' )
    ->get();
```

* orWhere
* não precisa das duas condições serem atendidas

```php
$list = NomeModel::where('campo_da_table', 'valor_da_condição')
    ->orWhere('campo_da_table_segunda_condicao_caso_seja_preciso', 'valor_da_condição' )
    ->get();
```

* Pegar o primeiro item (diferentemente dos exemplos acima, esse não retorna array)
```php
$list = NomeModel::where('campo_da_table', 0)->first();
```

* Buscar pelo id (não retorna array)
```php
$item = NomeModel::find(numberID);
```

* Buscar por mais de um id (retorna um array)
```php
$list = NomeModel::find([numberID1, numberID2])
```

* Contar os resultado
```php
$total = Tarefa::where('campo_da_table', 'valor_da_condição')->count();
```


* Inserir no banco
```php
$t = new Tarefa;
$t->titulo = 'Teste de titulo pelo eloquente';
$t->save();
```

* Editar um item
```php
$t = Tarefa::find(3);
$t->titulo = 'Alterado o titulo';
$t->save();

// ou (precisa do fillable no model)
Tarefa::findOrFail($id)->update(['titulo' => $titulo]);

// passar todos imput de uma vez
$inputs = $req->all();
Tarefa::findOrFail($id)->update($titulo);

```

* Editar mais de um item
```php
NomeModel::where('campo_da_table', 'valor_da_condição')->update([
    'campo_da_table' => 'novo_valor';
]);

```

* Remover
```php
$t = Tarefa::find(3);
$t->delete();
```

* Remover mais de um item
```php
NomeModel::where('campo_da_table', 'valor_da_condição')->delete()
```

### Middleware
* Intercepta a rota e faz a lógica dentro do middleware, se atender a logica, passa pra frente
    * Ex de uso: Ver se está logado

* Lógica:
    * server recebe requisição
    * middleware intercepta
    * se deixar prossegue para rota e mostra o desejado

* Laravel tem um middleware para autenticação, sintaxe:
```php
// se não estiver logado manda p pag '/login'
Route::get('/', [ConfigController::class, 'index'])->middleware('auth');
```

* [Criar](https://laravel.com/docs/8.x/starter-kits) os controller do laravel auth
```sh
# visto no comentário da aula (não testado)
php artisan ui bootstrap --auth

```

```sh
composer require laravel/breeze --dev

php artisan breeze:install

npm install
npm run dev
php artisan 
migrate                                                                 
```


* Mudar rota de redirecionamento caso esteja logado e vá a rota "/login"
    * Arquivo RedirectIfAuthenticated.php
    ```php
    <?php

    class RedirectIfAuthenticated
    {
        /* public function handle(Request $request, Closure $next, ...$guards)
        {
            $guards = empty($guards) ? [null] : $guards;

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::HOME);
                }
            }

            return $next($request);
        } */
        public function handle(Request $request, Closure $next, ...$guards)
        {
            $guards = empty($guards) ? [null] : $guards;

            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return redirect(route('config.index'));
                }
            }

            return $next($request);
        }
    }
    ```
##### Colocar pra tudo dentro do Controller passar pelo middleware
```php
public function __construct() 
{
    $this->middleware(['auth']);
}
```

#### Diferença entre autorização e autenticação
* autenticação - Logar user, criar user
* autorização - permissão a usuários

    * Definir autorizações de acordo com cargos ou oq desejar
        * Ir em AuthServiceProvider.php
    ```php
    use Illuminate\Support\Facades\Gate;


    Gate::define('nome-do-campo', function ($user) {
        return $user->admin === 1 ? true : false;
    });
    ```
        * Ir em no controller
    ```php
     public function create()
    {

        $permissao = [
            'campoView' => Gate::allows('nome-do-campo')
        ];

        return view('tarefas.create', $permissao);
    }
    ```

        * Ir na view
    ```php
    @if ($campoView)
        <p>Vocé é um admin</p>
    @else
        <p>Vocẽ não é um admin</p>
    @endif
    ```


### Seções
* Armazenar informações na seção p pegar em algum outro momento
* Tipo um localStorage, porém, seguro
* Pegar uma session
    ```php
    $session = $request->session()->get('nome_da_session', 'valor_padrão_da_session');
    ```
* Alterar uma session
    ```php
    $session = $request->session()->put('nome_da_session', 'novo_valor_da_session');
    ```
* Apagar uma session
    ```php
    $session = $request->session()->forget('nome_da_session');
    ```

### Internacionalização
* Linguagens
* Alterar em config/app.php
```php
'locale' => 'en',
// para
'locale' => 'pt-BR',
```

* Para traduzie tudo [acessar](https://discord.com/channels/@me/910647869646729276/915702745300893729)

* Criar as próprias msg
    * Ir na pasta resource > lang > pt-BR
    * Criar um arquivo que vai conter as msg e criar em forma de array
    ```php
    <?php
    return [
        'test' = 'Mensagem teste',
        // msg dinâmica
        'msgdinamica' => 'Acrescente a informação :variavel'
    ]
    ```
    * Na view
    ```php
    @lang('nome_do_arquivo_com_as_msg.test')

    @lang('nome_do_arquivo_com_as_msg.msgdinamica', [
        'variavel' => 'valor_da_variavel'
    ])
    // ou
    {{ __('nome_do_arquivo_com_as_msg.msgdinamica', ['variavel' = 'valor_da_variavel']) }}
    ```
    * Usar em um controller
    ```php
    $frase = __('nome_do_arquivo_com_as_msg.test');
    echo $frase;
    ```
