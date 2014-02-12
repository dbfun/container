<?
$retrial = 100;



for ($numWeights = 3; $numWeights <=10; $numWeights++) {
  $filename = $numWeights.'.json';
  $testData = array();
  $handle = fopen ($filename, 'wb+');
  for($r=0; $r<$retrial; $r++) for($i=0; $i<$numWeights; $i++) {
    $testData[$r][] = mt_rand(1, 20000)/1000;
    }
  fwrite ($handle, json_encode($testData));
  fclose($handle);
  }