<?php 

namespace Slashas\Slashas;


class GetDataCli implements DataFetcherInterface {
	
	private $defaults = array();


	public function setDefaults( $data = array()) {
		$this->defaults = $data;
	}

    public function getVariable( $name ) {
    	return $this->defaults[$name];

    }

}