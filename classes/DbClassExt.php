<?php

class DbClassExt extends DbClass {

 private $columns = '*';
 private $statement = '';
 private $orderby = '';
 private $where = '';
 private $groupby = '';

 public function setGroupBy(string $param) {
  $this->groupby = $param;
 }
 
 public function setWhere(string $param) {
  $this->where = $param;
 }

 /**
  * Sort by columns
  * examples
  * 
  * 
  * 
  * @param string $o examples id ASC,name DESC
  */
 public function setOrderBy(string $o) {
  $this->orderby = $o;
 }

 public function setStatement(string $st) {
  $this->statement = $st;
 }

 public function setColumns(string $cols) {
  $this->columns = $cols;
 }

 public function getColumns() {
  return $this->columns;
 }

 public function getData() {

//  $o = '';
//  $w = '';
//  
//  if ($this->orderby !== '') {
//   $o = ' ORDER BY ' . $this->orderby;
//  }
//  
//  if ($this->where !== '') {
//   $w = ' WHERE ' . $this->where;
//  }
  $o = ($this->orderby !== '') ? ' ORDER BY ' . $this->orderby : '' ;
  $w = ($this->where !== '') ? ' WHERE ' . $this->where : '';
  $g = ($this->groupby !== '') ? ' GROUP BY ' . $this->groupby : '';

  $query = sprintf("SELECT %s %s FROM %s %s %s %s", 
          $this->statement, $this->columns, $this->tableName, $w, $g, $o);
  $stmt = $this->query($query);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
 }

 public function insertArray(array $data = []) {
  $keys = array_keys($data);
  $amountValues = count($data[$keys[0]]);
  for ($i = 0; $i < $amountValues; $i++) {
   $tmp = [];
   for ($j = 0; $j < count($keys); $j++) {
    $tmp[$keys[$j]] = $data[$keys[$j]][$i];
   }
   $this->insert($tmp);
  }
 }

}
