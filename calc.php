#!/usr/bin/env php
<?
require_once('common/init.php');

$algoName = 'AlgoBestFit';
$algoName = 'AlgoFirstFitDecreasing';
$weights = array(5,7,10);

$algo = new $algoName;
$orderUnit = new OrderUnit();
$orderUnit->fill($weights);

$algo->process($orderUnit);
$algo->check($orderUnit);

var_dump($algo->packageUnit->getSchema());
