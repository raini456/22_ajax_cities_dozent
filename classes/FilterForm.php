<?php

class FilterForm {

 private $scheme = [];

 public function __construct() {
  
 }
/**
 * 
 * @param string $field Eingabe des Input-Feldes
 * @param type $filter  Eingabe des Filters der Datenübergabe, z.B. FILTER_SANATIZE_STRING
 * @param type $column Eingabe der Datenbankspalte, optional, wenn DB-Name = INPUT-Name
 */
 public function setFilter(string $field, $filter, $column = false) {
  $c = (!$column) ? $field : $column;
  $this->scheme[] = [
      'fieldname' => $field,
      'columname' => $c,
      'filter' => $filter
  ];
 }

 public function getScheme() {
  return $this->scheme;
 }

 public function filter($method) {
  $data = [];
  foreach ($this->scheme as $item) {
   if (is_array($item['filter'])) {
    $val = filter_input($method, $item['fieldname'], $item['filter'][0], $item['filter'][1]);
   } else {
    $val = filter_input($method, $item['fieldname'], $item['filter']);
   }
   
   if ($val !== false && $val !== NULL) {
    $data[$item['columname']] = $val;
   }
  }
  return $data;
 }

}
