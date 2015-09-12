<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentSlackTest extends PHPUnit_Framework_TestCase {
 

  public function testIsSlackTrue() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isSlack'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(true);

  	$testo->setEnvChecker( $stub );
    $this->assertTrue($testo->isSlack());  	
  }


  public function testIsConsoleFalse() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isSlack'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(false);

  	$testo->setEnvChecker( $stub );
    $this->assertFalse($testo->isSlack());  	
  }




}