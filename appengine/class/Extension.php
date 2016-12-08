<?php
namespace Eet;

class Extension {
	public static function isInstalled() {
		return isset($_SERVER["HTTP_EET_CHECK_EXTENSION"]);
	}
}