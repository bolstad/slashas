<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class EnviromentConsoleTest extends PHPUnit_Framework_TestCase {
  

  public function testIsConsoleTrue() {

    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();

    $stub->method('isCli')->willReturn(true);
    $stub->method('isSlack')->willReturn(true);
    $stub->method('isHttp')->willReturn(true);

    $testo = new Slashas\Slashas( $stub );
    $this->assertTrue($testo->isConsole());  	
  }


  public function testIsConsoleFalse() {
    $stub = $this->getMockBuilder('DetectEnviroment')
                         ->setMethods(array('isCli','isSlack','isHttp'))
                         ->getMock();

    $stub->method('isCli')->willReturn(false);
    $stub->method('isSlack')->willReturn(true);
    $stub->method('isHttp')->willReturn(true);

    $testo = new Slashas\Slashas( $stub );
    $this->assertFalse($testo->isConsole());  	
  }




}