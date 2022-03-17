# Criar um array com valores ja dentro
```php
range(itemQueVaiComecar, itemQueVaiTerminar, deQuantosEmQuantos);
// ex
range(1, 20, 2);
// saida: 1 3 5 7 ...
range('a', 'z');
```

# Ver se determinada chave existe (retorna boolean)
```php
key_exists('campoArray', $array)
// ou (mesma função so que com atalho)
array_key_exists('campoArray', $array)
```

# array_keys e array_values
```php
// cria segundo array com apenas as chaves
$chaves = array_keys($array)
// cria segundo array com apenas os valores
$valores = array_values($array)
```

# Cortar array (gera novo array) como se fosse um filtro a partir do indice
```php
array_slice($array, inicio, qtsItemPegar)
// ex: Pegar penultimo item do array
array_slice($array, -2, 1)
// ultimo
array_slice($array, -1, 1)
```

# Remover items array
```php
// sem o terceiro param remove tudo pra frente do inicio
array_splice($array, inicio, qtsRemover)
```
- Pode add items tbm 
```php
// se o item removido for um, será como uma troca de items
array_splice($array, 1, 1, ['itemAdicionado'])
array_splice($array, 2, 2, ['itemAdicionado', 'itemAdicionado2'])
```

# Executa uma função p cada item do array e reduz a um item
- Ex uso: obter soma de um array com valores
```php
// array_reduce($array, funcao, valorincial)
// valorincial default = 0
function somar($subtotal, $item) {
    $subtotal += $item
    return $subtotal;
}

$total = array_reduce($array, 'somar');

$pessoas = [
    ['sexo' => 'M', 'idade' => 25],
    ['sexo' => 'F', 'idade' => 25],
];

function contar_masculino($subtotal, $item) {
    if($item['sexo'] === 'M') {
        $subtotal++;
    }
    return $subtotal;
}
echo array_reduce($pessoas, 'contar_masculino') . '</br>';
```

# Descontruindo array
```php
// semelhante a
// let [variavel, variavel2] = array;

$array = ['Leo', 17, 'café'];
list($nome, $idade, $bebida) = $array;
```
