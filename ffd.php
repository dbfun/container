#!/usr/bin/env php
<?
require_once('common/init.php');
$testAlgo = new TestAlgo(new AlgoFirstFitDecreasing());
echo PHP_EOL."Tests complete";