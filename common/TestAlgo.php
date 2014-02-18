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
    $packUnitCount = array();
    foreach ($samples as $weights) {
      $orderUnit->fill($weights);
      $algo->process($orderUnit);
      $algo->check($orderUnit);
      
      // Статистика
      $packUnitCount[] = $algo->packageUnit->count;
      }
      
    Math::_()->put($packUnitCount);
    echo "Average packs per unit: ".number_format(Math::_()->avg(), 3)
      ." mediana: ".Math::_()->mediana()." "
      ." moda: ".Math::_()->moda()." "
      ." - ".$name.PHP_EOL;
    }
  }