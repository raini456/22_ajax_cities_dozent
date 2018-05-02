<?php

$city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_STRING);
$province = filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING);
$iso3 = filter_input(INPUT_GET, 'iso3',FILTER_SANITIZE_STRING);


if (!is_string($city) || !is_string($province) || !is_string($iso3)) {
//bzw. if ($city===FALSE || $city===NULL || is_numeric($city))) {
  exit();
}

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setWhere("city='$city' AND province='$province' AND iso3='$iso3'");
$data = $db->getData();
//var_dump($data[0]);
//echo json_encode($data[0]);
echo (count($data)>0)?1:-1;
