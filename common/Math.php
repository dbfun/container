<?
class Math {
  public function __construct() {}
  
  public static function _() {
    static $instance;
    if (is_object($instance)) return $instance;
    $instance = new self();
    return $instance;
    }
  
  private $data;
  
  public function put(array $data) {
    $this->data = $data;
    return $this;
    }
    
  public function dispersion() {
    $sum = 0;
    $dispersion = 0;
    $count = count($this->data);
    
    foreach ($this->data as $value) {
      $sum += $value;
      }
      
    $avg = $sum / $count;
    
    foreach ($this->data as $value) {
      $dispersion += pow($value - $avg, 2);
      }
    return $dispersion;
    }
    
  public function mediana() {
    $data = $this->data;
    sort($data);
    
    // если количество элементов четное, то имеется два срединных значения, по которым вычисляется медиана
    if (is_int(count($data)/2)) {
      $el = count($data)/2 - 1;
      $el2 = $el + 1;
      $mediana = ($data[$el] + $data[$el2]) / 2;
      }
    // если количество элементов нечетное, то медиана равна центральному элементу ряда
    else {
      $el = round(count($data)/2) - 1;
      $mediana = $data[$el];
      }
    return $mediana;
    }
    
  public function moda() {
    $data = $this->data;
    $data = array_count_values($data);
    arsort($data);
    return array_shift(array_keys($data));
    }
    
  public function avg() {
    $sum = 0;
    foreach($this->data as $value) {
      $sum += $value;
      }
    return $sum / count($this->data);
    }
  }