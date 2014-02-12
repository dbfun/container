<?
class PackageUnit {
  private $containers = array(), $maxWeight = 20;
  
  public function __get($name) {
    switch ($name) {
      case 'count': return count($this->containers);
      case 'maxWeight': return $this->maxWeight;
      case 'totalWeight': return $this->totalWeight();
      default: trigger_error("No such property", E_USER_ERROR); return null;
      }
    }
  
  // Положить в контейнер
  public function put($containerId, $weight) {
    if ($weight > $this->maxWeight) {trigger_error("Weight is out of range", E_USER_ERROR); die();}
    $containerWeight = $this->weight($containerId);
    if ($containerWeight + $weight <= $this->maxWeight) {
      $this->containers[$containerId][] = $weight;
      return true;
      }
    return false;
    }
    
  // Вес контейнера
  public function weight($containerId) {
    if (!isset($this->containers[$containerId])) return 0;
    $totalWeight = 0;
    foreach($this->containers[$containerId] as $weight) {
      $totalWeight += $weight;
      }
    return $totalWeight;
    }
    
  // Общая схема контейнеров
  public function getSchema() {
    if (count($this->containers) == 0) return null;
    $ret = array();
    foreach ($this->containers as $containerId => $container) {
      $ret[] = implode(', ', $container);
      }
    return $ret;
    }
    
  private function totalWeight() {
    $containerIds = array_keys($this->containers);
    if(count($containerIds) == 0) return 0;
    $totalWeight = 0;
    foreach($containerIds as $containerId) {
      $totalWeight += $this->weight($containerId);
      }
    return $totalWeight;
    }
  }