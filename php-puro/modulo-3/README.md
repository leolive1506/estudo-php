# Passar variaveis por referencia
- Altera valor fora da função tbm
    - Passando assumir valor como resultado da ação feita na função
- Sintaxe
```php
&$variavel
```
- Ex:
```php
function somar($n1, $n2, &$total) {
    $total = $n1 + $n2;
}

$x = 3;
$y = 2;
$soma = 0;

somar($x, $y, $soma);
echo "$x + $y = {$soma}";
```

# Função sort
- Recebe um array
- Ordena do maior para o menor
- Altera o valor do array

# Funções anônimas
```php
$funcao = function(int $valor) {
    return $valor * 0.1;
};
// usar
echo $funcao(90);

// como parametro
algumaFuncao(10, function() {

});
```

# Arrow function
- Quando tem somente um comando pra excecutar
    - se tive mais de um não funcionará
    - Não precisa return 
```php
$funcao = function(int $valor) {
    return $valor * 0.1;
};

$funcaoComArrow = fn($valor) => $valor * 0.1;
```

# Funções Recursivas
- Função qeu executa ela mesmo
```php
function dividir($num) {
    $metade = $num / 2;
    echo $metade . '</br>';

    if(round($metade) > 0) {
        dividir($metade);
    }
}
```

# Funções nativas Matemática
- Pegar modulo do valor
```php
abs($numero)
```

- PI
```php
pi()
```

- Arredondar p baixo
```php
$numero = 2.7;
floor($numero);
// resultado = 2
```

- Arredondar p cima
```php
$numero = 3.1;
ceil($numero);
// resultado = 4
```
- Dependendo do numero, arredonda pra cima ou p baixo
```php
$numero = 3.1;
round($numero, numeroCasasDecimais -> default 0);
// resultado = 3

$numero = 3.5;
round($numero);
// resultado = 4
```

- Gerar numeros aleatórios
```php
echo rand($min, $max);
```

- Pegar maior / menor numero de um lista
```php
$lista = [1, 2, 3];
echo max($lista);
echo min($lista);
```

# Funções nativas p string
- Remover espaços
```php
trim($string);
```
- Contar caractecteres string
```php
strlen($string);
```
- Deixa toda minuscula
```php
strtolower($string);
```

- Deixa toda maiuscula
```php
strtoupper($string);
```
- Replace
```php
str_replace($nomeAntigo, $nomeNovo, $string_que_contem_texto);
```

- Pegar uma parte da string
    - Posição inicial como negativa começa pelo final da string
```php
substr($string, $posicaoComecaoPegar, $posicaoFinal)
```

- Procura determinada palavra dentro string e retorna posição dela
```php
strpos($string, 'stringProcurada')
```

- Transformar primiera letra da frase em maiuscula
```php
ucfirst($string);
```

- Transformar toda primiera letra em maiuscula
```php
ucwords($string);
```

- Tranformar um array
```php
explode('divisor', $string);
```

# Formatar números
```php
number_format($numero, $qtdDecimais, 'simboloDecimal', 'SimboloMilhar')
```

# Funções nativas Array
- Quantos items tem no array
```php
count($array);
```
- Diferença entre dois array
    - Gera um novo array dos items do primeiro que não estão no segundo
```php
array_diff($lista, $comparacao);
```
- Filtrar array
    - Gera array novo
```php
array_filter($array, function($item) {
    // comando
});
```
- Mapear array
```php
array_map(function($item) {}, $array);
```
- Remove ultimo item
```php
array_pop($array)
```

- Remove primeiro item
```php
array_shift($array)
```

- Buscar no array
```php
// so saber se tem
// In array
if(in_array($valorProcurado, $array)) {

}
// saber a posição
// Array search
array_search($valorProcuardo, $array);
```

- Ordenar
```php
// crescente
sort($array);
// decrescente
rsort($array);

// mantendo o index do el mas ordenando
asort($array);
```
- Transformar em string
```php
implode('separador', $array);
```

# Datas
- Retorna temop em ms desde 1/1/1970

- Data (Olhar docs para ver todas opções)
```php
date('d/m/Y H:i:s')
date('d/m/Y')

```
- Formatar data
```php
$data = '2020-03-06';
$time = strtotime($data) // retorna os ms
date('d/m/Y', $time) // date recebe como 2º arg os ms
```

# Usar multiplos arquivos
- Importar arquivo
    - Tem acesso a variaveis e dados html arquivo
```php
require('nameFile');
// so pucha file uma vez
require_once('nameFile');
```
- Require - fatal error se não achar
- Include - Permite continuar renderizar o resto código

# Trabalhar com pastas diferentes

```php
```
- 
```php
```
- 
```php
```
