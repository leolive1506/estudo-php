# HTTP Request
- Sem especificar a action ele envia p o próprio arquivo os dados do form

# Pegando informações do form
```php
$nome = filter_input(INPUT_TIPOFORM , 'NomeCampo')
```

# Validar dados
```php
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// FILTER_SANITIZE_NUMBER_INT -> Tira tudo que ñ for numero
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);

if($nome && $email) {
    echo "Nome: {$nome} </br>";
    echo "Idade: {$idade} </br>";
} else {
    // troca cabeçalho da requisição
    // faz o redirecionamento p pag especificada
    // pode fazer quando não envia nenhuma informação p tela no arquivo de validação
    // não colocar nenhuma informação tela antes da função header
    header('Location: index.php');
    exit; // -> cancela oq tem pra baixo
}
```

## filter_var 
- ja tem informação e quer validar informação
```php
$sobrenome = 'Lopes';
filter_var($sobrenome, FILTRO );
```

## FILTER_SANITIZE_SPECIAL_CHARS
- Deixa as tudo como texto, e evita poder digitar html

## Algumas constantes p validação
```php
FILTER_VALIDATE_EMAIL
FILTER_VALIDATE_INT
FILTER_VALIDATE_IP
FILTER_VALIDATE_URL

// TIRA TUDO QUE NÃO PARTICIPAR EMAIL
FILTER_SANITIZE_EMAIL
FILTER_SANITIZE_STRING
FILTER_SANITIZE_SPECIAL_CHARS
FILTER_SANITIZE_URL
FILTER_SANITIZE_NUMBER_INT
```

# Sessões
- Armazena informações
- Compartilhamento de informações nas páginas
- P as pág que precisar de sessão, usar no começo
```php
// se existir pega, se não faz nada
session_start()
```

- Salvar informações e usar
```php
$_SESSION['aviso'] = 'Preencha';

// onde quer usar
if($_SESSION['aviso']) {
    echo $_SESSION['aviso'];
    $_SESSION['aviso'] = '';
}
```

# Cookies
- Semelhante sessão só que fica salvo navegador user
- Pra settar cookie, tem que ser antes de qualquer exibição na de conteúdo na tela
```php
setcookie('nomecooke', $valorCookie, $quandoVaiexpirar)
/* 
    * time() pega quando tempo em qeu foi setado
    * 86400 -> um dia em ms
    * 86400 * 30 -> vai expirar em 30 dias
*/
setcookie('nome', $nome, time() + (86400 * 30))

// resgatar valor
if(isset($_SESSION['aviso'])) {
    echo "<h2>{$_COOKIE['nome']}</h2>";
}

// deletar umcookie
// setar valor experição no passado no passasdo
setcookie('nome', null, time() - 3600);
```

# Lendo arquivos
- Le arquivos dentro e fora da maquina se passado url
```php
file_get_contents('texto.txt')
```

# Escrevendo em arquivos
- Se arquivo não existir ele cria, se existir, substitui

```php
$texto = 'Leonardo'
file_put_contents('nomefile.txt', $texto);
```
- Ex dinamico
```php
$texto = file_get_contents('texto.txt');
// echo $texto;
$texto .= "\nLeonardo Lopes";
file_put_contents('nome.txt', $texto);
```

# Excluir arquivos
```php
unlink('nomearquivo')
```

# Movendo e Renomeando arquivos
```php
rename('caminho_arquivo', 'caminho_novo')
// ex
rename('test.txt', 'test2.txt')
// mudando caminho
rename('test2.txt', 'pasta/test2.txt')
```

# Copiar arquivo
```php
copy('caminho_arquivo', 'caminho_que_vai_a_copia');
```

# Upload de arquivos
- colocar no form p conseguir enviar o arquivo
```php
<form action="recebedor.php" method="POST" enctype="multipart/form-data">
```
- Ver oq retorna
```php
echo "<pre>";
print_r($_FILES);
```
- tmp_name
    - Local Armazena temp no server
- size
    - Tamanho do arquivo
- name
    - Nome do arquivos
- type
    - tipo

- Mover p sistema
```php
// mover p sistema
move_uploaded_file(onde_ta_na_pasta_temp, name_file)
```

- Dica salvar arquivo com nome unico
```php
$nome = md5(time() . rand(0, 1000)) . '.jpg';
```

- Validar tipo
```php
if(in_array($_FILES['arquivos']['type'], array('image/jpeg', 'image/jpg'))) {
    $nome = md5(time() . rand(0, 1000)) . '.jpg';
    move_uploaded_file($_FILES['arquivo']['tmp_name'], "arquivos/{$nome}");
}
```