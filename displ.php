#!/usr/bin/env php
<?
require_once('common/init.php');

$data = array(54, 57, 73, 70, 67, 63);
echo var_dump(Dispersion::_()->put($data)->dispersion);