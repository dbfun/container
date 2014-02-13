<?
abstract class AlgoPackage {
  public $packageUnit, $name;
  public abstract function process(OrderUnit $orderUnit);
  final public function check(OrderUnit $orderUnit) {
    $ouWeight = $orderUnit->totalWeight;
    $puWeight = $this->packageUnit->totalWeight;
    if (abs($ouWeight - $puWeight) >= 0.001) { // Float problem
    
      echo "orderUnit:".PHP_EOL.$orderUnit->getSchema().PHP_EOL;
      
      echo "packageUnit:".PHP_EOL.var_dump($this->packageUnit->getSchema()).PHP_EOL;
      
      echo PHP_EOL."orderUnit weight: ".$ouWeight.PHP_EOL;
      echo PHP_EOL."packageUnit weight: ".$puWeight.PHP_EOL;
      
      trigger_error("Invalid package algo!", E_USER_ERROR); return false;
      }
    return true;
    }
    
  final public function statistics() {
    echo $this->packageUnit->count;
    }
  }