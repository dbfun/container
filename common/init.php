<?
require('data/WeightSamples.php');
function __autoload($className) {
  include 'common/'.$className.'.php';
}