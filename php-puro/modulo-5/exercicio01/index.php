<?php 
$array = [
    'nome' => 'Leonardo',
    'idade' => 17,
    'empresa' => 'PrecPago',
    'profissao' => 'Programador'
];
?>

<table border="1">
    <?php foreach($array as $chave => $valor): ?>
       <tr>
           <th><?php echo $chave ?></th>
           <td><?php echo $valor ?></td>
       </tr>
    <?php endforeach; ?>
</table>