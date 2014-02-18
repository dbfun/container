<?
class FfdOrderUnit extends OrderUnit {
  public function fill(array $data) {
    rsort($data);
    parent::fill($data);
    }
  }