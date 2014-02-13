<?
class BfPackageUnit extends PackageUnit {
  public function freeSpace($containerId) {
    return $this->maxWeight - $this->weight($containerId);
    }
  public function getMostFilled($weight) {
    $containerIds = array_keys($this->containers);
    if(count($containerIds) == 0) return 0;
    
    foreach($containerIds as $containerId) {
      $freeSpace = $this->freeSpace($containerId);
      if ($freeSpace < $weight) continue;
      if (!isset($bestId)) {
        $bestId = $containerId;
        $_freeSpace = $freeSpace;
        } elseif ($freeSpace < $_freeSpace) {
        $bestId = $containerId;
        $_freeSpace = $freeSpace;
        }
      }
    
    return isset($bestId) ? $bestId : false;
    }
  }