<?php
/**
 * Created by Chris on 9/29/2014 3:58 PM.
 */

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'FRTTCuser',
        'password' => '',
        'db' => 'frttcdb'
    ),
    'remember' => array(
        'cookie_name' => 'FRTTChash',
        'cookie_expiry' => 604800
    ),
    'sessions' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
	
	//Table Tennis Data
	//if team 1 or 2 have 11 points and 2 points difference game ends
	
	//Step through Array for normal doubles service team 1 serves first
    'doublesteam1servesfirst' => array(
        'serve1' => '1n2s3r4n',
		'serve2' => '1n2s3r4n',
        'serve3' => '2n1r3s4n',
        'serve4' => '2n1r3s4n',
        'serve5' => '2n1s4r3n',
        'serve6' => '2n1s4r3n',
        'serve7' => '1n2r4s3n',
        'serve8' => '1n2r4s3n'
    ),
	//if team 1 or 2 have 11 points and 1 points difference game follows following pattern until there is 2 points difference and then winner is declared
    'doublesteam1servesfirst2clearpoints' => array(
        'serve1' => '1n2s3r4n',
		'serve2' => '2n1r3s4n',
        'serve3' => '2n1s4r3n',
        'serve4' => '1n2r4s3n'
    ),

	//alternatively if team 2 serves first then
    'doublesteam2servesfirst' => array(
        'serve1' => '1n2r3s4n',
		'serve2' => '1n2r3s4n',
        'serve3' => '1n2s4r3n',
        'serve4' => '1n2s4r3n',
        'serve5' => '2n1r4s3n',
        'serve6' => '2n1r4s3n',
        'serve7' => '2n1s3r4n',
        'serve8' => '2n1s3r4n'
    ),	
	
	//if team 1 or 2 have 11 points and 1 points difference game follows following pattern until there is 2 points difference and then winner is declared
    'doublesteam2servesfirst2clearpoints' => array(
        'serve1' => '1n2r3s4n',
		'serve2' => '1n2s4r3n',
        'serve3' => '2n1r4s3n',
        'serve4' => '2n1s3r4n'
    )	
);

spl_autoload_register(function($class) {
    require_once('classes/' . $class . '.php');
});

require_once 'functions/sanitize.php';
require_once 'functions/insertintomatch.php';
require_once 'functions/gamelogic.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('sessions/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}