<?
class TestAlgo {
  public function __construct(PackageAlgo $algo) {
    $orderUnit = new OrderUnit();
    echo $algo->name.PHP_EOL;
    for ($numWeights = 3; $numWeights <=10; $numWeights++) {
      $samples = new WeightSamples('data/'.$numWeights.'.json');
      $totalPackCount = 0;
      $totalPackUnit = 0;
      foreach ($samples as $weights) {
        $orderUnit->fill($weights);
        $algo->process($orderUnit);
        $algo->check($orderUnit);
        
        // Статистика
        $totalPackUnit++;
        $totalPackCount += $algo->packageUnit->count;
        }
      echo "Average packs per unit: ".number_format($totalPackCount / $totalPackUnit, 3)." - ".$numWeights." wights".PHP_EOL;
      }
    }
  }