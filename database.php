<?php
if (!defined('BASEPATH')) define('BASEPATH', dirname(__FILE__));
require_once(BASEPATH . "/config.php");

try {
	// $dbh = new PDO("sqlsrv:Server=" . $db['host'] . ";Database=" . $db['ds'], $db['un'], $db['ps']);
	$dbh = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['ds'], $db['un'], $db['ps']);
	// echo "mysql:Server=" . $db['host'] . ";Database=" . $db['ds'] . PHP_EOL;
	// $dbh = mssql_pconnect($db['host'], $db['un'], $db['ps']);
} catch (Exception $e) {
	die($e->getMessage());
}