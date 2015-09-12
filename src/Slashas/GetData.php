<?php

namespace Slashas\Slashas;

class GetData {


	private $env = '';

	private $fetcher = '';

	public function setEnv( $env ) {
		$this->env = $env;
		$this->setupFetcher(); 
	}	


	public function setupFetcher() {

		if ($this->env == 'slack') {
#			$this->fetcher = new GetDataSlack();
		}

		if ($this->env == 'cli') {
			$this->fetcher = new GetDataCli();
		}

		if ($this->env == 'http') {
			$this->fetcher = new GetDataHttp();
		}

	}

	public function getVariable( $var ) {

		return $this->fetcher->getVariable( $var );

	}


	public function setDefaults( $data ) {
		$this->fetcher->setDefaults( $data );
	}

}