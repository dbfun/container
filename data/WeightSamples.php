<?
class WeightSamples implements Iterator {
  private $position = 0;
  private $data = array();
  
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
    
  public function __construct($fileName) {
    $this->data = json_decode(file_get_contents($fileName));
    }  
  
  }