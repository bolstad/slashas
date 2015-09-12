<?php 

 require __DIR__ . "/../vendor/autoload.php"; 
 

 use Slashas\Slashas;


 $funk = new Slashas\Slashas( new Slashas\DetectEnviroment());


 $env = $funk->getEnv();

 echo "we are in '$env'\n";

