<?php

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB.';charset=utf8', USER, PASSWORD);
$db->setTable('tb_cities ');
$db->setColumns('iso3,country');
//$db->setStatement('DISTINCT');
$db->setGroupBy('country');
$db->setOrderBy('country ASC');
$data = $db->getData();

echo json_encode($data);

//$countries = [];
//foreach ($data as $key => $row) {
// $countries[] = $row['iso2'] . ';' . $row['country'];//AF;Afghanistan
//}
//echo implode(',', $countries);
////AF;Afghanistan,AX;Aland,AL;Albania,DZ;Algeria,.......
