<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentConsoleTest extends PHPUnit_Framework_TestCase {
  

  public function testIsConsoleTrue() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli'))
                         ->getMock();

    $stub->method('isCli')->willReturn(true);

	$testo->setEnvChecker( $stub );
    $this->assertTrue($testo->isConsole());  	
  }


  public function testIsConsoleFalse() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli'))
                         ->getMock();

    $stub->method('isCli')->willReturn(false);

	$testo->setEnvChecker( $stub );
    $this->assertFalse($testo->isConsole());  	
  }




}