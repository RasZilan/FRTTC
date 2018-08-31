<?php
require_once 'core/init.php';


/*
$matchcreate = DB::getInstance()->insert('FRTTCDoublesSetup', array(
	'p1t1' 			=> '1',
	'p2t1' 			=> '2', 
	'p1t2' 			=> '3', 
	'p2t2' 			=> '4', 
	't1name' 		=> 'Alpha', 
	't2name' 		=> 'Beta',
	'gamename' 		=> 'Friendly',
	'teamwhoserves' => '1',
	'gamelength' 	=> '11',
	'servicelength' => '2',
	'bestof' 		=> '3',
	'clearvalue' 	=> '2',
	'gamecreated' 	=> date('Y-m-d H:i:s')
    ));
	
if($matchcreate) {
	Session::flash('home', 'Your match has been registered. You may now start the Match.');
	Redirect::to('index.php');
} else {
	Session::flash('home', 'Your match was not successfully registered. Please try again.');
	Redirect::to('FRTTCdoublesconfig.php');
}
*/
$i=1;
foreach ($GLOBALS['config']['doublesteam1servesfirst'] as $k => $v) {
	echo $v.' = '.$i; 
	echo '<br>';
	$i++;
}
	for ($t = 1; $t < $i; $t++) {
	$j = 'serve' . $t;
	echo 'position: '.$t.' has value: ';
	echo $GLOBALS['config']['doublesteam1servesfirst'][$j];
	echo ' and a string length of: '.strlen($GLOBALS['config']['doublesteam1servesfirst'][$j]);;
	echo '<br>';
	    for ($char = 0; $char < (strlen($GLOBALS['config']['doublesteam1servesfirst'][$j])); $char++) {
			echo 'char number: '.$char.' = '.substr($GLOBALS['config']['doublesteam1servesfirst'][$j],$char,1).' ';
			echo '<br>';
		}
	echo '<br>';
	}
?>