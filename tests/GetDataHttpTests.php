<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class GetDataHttpTests extends PHPUnit_Framework_TestCase {
  
  /**
   * Test if can set a default value and then fetch it 
   */
  public function testVerifyDefaultValue() {
    $testo = new Slashas\GetDataHttp();
    $testo->setDefaults( array('token' => 'mytoken') );
    $this->assertEquals( 'mytoken', $testo->getVariable( 'token' ) );  	
  }

  /**
   * Test if we are getting an empty response if there is a miss in the default array 
   */
  public function testVerifyMisses() {
    $testo = new Slashas\GetDataHttp();
    $testo->setDefaults( array() );
    $this->assertEquals( '', $testo->getVariable( 'token' ) );   
  }

  /**
   * Test if we can manipulate the $_GET variable and then fetch the data
   */
  public function testVerifyForcedGet() {
    $testo = new Slashas\GetDataHttp();
    $testo->setDefaults( array() );
    $_GET['token'] = 'supertoken';
    $this->assertEquals( 'supertoken', $testo->getVariable( 'token' ) );   
    unset( $_GET['token'] );
  }
  
  

}