# Introdução à Orientação à Objetos
- Sistema feito de vários Objetos
- Ex: 
    - Estoque
        - Tem Produtos
            - Cada produto é um objeto
                - Cada objeto tem um conjunto de características

# Classes e Objetos
- Em uma Classe define as propriedades do objeto
```php
class Post {
    public $likes = 0;
    public $comments = [];
    public $author;
}
```
- Obj é a classe instânceada
```php
$post = new Post();
$post->likes = 3;
```

# Métodos e propriedades
- propriedades
    - as características que uma classe / objeto vai ter
    - public
    - private usa quando não quer que tenha acesso a ela fora da class
    - protected semelhante a private

- Métodos
    - Funções
    - public function
    - private funcion
    - protected function

- Acessar algo na class usar $this
    - $this->itemDaClass

# Typed Properties 
```php
public int $likes
public array $likes
public string $likes
```

# Método Construtor
- Alguns métodos programados pra rodar previamente, um deles o __construct
- Quando cria o método ele é executado
- Os parametros passados no new NomeClass(param1) fica no __construct
```php
public function __construct($param1) {
    echo 'teste';
}
```

# Encapsulamento
- Proteger as propriedades de acessos externos ou modificações externas ou que podem prejudicar funcionamento do obj
- set e get
- deixa variavel como private e alterar via set

# Método Estático
- Método dentro da class que é independente
- Ex:
```php
// sem static
class Matematica {
    public function somar($x, $y) {
        return $x = $y;
    }
}

$m = new Matematica()
echo $m->somar(10, 20);

// com static
class Matematica {
    public static function somar($x, $y) {
        return $x = $y;
    }
}

echo Matematica::somar(20, 30); 
```

# Herança
- Herda oq que tem na class pai

# Diferença Private e Protected
- Protected pode alterar valores na classe filha com igual sem ser com a função set ja o private não

- Sobrescrever o metodo
    - So escrever mesmo nome na class filha

# Interface
- Guia de implementação deu uma classe
- + Abstrato que a classe
- Class usa mesma estrutura
- Gerenciamaneto de banco de dados
    - Se mudar de banco os metodos vão ser os mesmos
- Define um padrao
```php
interface Database {
    public function listar();
    public function alterar();
    public function adicionar();
}

class MysqlDB implements Database {
   
}
```

# Polimorfismo
- Varias classes diferentes tem a mesma forma
```php
interface Forma {
    public function getTipo();
    public function getArea();
}

foreach($objetos as $item) {
    echo "area {$item->getTipo()}: {$item->getArea()} </br>";
}
```

# Namespace
- Encapsular pra conseguir usar classes com mesmo nome dentro da mesma aplicação
- Definir um
```php
namespace classes\matematica;
```
- Abreviar nome
```php
use classes\matematica\Basico as Abrobra;
// se o nome da classe for o mesmo que quer intanciar não precisa do as
// ex
use classes\matematica\Basico;
$teste = new Basico();
```

# Injeção de Dependência
- insere uma classe dentro de outra
```php
class NameClass {
    private $variavel;
    public function __construct($b) {
        $this->variavel = $b;
    }
}

$variavel = new NameClass(new ClasseComoArgumento());
```

# PSR
- PHP Standards Recommendation 
    - Recomendaçoes de padrões a serem seguidos

- PSR1: Basico
    - usar padrão <?php ou <?=
    - Arquivos usar UTF-8 sem BOM
    - um arquivo com implementação das classes e outro pra mostrar na tela, nunca os dois juntos
    - namespaces e classes precisam seguir uma psr de autoload: [PSR-4]
    - nome de Classes precisam ser declaradas em StudlyCaps 
        - Ex: PrimeiroNomeSegundoNome
    - Constante sempre caixa alta
        - Ex:
        ```php
        const VERSION = '1.0';
        const CONSTANTE_COM_DOIS_NOMES = null;
        // usar
        NomeClasse::VERSION;
        ```
    - Nomes de metodos e variaveis precisam ser declados em camelCase
        - Primeiro nome minusculo, segundo maiuscula

# Autoload
- PHP consegue identificar qual classe está chamando sem precisa ficando dando require em todas as classes
```php
use classes\matematica\Basico;

spl_autoload_register(function($class) {
    // sempre que chamar uma class, nome é enviado p função.
    $classe = preg_replace('/\W|_/', '/', $class);
    if(file_exists("{$classe}.php")) {
        require "$classe.php";
    }
});
$m = new Basico();
echo $m->somar(10, 20);
```

# Gerenciamento de Dependências
- composer mais popular
    - usar site [packagist](https://packagist.org/explore/)
- Instalar composer
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

mv composer.phar /usr/local/bin/composer
```

# Usar composer
- Criar um arquivo composer.json
```json
{
    "require": {

    },
    "autoload": {
        "psr-4": {
            "nomeNamespace\\": "pasta/"
        }
    }
}
```
- composer install
    - Cria o autoload dele dentro de vendor
- Install depedencies
```sh
composer require nameBiblioteca
```