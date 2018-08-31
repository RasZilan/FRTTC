<?php
require_once 'core/init.php';

function GetPlayerPosition($teamthatservedfirst, $team1points, $team2points, $matchlength, $matchposition, $numberofclearpoints, $servicelength, $counter) {


if($team1points > $team2points){
	$differenceinpointst1t2 = $team1points - $team2points;
	$differenceinpoints = $differenceinpointst1t2;	
} else if ($team2points > $team1points) {
	$differenceinpointst2t1 = $team2points - $team1points;
	$differenceinpoints = $differenceinpointst2t1;	
} else if ($team1points == $team2points) {
	$differenceinpoints = 0;
}

if((($team1points+1) == $matchlength) && ($differenceinpointst1t2 >= $numberofclearpoints)) {
	$matchwinner = 1;
	echo '<h1>Team 1 has won!</h1>';
} else {
	$matchwinner = 0;
}

if((($team2points+1) == $matchlength) && ($differenceinpointst2t1 >= $numberofclearpoints)) {
	$matchwinner = 2;
	echo '<h1>Team 2 has won!</h1>';	
} else {
	$matchwinner = 0;
}

if(($team1points >= $matchlength) && ($team2points >= $matchlength) && ($differenceinpoints == 0)) {
	$matchruleset = 2;
} else {
	$matchruleset = 1;
}


if(($matchruleset = 1) && ($teamthatservedfirst = 1)){
	$i=0;
	foreach ($GLOBALS['config']['doublesteam1servesfirst'] as $k => $v) {
	$i++;
	}
	
	$numrepeats = $counter % $i;
	
			$j = 'serve' . $numrepeats;
			
			if($j == 'serve0'){$j = 'serve8';}
		
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],0,1) == 1) {
				$pos1 = 'player2';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],0,1) == 2) {
				$pos1 = 'player1';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],2,1) == 1) {
				$pos2 = 'player2';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],2,1) == 2) {
				$pos2 = 'player1';
			}
	
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],4,1) == 3) {
				$pos3 = 'player3';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],4,1) == 4) {
				$pos3 = 'player4';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],6,1) == 3) {
				$pos4 = 'player3';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],6,1) == 4) {
				$pos4 = 'player4';
			}
			
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],3,1) == 's') {
				$teampos = 'team1';
			}
			if (substr($GLOBALS['config']['doublesteam1servesfirst'][$j],5,1) == 's') {
				$teampos = 'team2';
			}
}

if(($matchruleset = 2) && ($teamthatservedfirst = 1)){
}


if(($matchruleset = 1) && ($teamthatservedfirst = 2)){
	$i=0;
	foreach ($GLOBALS['config']['doublesteam1servesfirst'] as $k => $v) {
	$i++;
	}
		
	$numrepeats = $counter % $i;
	
			$j = 'serve' . $numrepeats;
			
			if($j == 'serve0'){$j = 'serve8';}
		
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],0,1) == 1) {
				$pos1 = 'player2';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],0,1) == 2) {
				$pos1 = 'player1';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],2,1) == 1) {
				$pos2 = 'player2';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],2,1) == 2) {
				$pos2 = 'player1';
			}
	
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],4,1) == 3) {
				$pos3 = 'player3';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],4,1) == 4) {
				$pos3 = 'player4';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],6,1) == 3) {
				$pos4 = 'player3';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],6,1) == 4) {
				$pos4 = 'player4';
			}
			
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],3,1) == 's') {
				$teampos = 'team2';
			}
			if (substr($GLOBALS['config']['doublesteam2servesfirst'][$j],5,1) == 's') {
				$teampos = 'team1';
			}			

}

if(($matchruleset = 2) && ($teamthatservedfirst = 2)){
}

return array($pos1, $pos2, $pos3, $pos4, $numrepeats, $j, $teampos, $i, $matchwinner);





}