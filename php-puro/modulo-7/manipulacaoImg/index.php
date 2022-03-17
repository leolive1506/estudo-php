<?php 
$data = new DateTime('2020-01-01 15:35:00');
// add p adicionar tempo, sub pra diminuir tempo 
// $dataAnosMais = $data->add(DateInterval::createFromDateString('7 years 2 days 5 minutes 17 seconds'));
// timezone
// $date->setTimezone(new DateTimeZone('America/Sao_Paulo'));
echo $data->format('d/m/Y H:i:s') . '</br>';


$data2 = new DateTime('2020-01-15 15:35:00');
$diff = $data->diff($data2);
// pegar qtd total de dias entre um e outro
echo $diff->format('%a');
// pegar qtd total de meses entre um e outro
echo $diff->format('%m');
// pegar qtd total de anos entre um e outro
echo $diff->format('%y');