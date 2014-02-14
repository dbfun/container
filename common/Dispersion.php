<?
class Dispersion {
  public function __construct() {}
  
  public static function _() {
    static $instance;
    if (is_object($instance)) return $instance;
    $instance = new self();
    return $instance;
    }
  
  private $sum, $count, $avg, $dispersion;
  public function __get($name) {
    return isset($this->$name) ? $this->$name : null;
    }
  
  public function put(array $data) {
    $this->sum = 0;
    $this->dispersion = 0;
    $this->count = count($data);
    
    foreach ($data as $value) {
      $this->sum += $value;
      }
      
    $this->avg = $this->sum / $this->count;
    
    foreach ($data as $value) {
      $this->dispersion += pow($value - $this->avg, 2);
      }
    return $this;
    }
  }