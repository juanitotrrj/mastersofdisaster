<?php
if (!defined('BASEPATH')) define('BASEPATH', dirname(dirname(__FILE__)));
require_once(BASEPATH . "/config.php");

if (($db_conn = mssql_connect($db['host'], $db['un'], $db['ps'])) == false) {
	die("Unable to connect to database.");
	exit;
}

mssql_select_db("mastersofdisaster", $db_conn);