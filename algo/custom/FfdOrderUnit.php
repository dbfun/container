<?
class FfdOrderUnit extends OrderUnit {
  public function fill(array $data) {
    arsort($data);
    parent::fill($data);
    }
  }