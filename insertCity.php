<?php

require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
require_once './classes/FilterForm.php';
sleep(1);
//echo 1;
$f = new FilterForm();
$f->setFilter('country', FILTER_SANITIZE_STRING, 'iso3');
$f->setFilter('city', FILTER_SANITIZE_STRING);
$f->setFilter('province', 513);
$f->setFilter('lat', FILTER_VALIDATE_FLOAT);
$f->setFilter('lng', 259);
$f->setFilter('pop', 259);

$data = $f->filter(INPUT_POST);
$db = new DbClassExt('mysql:host=' . HOST . ';dbname=' . DB, USER, PASSWORD);
$db->setTable('tb_cities');
$db->setStatement('DISTINCT');
$db->setColumns('iso2, country');
//var_dump($data['iso3']);
//var_dump($data['province']);
$where = sprintf("iso3='%s' AND province='%s'", $data['iso3'], $data['province']);
$db->setWhere($where);
$countryData = $db->getData();
if(count($countryData) != 1){
echo -1;
}
$data['country'] = $countryData[0]['country'];
$data['iso2'] = $countryData[0]['iso2'];
if(count($data) >= 5 && count($data) <= 8){
if($db->insert($data)>0){
echo 1;
}
else{
echo -1;
}
}
else{
echo -1;
}

