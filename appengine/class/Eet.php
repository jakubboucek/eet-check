<?php
namespace Eet;

class Eet {
	private static $variables = [
		'dic',
		'date',
		'time',
		'price',
		'fik',
		'bkp',
	];

	public static function paramsToKey($params) {
		$filtered = [];

		foreach(self::$variables as $paramName) {
			if(isset($params[$paramName])) {
				$filtered[$paramName] = $_REQUEST[$param];
			}
		}

		return base64_encode( json_encode($params) );
	}

	public static function buildCheckUrl($baseUrl, $key) {
		$encoded = rawurlencode($key);
		$url = "$baseUrl#eet-check:$encoded";
		return $url;
	}
}