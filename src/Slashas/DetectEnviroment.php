<?php namespace Slashas\Slashas;


class DetectEnviroment {


	function isCli() {
		if (php_sapi_name()=='cli')
			return true;
		else
			return false; 
	}



	function isHttp() {

	}


	function isSlack() {

	if (isset($_POST) && !empty($_POST['token'])) {
			return true;
		} else
		return false; 
	}
}