# Start
php -S localhost:8000 -t. 

# Primeiro procura o index.html se não achar index.php

# Como funciona internamente php
- req -> manda local correto -> executa oq tem pra executar
php
- Bloco php
```php
<?php  ?>
```
- Se so tiver código php não precisa fechar o bloco
```php
<?php
// codigo
```

# Concatenação
- Por ponto
```php
'Leonardo' . ' ' . $sobrenome
```
- Aspas duplas
    - Colocar chaves ao redor pois Protege o valor da variável e facilita a leitura do template.
```php
"Leonardo {$sobrenome}"
```

- Por .=
```php
$nomeCompleto = $nome
// da pra usar operadores aritmeticos tb
$nomeCompleto .= $sobrenome
```

# Operador Spread
- Copiar dados de um outro array
```php
$array = ['asd', 'ddd', 'kkkk'];
$array2 = [
    ...$array,
    'azeitona';
]
```

# Isset
- Ve se existe
```php
$nome = 'Leo';

$nomeCompleto = $nome;
$nomeCompleto .= isset($sobrenome) ? $sobrenome : '';
```

# Operador Null Coalesce
- Parecido com ternário
```php
// mesmo de
$nomeCompleto .= isset($sobrenome) ? $sobrenome : '';

$nomeCompleto .= $sobrenome ?? '';
```

# Switch
- Usar quando saber os valores que a variavel ira retornar
```php
$tipo = 'texto';
switch($tipo) {
    case 'foto':
        echo 'Exibindo FOTO';
    break;
    case 'video':
        echo 'Exibindo video';
    break;
    case 'texto':
        echo 'Exibindo text';
    break;
}
```

# While
```php
while($condição) {
    // comando
}
```

# For
```php
for($i = 0; $i < 10; $i++) {
    echo $i
}
```

# Foreach
```php
foreach($variavel as $index => $item) {
    // comando
}

foreach($variavel as $item) {
    // comando
}
```

# Funções
- Parâmetros: Type e valor padrão
```php
function somar(int $n1, int $n2 = 0) {
    // comando
}
```