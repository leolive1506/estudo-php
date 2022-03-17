# Conectando ao Banco de Dados com PDO
- PDO
    - biblioteca pra conectar com diferentes bancos de dados
```php
$pdo = new PDO("engineDB:dbname=nameDatabase;host=localhost", "root", "root");
```
- Selecionar todos os dados
```php
$pdo = new PDO("mysql:dbname=curso_php;host=localhost", "root", "root");

// selecionando algum dado
$sql = $pdo->query('SELECT * FROM usuarios');
// pegando dados
// FETCH_ASSOC -> associa os dados e não traz duplicidade de dados
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($dados);
```

- Ver quantos registros tem na consulta feita
```php
$sql = $pdo->query('SELECT * FROM usuarios');
echo "Total: {$sql->rowCount()}";
```

# Inserir dados (Create)
- Sempre que for enviar dados p banco usar o prepare por segurança em vez do query

```php
// montando um template
$sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
// associações
// $sql->bindValue('quem_quer_modifica', $value)
// value associa valor que mandou, pode passar strin tbm
$sql->bindValue(":nome", $nome);
// aqui associa a variavel $email mesmo, se alterado $email, é associado na query
$sql->bindParam(":email", $email);
// executando 
$sql->execute();

header("Location: index.php");
```

# Verificar se email ja existe
```php
$sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
$sql->bindValue(":email", $email);
$sql->execute();

if($sql->rowCount() === 0) {
    // se não tiver, executa a ação
} else {
    // redireciona com session avisando que tem o email
}
```

- abrir for eacch e pode digitar tag no meio
```php
<?php foreach($lista as $user): ?>
    <h1>Tags</h1>
<?php endforeach; ?>
```

# Atualizar dado (Update)
```php
$sql = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
$sql->bindValue(":nome", $nome);
$sql->bindValue(":email", $email);
$sql->bindValue(":id", $id);
$sql->execute();
```

# Data Access Object (DAO)
- Min duas classes funcionando
- Classe especifica p item q esta manipulando (Usuario)
- Uma class p intermediação entre db e a classe manipulada
    
    - Ex:
        - Cria obj do user a ser ad
        - manda p intermediador
        - intermediador faz comunicação com db
            - Usuario
                - id
                - nome
                - email
                - getId, setId
                - getNome, setNome
                - getEmail, setEmail
                
            - UsuarioDAO
                - add(Usuario)
            
            - Passos p inserir um novo usuario
            ```php            
                $user = new Usuario();
                $user->setNome('fulano');
                $user->setEmail('fulano@gmail.com');
                $usuarioDAO->add($user);
            ```

- Pegar ultimo adicionado 
```php
$user->setId($this->pdo->lastInsertId());
return $user;
```

# SOLID
- S - Single Responsibility Principe (Princípio da responsabilidade única)
- O - Open-Closed P rinciple (Princípio aberto-fechado)
- L - Liskov Substitution Principe (Princípio da substituição de liskov)
- I - Interface Segregation Principle (Princípio da Segregação da Interface)
- D - Dependecy Inversion Principle (Princípio da inversão da dependêndia)

## SOLID: S - Princípio da Responsabilidade Única
- Toda classe deve ter somente um motivo p mudar
- Apenas uma responsabilidade

## SOLID: O - Princípio Aberto-Fechado
- Devem estar aberta a extensão
    - aumtentar funcionalidades

- Fechadas p modificação

## SOLID: L - Princípio da Substituição de Liskov
- O Princípio de Substituição de Liskov diz que objetos podem ser substituídos por seus subtipos sem que isso afete a execução correta do programa.
    - Sem alterar a funcionalidade da função extendida

```php
class A {
    public function getNome() {
        return "Meu nome é A";
    }    
}

class B extends A {
    public function getNome() {
        // pode retornar uma string
        // se retornar algo cm numero iria contra o principio
        return "Meu nome é B";
    }
}

function imprimeNome(A $obj) {
    return $obj->getNome();
}

$obj1 = new A();
$obj2 = new B();
```

## SOLID: I - Princípio da Segregação da Interface
- Em uma interface tem apenas os métodos essenciais que vão ser utilizados pela classe que estão implementando eles
    - Ex: interface Aves que exige método alturaVoo, não se aplicaria ao pinguim pq não voa
    - Solução:
    ```php
    interface Aves {
        public function setPeso($peso);
        public function render($peso);
    }
    interface AvesQueVoam extends Aves {
        public function alturaVoo($alt);
    }
    ```

## SOLID: D - Princípio da Inversão da Dependência
- Quando esta fazendo injeção depencia e pode modificar que depencia está sendo injetado dentro da classe, o ideal é criar uma interface
- Ex:
```php
interface DBConnection {
    public function connect() {}
}

class MySQLConnection implements DBConnection {
    public function connect() {}
}

class OracleConnection implements DBConnection {
    public function connect() {}
}

class UsuarioDAO {
    private $db;
    // tipa com a interface
    public function __construct(DBConnection $dbCon)
    {
        $this->db = $dbCon;
    }
}
```

# Encriptaçao de senhas
- Gerar um hasg
```php
// PASSWORD_DEFAULT -> gera de acordo com php achar mais conveniente
$hash = password_hash($senha, PASSWORD_DEFAULT);
echo $hash;

// verificar uma senhas
if(password_verify($senha, $hash)) {
    echo 'ok';
}
```
# Manipulação de imagens com GD
- Geralmente baixada com php por padrão
- Criando uma img
```php
$imagem = imagecreatetruecolor(300, 300);
// $cor = imagecolorallocate($imagem, red, green, blue)
$cor = imagecolorallocate($imagem, 255, 0, 0);
// imagefill($imagem, ondeComeçaPreecher(esquerdaPraDireita), Cima pra baixo, $color)
imagefill($imagem, 0, 0, $cor);

// exibir na tela transformar navegador em img, não tem como fazer isso em um arquivo que gerar alguma outra coisa
// header("Content-Type: image/jpeg");

// salvar ou exibir na tela
// imagejpeg($imagem, ondeSalvar, 100); // quando passado como null mostra na tela
imagejpeg($imagem, 'nova_imagem.jpg', 100);
```

- Mudando tamanho de uma img
```php
$arquivo = 'paisagem.jpeg';
$maxWith = 200;
$maxHeight = 200;

// pegar tamanho img
list($originalWith, $originalHeight) = getimagesize($arquivo);

// pegar proporção
$proporcao = $originalWith / $originalHeight;
$proporcaoDest = $maxWith / $maxHeight;

$finalWith = 0;
$finalHeight = 0;

if($proporcaoDest > $proporcao) {
    $finalWith = $maxHeight * $proporcao;
    $finalHeight = $maxHeight;
} else {
    $finalHeight = $maxWith / $proporcao;
    $finalWith = $maxWith;
}

// criar img
$imagem = imagecreatetruecolor($finalWith, $finalHeight);
$originalImg = imagecreatefromjpeg($arquivo);

// pegar img original, jogar na criada so que diminuida proporcionalmente
// imagecopyresampled($imagemQTaCriado, QuemTaCopiando, posicoesOriginais(x, y), posicoesFinais(x, y), tamanhoFinal, alturaFinal, originalwidth, originalheight)
imagecopyresampled(
    $imagem, $originalImg,
    0, 0, 0, 0,
    $finalWith, $finalHeight,
    $originalWith, $originalHeight
);

// salvar ou mostrar na tela
imagejpeg($imagem, 'imagem_nova.jpg', 100);
```

- Crop
    - Cortar img com tamanho fixo

# Class DateTime
```php
$data = new DateTime('2020-01-01 15:35:00');
// add tempo
$data->add(DateInterval::createFromDateString('7 years 2 days 5 minutes 17 seconds'))
// timezone
// $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
echo $data->format('d/m/Y');
```

- Pegar diferença entre datas
```php
$diff = $data1->diff($data2);
// pegar qtd total de dias entre um e outro
echo $diff->format('%a');
// pegar qtd total de meses entre um e outro
echo $diff->format('%m');
// pegar qtd total de anos entre um e outro
echo $diff->format('%y');
```