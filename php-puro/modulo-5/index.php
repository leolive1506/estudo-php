<?php 
$array = [1, 2, 3, 4];
function somar($subtotal, $item) {
    $subtotal += $item;
    return $subtotal;
}

$total = array_reduce($array, 'somar');
echo $total . '</br>';

$pessoas = [
    ['sexo' => 'M', 'idade' => 25],
    ['sexo' => 'F', 'idade' => 25],
    ['sexo' => 'M', 'idade' => 25],
    ['sexo' => 'F', 'idade' => 25],
    ['sexo' => 'M', 'idade' => 25],
    ['sexo' => 'F', 'idade' => 25],
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