<?
class WeightSamples implements Iterator {
  private $position = 0;
  private $data = array();
  
  final public function rewind() {
    $this->position = 0;
    }

  final public function current() {
    return $this->data[$this->position];
    }

  final public function key() {
    return $this->position;
    }

  final public function next() {
    ++$this->position;
    }

  final public function valid() {
    return isset($this->data[$this->position]);
    }
    
  final public function __construct($fileName) {
    $this->data = json_decode(file_get_contents($fileName));
    }  
  
  }