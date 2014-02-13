<?
class OrderUnit implements Iterator {
  private $position = 0, $totalWeight = 0;
  private $data = array();
  
  public function fill(array $data) {
    $this->position = 0;
    $this->data = $data; 
    $this->totalWeight = 0;
    if (count($this->data) != 0) foreach($data as $weight) {
      $this->totalWeight += $weight;
      }
    }
    
  public function getSchema() {
    return implode(', ', $this->data);
    }
    
  public function __get($name) {
    switch($name) {
      case 'totalWeight': return $this->totalWeight;
      case 'data': return $this->data;
      default: trigger_error("No such property", E_USER_ERROR); return null;
      }
    }
    
  public function rewind() {
    $this->position = 0;
    }

  public function current() {
    return $this->data[$this->position];
    }

  public function key() {
    return $this->position;
    }

  public function next() {
    ++$this->position;
    }

  public function valid() {
    return isset($this->data[$this->position]);
    }
  }