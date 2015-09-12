<?php 


namespace Slashas\Slashas;


class DetectEnviroment {


	/**
	 * Detect if we are running in CLI (console) mode by inspecking the PHP_SAPI setting via php_sapi_name()
	 * @return bool
	 */
	function isCli() {
		if (php_sapi_name()=='cli')
			return true;
		else
			return false; 
	}


	/**
	 * Detect if we are running in HTTP (Web admin mode) by inspecting $_GET vars
	 * @return bool
	 */
	function isHttp() {

   	if (isset($_SERVER) && !empty($_SERVER['SERVER_NAME'])) {
			return true; 
		} else {
			return false;
		}
	}

	/**
	 * Detect if we are running in Slack API mode by inspecting $_POST vars 
	 * @return bool
	 */
	function isSlack() {

	if (isset($_POST) && !empty($_POST['token'])) {
			return true;
		} else {
		return false; 
		}
	}








}