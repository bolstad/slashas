<?php 

 require __DIR__ . "/../vendor/autoload.php"; 
 

 use Slashas\Slashas;


 $funk = new Slashas\Slashas();

$funk->setEnvChecker( new Slashas\DetectEnviroment());

if ($funk->envChecker->isCli()) {
	echo "we are in cli!\n";
}