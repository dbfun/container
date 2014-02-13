<?
/**
 * Алгоритм «Наилучший подходящий» (Best Fit)
 */

class AlgoBestFit extends AlgoPackage {
  public $name = 'Наилучший подходящий (Best Fit)';
  public function process(OrderUnit $orderUnit) {
    $this->packageUnit = new BfPackageUnit();
    $unit =& $this->packageUnit;
    
    $step = 0; $cntNum = 0;
    foreach($orderUnit as $weight) {
      $step++;
      if ($step == 1) {
        $unit->put($cntNum, $weight);
        } else {
        $mostFilled = $unit->getMostFilled($weight);
        if ($mostFilled === false) {
          $cntNum++;
          $unit->put($cntNum, $weight);
          } else {
          $unit->put($mostFilled, $weight);
          }
        }
      }
    }
  }