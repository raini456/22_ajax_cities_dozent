<?php
require_once './config.php';
require_once './classes/DbClass.php';
require_once './classes/DbClassExt.php';
$insertions = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_STRING);
