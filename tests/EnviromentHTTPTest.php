<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentHTTPTest extends PHPUnit_Framework_TestCase {
  
  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsHTTPTrue() {
    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();
    $stub->method('isHttp')->willReturn( true );
    $stub->method('isSlack')->willReturn( false );
    $stub->method('isCli')->willReturn( false) ;

    $testo = new Slashas\Slashas( $stub );

    $this->assertTrue($testo->isHttp());  	
  }

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsHTTPFalse() {
    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();

    $stub->method('isHttp')->willReturn( false );
    $stub->method('isSlack')->willReturn( false );
    $stub->method('isCli')->willReturn( true );

    $testo = new Slashas\Slashas( $stub );

    $this->assertFalse($testo->isHttp());  	
  }

  /**
   * Test if we are running slack via manipulated $_GET var
   */
  public function testSetEnvIsHTTPTrue() {
    $_SERVER['SERVER_NAME'] = time();
    $testo = new Slashas\Slashas( new Slashas\DetectEnviroment );
    $this->assertTrue($testo->isHttp());    
    unset($_SERVER['SERVER_NAME']);
  }

  /**
   * Test if we are running slack via unsetted $_GET var
   */
  public function testSetEnvIsHTTPFalse() {
    unset($_SERVER['SERVER_NAME']);
    $testo = new Slashas\Slashas( new Slashas\DetectEnviroment );
    $this->assertFalse($testo->isHttp());   
  }




}