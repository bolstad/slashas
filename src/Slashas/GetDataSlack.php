<?php 

namespace Slashas\Slashas;


class GetDataSlack implements DataFetcherInterface {
	
	private $defaults = array();


	public function setDefaults( $data = array()) {
		$this->defaults = $data;
	}

    public function getVariable( $name ) {

    	if (isset($_POST[$name]))
    		return $_POST[$name]; 

    	if (isset($this->defaults[$name]))
	    	return $this->defaults[$name];

	    return; 

    }

}