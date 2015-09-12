<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentSlackTest extends PHPUnit_Framework_TestCase {
 

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsSlackTrue() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isSlack'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(true);

  	$testo->setEnvChecker( $stub );
    $this->assertTrue($testo->isSlack());  	
  }

  /**
   * Test if we are running slack via mocked DetectEnviroment class
   */
  public function testMockedIsConsoleFalse() {
    $testo = new Slashas\Slashas;

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isSlack'))
                         ->getMock();

    $stub->method('isSlack')->willReturn(false);

  	$testo->setEnvChecker( $stub );
    $this->assertFalse($testo->isSlack());  	
  }


  /**
   * Test if we are running slack via manipulated $_POST var
   */
public function testSetEnvtIsSlackTrue() {
    $testo = new Slashas\Slashas;

    $env = new Slashas\DetectEnviroment;
    $testo->setEnvChecker( $env );


    $_POST['token'] = time();
    $this->assertTrue($testo->isSlack());   
    unset($_POST['token']);

  }

  /**
   * Test if we are running slack via unsetted $_POST var
   */
  public function testSetEnvIsConsoleFalse() {
    $testo = new Slashas\Slashas;

    unset($_POST['token']);
    $env = new Slashas\DetectEnviroment;
    $testo->setEnvChecker( $env );

    $this->assertFalse($testo->isSlack());    
  }




}