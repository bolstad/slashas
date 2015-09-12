<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentHTTPTest extends PHPUnit_Framework_TestCase {
  

  public function testIsHTTPTrue() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();

    $stub->method('isHttp')->willReturn(true);

	$testo->setEnvChecker( $stub );
    $this->assertTrue($testo->isHttp());  	
  }


  public function testIsHTTPFalse() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();

    $stub->method('isHttp')->willReturn(false);

	$testo->setEnvChecker( $stub );
    $this->assertFalse($testo->isHttp());  	
  }




}