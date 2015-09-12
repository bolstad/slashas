<?php 

namespace Slashas\Slashas;
 

class Slashas {
 
	/**
	 @var object
	**/
	 public $envChecker;
	 

	 public function __construct( $envChecker )  {
	 	if ( !isset( $envChecker) ) {
	        throw new SlashasException('You need to set $envChecker!');
	 	}

	 	$this->setEnvChecker( $envChecker );
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



	 public function getEnv() {
	 	if ($this->isSlack()) {
	 		return 'slack'; 
	 	}

	 	if ($this->isHttp()) {
	 		return 'http'; 	 		
	 	}

	 	if ($this->isConsole()) {
	 		return 'cli'; 
	 	}

        throw new SlashasException('Unindenfied enviroment ' . print_r($_SERVER) . print_r($_GET) . print_r($_POST));


	 }

}
