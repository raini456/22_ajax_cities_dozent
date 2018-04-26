<?php 

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!is_int($id)) {
 exit();
}

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';

$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setWhere("id=$id");
$data = $db->getData();

echo json_encode($data[0]);