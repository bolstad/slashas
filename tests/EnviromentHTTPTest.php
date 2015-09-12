<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentHTTPTest extends PHPUnit_Framework_TestCase {
  
  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsHTTPTrue() {
    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();
    $stub->method('isHttp')->willReturn(true);

    $testo = new Slashas\Slashas;
  	$testo->setEnvChecker( $stub );
  
    $this->assertTrue($testo->isHttp());  	
  }

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsHTTPFalse() {
    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isHttp'))
                         ->getMock();
    $stub->method('isHttp')->willReturn(false);

    $testo = new Slashas\Slashas;
  	$testo->setEnvChecker( $stub );

    $this->assertFalse($testo->isHttp());  	
  }

  /**
   * Test if we are running slack via manipulated $_GET var
   */
  public function testSetEnvIsHTTPTrue() {
    $_SERVER['SERVER_NAME'] = time();
    $env = new Slashas\DetectEnviroment;  

    $testo = new Slashas\Slashas;
    $testo->setEnvChecker( $env );

    $this->assertTrue($testo->isHttp());    
    unset($_SERVER['SERVER_NAME']);
  }

  /**
   * Test if we are running slack via unsetted $_GET var
   */
  public function testSetEnvIsHTTPFalse() {
    unset($_SERVER['SERVER_NAME']);
    $env = new Slashas\DetectEnviroment;

    $testo = new Slashas\Slashas;
    $testo->setEnvChecker( $env );

    $this->assertFalse($testo->isHttp());   
  }




}