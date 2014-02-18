#!/usr/bin/env php
<?
require_once('common/init.php');

$weights = array(3, 3, 3, 2, 2, 1, 6, 5, 4);

$algoNames = array('AlgoNextFit', 'AlgoFirstFit', 'AlgoBestFit', 'AlgoFirstFitDecreasing');

foreach ($algoNames as $algoName) {
  $algo = new $algoName;
  $orderUnit = new OrderUnit();
  $orderUnit->fill($weights);

  $algo->process($orderUnit);
  $algo->check($orderUnit);

  echo $algoName.PHP_EOL;
  var_dump($algo->packageUnit->getSchema());
  }