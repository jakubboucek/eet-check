<?php

require_once(__DIR__.'/class/Eet.php');
require_once(__DIR__.'/class/Extension.php');

use \Eet\Eet,
	\Eet\Extension;

date_default_timezone_set('Europe/Prague');

$portalUrl = "https://adisspr.mfcr.cz/adistc/adis/idpr_pub/eet/uct/overeni.faces";
$url = Eet::buildCheckUrl( $portalUrl, Eet::paramsToKey($_REQUEST) );

if(Extension::isInstalled()) {
	header("Location:$url", TRUE, 302);
}
else {
	$backParameters = $_REQUEST;
	$query = http_build_query ( [
		"requestState" => json_encode( $backParameters )
	] );
	header("Location:/?$query", TRUE, 307);
}