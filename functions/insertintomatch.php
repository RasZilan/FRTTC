<?php
require_once 'core/init.php';

function UpdateTheMatchDatabase($playerwhowonpoint, $playerwhoserved, $teamwhowonpoint, $match, $round, $position) {
	//echo 'Player who won the point: '.$playerwhowonpoint.' Player who served'.$playerwhoserved.' Team who won the point: '.$teamwhowonpoint.' Match Number: '.$match.' Round number: '.$round.' Position: '.$position;		
	$matchinsertvalue = DB::getInstance()->insert('frttcdoublesgame', array(
					'playerwhowonpoint' => $playerwhowonpoint,
					'playerwhoserved' => $playerwhoserved, 
					'teamwhowonpoint' => $teamwhowonpoint, 
					'time' => date('Y-m-d H:i:s'),					
					'match' => $match, 
					'rounds' => $round,
					'position' => $position
                ));
	if($matchinsertvalue) {
		//echo 'Successful Insert!';
	} else {
		echo 'Un-Successful Insert!';
	}	
}

function ReturnPlayerPoints($player, $match, $round) {
	$playerpointsinfo = DB::getInstance()->query("SELECT * FROM `frttcdoublesgame` WHERE `playerwhowonpoint` = ? AND `match` = ? AND `rounds` = ?", array(
		$player,
		$match,
		$round
	));
	if(!$playerpointsinfo->count()){
		//echo 'Match wasnt found!';
			$playerpoints = 0;
	} else {
		$playerpoints = $playerpointsinfo->count();
	}
	return array($playerpoints);
}

function ReturnTeamPoints($team, $match, $round) {
	$teampointsinfo = DB::getInstance()->query("SELECT * FROM `frttcdoublesgame` WHERE `teamwhowonpoint` = ? AND `match` = ? AND `rounds` = ?", array(
		$team,
		$match,
		$round
	));
	if(!$teampointsinfo->count()){
		//echo 'Match wasnt found!';
			$teampoints = 0;
	} else {
		$teampoints = $teampointsinfo->count();
	}
	return array($teampoints);
}