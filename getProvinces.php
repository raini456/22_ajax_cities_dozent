<?php

$iso3 = filter_input(INPUT_GET, 'iso3', FILTER_SANITIZE_STRING);

if (strlen($iso3) !== 3) {
 exit();
}

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('province');
//$db->setStatement('DISTINCT');
$db->setGroupBy('province');
$db->setOrderBy('province ASC');
$db->setWhere("iso3='$iso3'");
$data = $db->getData();

echo json_encode($data);
