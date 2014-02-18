#!/usr/bin/env php
<?
require_once('common/init.php');

$data = array(54, 57, 73, 54, 70, 67, 63);

Math::_()->put($data);

echo 'Avg: '.Math::_()->avg().PHP_EOL;
echo 'Mediana: '.Math::_()->mediana().PHP_EOL;
echo 'Moda: '.Math::_()->moda().PHP_EOL;