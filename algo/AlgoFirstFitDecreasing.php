<?
/**
 * Алгоритм «Первый подходящий с упорядочиванием» (First Fit Decreasing)
 */

class AlgoFirstFitDecreasing extends AlgoBestFit {
  public $name = 'Наилучший подходящий (First Fit Decreasing)';
  public function process(OrderUnit $orderUnit) {
    $myOrderUnit = new FfdOrderUnit();
    $myOrderUnit->fill($orderUnit->data);
    parent::process($myOrderUnit);
    }
  }
