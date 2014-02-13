<?
require_once('data/WeightSamples.php');


function __autoload($className) {
  $className = ucfirst($className);
  switch(true) {
    case file_exists('common/'.$className.'.php'):
      require_once('common/'.$className.'.php');
      break;
    case file_exists('algo/'.$className.'.php'):
      require_once('algo/'.$className.'.php');
      break;
    case file_exists('algo/custom/'.$className.'.php'):
      require_once('algo/custom/'.$className.'.php');
      break;
    default:
      trigger_error("No class ".$className, E_USER_ERROR);
    }
  }