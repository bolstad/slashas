<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentSlackTest extends PHPUnit_Framework_TestCase {
 

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsSlackTrue() {

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(true);
    $stub->method('isCli')->willReturn(true);
    $stub->method('isHttp')->willReturn(true);

    $testo = new Slashas\Slashas( $stub );
    $this->assertTrue($testo->isSlack());  	
  }

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsConsoleFalse() {

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(false);
    $stub->method('isCli')->willReturn(true);
    $stub->method('isHttp')->willReturn(true);

    $testo = new Slashas\Slashas( $stub );
    $this->assertFalse($testo->isSlack());  	
  }


  /**
   * Test if we are running slack via manipulated $_POST var
   */
public function testSetEnvtIsSlackTrue() {
    $_POST['token'] = time();
    $testo = new Slashas\Slashas( new Slashas\DetectEnviroment );
    $this->assertTrue($testo->isSlack());   
    unset($_POST['token']);

  }

  /**
   * Test if we are running slack via unsetted $_POST var
   */
  public function testSetEnvIsConsoleFalse() {
    unset($_POST['token']);
    $testo = new Slashas\Slashas( new Slashas\DetectEnviroment );
    $this->assertFalse($testo->isSlack());    
  }




}