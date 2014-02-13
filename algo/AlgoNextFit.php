<?
/**
 * Алгоритм «Следующий подходящий» (Next Fit)
 */

class AlgoNextFit extends AlgoPackage {
  public $name = 'Следующий подходящий (Next Fit)';
  public function process(OrderUnit $orderUnit) {
    $this->packageUnit = new PackageUnit();
    $unit =& $this->packageUnit;
    
    $step = 0; $cntNum = 0;
    foreach($orderUnit as $weight) {
      $step++;
      if ($step == 1) {
        $unit->put($cntNum, $weight);
        } else {
        if (!$unit->put($cntNum, $weight)) {
          $cntNum++;
          $unit->put($cntNum, $weight);
          }
        }
      }
    
    }
  }
