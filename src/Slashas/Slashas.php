<?php namespace Slashas\Slashas;
 


class Slashas {
 
 var $envChecker;
 
 public function __construct()  {
 }

 public function hasOk() {
 	return true;
 }

 public function isConsole() {
 	return $this->envChecker->isCli();
 }

 public function setEnvChecker( $envChecker ) {
 	$this->envChecker = $envChecker;
 }


}
 
