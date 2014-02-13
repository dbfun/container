<?
final class TestAlgo {
  final public function __construct(AlgoPackage $algo) {
    $orderUnit = new OrderUnit();
    echo $algo->name.PHP_EOL;
    for ($numWeights = 3; $numWeights <=10; $numWeights++) {
      $samples = new WeightSamples('data/'.$numWeights.'.json');
      $this->test($samples, $orderUnit, $algo, $numWeights." weights");
      }
    
    $samples = new WeightSamples('data/realdata.json');
    $this->test($samples, $orderUnit, $algo, "real data");
    }
    
  private function test(WeightSamples $samples, OrderUnit $orderUnit, AlgoPackage $algo, $name) {
    $totalPackCount = 0;
    $totalPackUnit = 0;
    $totalDisp = 0;
    foreach ($samples as $weights) {
      $orderUnit->fill($weights);
      $algo->process($orderUnit);
      $algo->check($orderUnit);
      
      // Статистика
      $totalPackUnit++;
      $totalPackCount += $algo->packageUnit->count;
      $totalDisp += Dispersion::_()->put($orderUnit->data)->dispersion;
      }
    echo "Average packs per unit: ".number_format($totalPackCount / $totalPackUnit, 3).", dispersion: ".$totalDisp." - ".$name.PHP_EOL;
    }
  }