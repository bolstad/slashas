<?php namespace Slashas\Slashas;


class DetectEnviroment {


	function isCli() {
		if (php_sapi_name()=='cli')
			return true;
		else
			return false; 
	}
}