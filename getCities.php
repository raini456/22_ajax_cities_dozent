<?php

$province = filter_input(INPUT_GET, 'province', FILTER_SANITIZE_STRING);

if (!is_string($province)) {
 exit();
}

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setColumns('id,city');
//$db->setStatement('DISTINCT');
//$db->setGroupBy('province');
$db->setOrderBy('city ASC');
$db->setWhere("province='$province'");
$data = $db->getData();

echo json_encode($data);
