<?php 

 require __DIR__ . "/../vendor/autoload.php"; 
 

 use Slashas\Slashas;


 $defaults = array(
 	'token' => time(), 
 	'team_id' => 'fooo_team_id',
 	'team_domain' => 'fooo_team_domain',
 	'channel_id' => 'foo_channel_id',
 	'channel_name' => 'foo_channel_name',
 	'timestamp' => time() . '.000005', 
 	'user_id' => 'foo_user_id',
 	'user_name' => 'foo_user_name',
 	'text' => 'foo_text',
 	'trigger_word' => 'foo'
 	);
 
 $funk = new Slashas\Slashas( new Slashas\DetectEnviroment());

 $funk->setDefaults( $defaults);
 $env = $funk->getEnv();


 echo "we are in '$env'\n";


 echo "token:" .  $funk->getVariable('token') . "\n";