<?php
set_time_limit(0);
if (!defined('BASEPATH')) define('BASEPATH', dirname(__FILE__));
require_once(BASEPATH . "/geo/autoload.php");
require_once("database.php");

// $adapter  = new \Geocoder\HttpAdapter\BuzzHttpAdapter();
// $geocoder = new \Geocoder\Geocoder();
// "OpenStreetMapProvider"
$geocoder = new \Geocoder\Geocoder();
$adapter  = new \Geocoder\HttpAdapter\CurlHttpAdapter();
$chain    = new \Geocoder\Provider\ChainProvider(array(
    new \Geocoder\Provider\FreeGeoIpProvider($adapter),
    new \Geocoder\Provider\HostIpProvider($adapter),
    new \Geocoder\Provider\GoogleMapsProvider($adapter, 'ph_PH', 'Philippines', true)
));
$geocoder->registerProvider($chain);

// Get the relief centers
$sql_statement = "SELECT BLDG_NAME,TYPE,STATUS,HSE_NO,STREET,CITY_MUNIC FROM namria WHERE CITY_MUNIC LIKE '%MANILA%' ORDER BY id";
// $stmt = $dbh->query($sql_statement);
$result = $dbh->query($sql_statement);
// $result = $stmt->fetch(PDO::FETCH_ASSOC);
$json_arr[0] = array();
// foreach ($result as $row) {
// while (($row = $stmt->fetch()) != false) {
// var_dump($result);
while ($row = $result->fetch()) {
	$housenum = $row['HSE_NO'] . " ";
	if (!stristr($row['HSE_NO'], 'NO ')) $housenum = "";
	try {
		$geocode = $geocoder->geocode($housenum . $row['STREET'] . ', ' . $row['CITY_MUNIC']);
		var_export($geocode);
		$json_arr[0][] = array(
			'bn' => $row['BLDG_NAME'],
			't' => $row['TYPE'],
			's' => $row['STATUS'],
			'hn' => $row['HSE_NO'],
			'st' => $row['STREET'],
			'cm' => $row['CITY_MUNIC'],
			'lat' => $geocode['latitude'],
			'long' => $geocode['longitude']
		);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	exit;
}

// Get the feeds
// $sql_statement = "";
// $json_arr[1] = array();

echo json_encode($json_arr);