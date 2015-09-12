<?php 

namespace Slashas\Slashas;
 

class Slashas {
 
	/**
	 @var object
	**/
	 public $envChecker;
	 

	 public function __construct()  {
	 }


	/**
	 * Are we running in console (CLI) mode?
	 * @return bool
	 */
	 public function isConsole() {
	 	return $this->envChecker->isCli();
	 }

	/**
	 * Are we running in Slack mode (are we beeing called via a outgoing weekhook)?
	 * @return bool
	 */
	 public function isSlack() {
	 	return $this->envChecker->isSlack(); 	
	 }


	 public function isHttp() {
	 	return $this->envChecker->isHttp();
	 }

	/**
	 * Set our EnvChecker object 
	 * @param  DetectEnviroment 
	 */
	 public function setEnvChecker( $envChecker ) {
	 	$this->envChecker = $envChecker;
	 }


}
