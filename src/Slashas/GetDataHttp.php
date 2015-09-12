<?php 

namespace Slashas\Slashas;


class GetDataHttp implements DataFetcherInterface {
	
	private $defaults = array();


	public function setDefaults( $data = array()) {
		$this->defaults = $data;
	}

    public function getVariable( $name ) {

    	if (isset($_GET[$name]))
    		return $_GET[$name]; 

    	if (isset($this->defaults[$name]))
	    	return $this->defaults[$name];

	    return; 

    }

}