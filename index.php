<?php
require_once("sqlite3.class.php");

$c = $_GET['c'];

require_once('controller/'. $c .'.php');

$commander = new $c;
$commander->_index();
