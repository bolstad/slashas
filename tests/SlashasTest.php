<?php
 
require __DIR__ ."/../vendor/autoload.php";

use Slashas\Slashas;
 
class SlashasTest extends PHPUnit_Framework_TestCase {
 
  public function testTestsWorking()
  {
    $testo = new Slashas\Slashas;
    $this->assertTrue($testo->hasOk());
  }
 
}