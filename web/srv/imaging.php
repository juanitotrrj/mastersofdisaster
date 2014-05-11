<?php
if (!defined('BASEPATH')) define('BASEPATH', dirname(dirname(__FILE__)));
require_once(BASEPATH . "/database.php");
date_default_timezone_set($tz['timezone']);

// Receive the raw data
$image = file_get_contents('php://input');

// Create the image
$fh = fopen(BASEPATH . '/snap/image_' . date('YmdHis') . '.jpg', 'w');
fwrite($fh, $image);
fclose($fh);

// Record the image
$sql_statement = "INSERT INTO images () VALUES()";

