<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentHTTPTest extends PHPUnit_Framework_TestCase {
  

  public function testMockedIsHTTPTrue() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();

    $stub->method('isHttp')->willReturn(true);

	$testo->setEnvChecker( $stub );
    $this->assertTrue($testo->isHttp());  	
  }


  public function testMockedIsHTTPFalse() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();

    $stub->method('isHttp')->willReturn(false);

	$testo->setEnvChecker( $stub );
    $this->assertFalse($testo->isHttp());  	
  }

  public function testSetEnvIsHTTPTrue() {
    $testo = new Slashas\Slashas;

    $env = new Slashas\DetectEnviroment;
    $testo->setEnvChecker( $env );

    $_GET['action'] = time();

    $this->assertTrue($testo->isHttp());    

    unset($_GET['action']);
  }


  public function testSetEnvIsHTTPFalse() {
    $testo = new Slashas\Slashas;

    $env = new Slashas\DetectEnviroment;
    $testo->setEnvChecker( $env );


    $this->assertFalse($testo->isHttp());   
  }




}