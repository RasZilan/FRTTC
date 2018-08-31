<?php
require_once 'core/init.php';


$user = DB::getInstance()->get('users',  array('username', '=', 'michael'));

if(!$user->count())  {
	echo 'No user';
} else {
	echo $user->first()->username;
}

/**
$userInsert = DB::getInstance()->insert('users', array(
	'username' => 'Dale',
	'password' => 'password',
	'salt' => 'salt'
));

if($userInsert) {
	echo 'Successful Insert!';
} else {
	echo 'Un-Successful Insert!';
}
*/

/**
$userUpdate = DB::getInstance()->update('FRTTCPlayers', 16, array(
	'name' => 'Dale Smith',
	'handicap' => '2',
	'singlegamesplayed' => '2'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}
**/

$userUpdate = DB::getInstance()->update('FRTTCPlayers', 16, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}

$userUpdate = DB::getInstance()->update('FRTTCPlayers', 17, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}

$userUpdate = DB::getInstance()->update('FRTTCPlayers', 18, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}

$userUpdate = DB::getInstance()->update('FRTTCPlayers', 19, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


$userUpdate = DB::getInstance()->update('FRTTCPlayers', 20, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


$userUpdate = DB::getInstance()->update('FRTTCPlayers', 21, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


$userUpdate = DB::getInstance()->update('FRTTCPlayers', 22, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


$userUpdate = DB::getInstance()->update('FRTTCPlayers', 23, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


$userUpdate = DB::getInstance()->update('FRTTCPlayers', 24, array(
	'assigned' => '0'
));

if($userUpdate) {
	echo 'Successful Update!';
} else {
	echo 'Un-Successful Update!';
}


//16 17 21 23 24

