<?php
require_once 'core/init.php';

function GetPlayerPosition($teamthatservedfirst, $team1points, $team2points, $matchlength, $matchposition, $numberofclearpoints, $servicelength, $counter, $SwitchoverPos) {


if($team1points > $team2points){
	$differenceinpointst1t2 = $team1points - $team2points;
	$differenceinpoints = $differenceinpointst1t2;	
} else {
	$differenceinpointst1t2 = $team2points - $team1points;
	$differenceinpoints = $differenceinpointst1t2;	
}

if ($team2points > $team1points) {
	$differenceinpointst2t1 = $team2points - $team1points;
	$differenceinpoints = $differenceinpointst2t1;
} else {
	$differenceinpointst2t1 = $team1points - $team2points;
	$differenceinpoints = $differenceinpointst2t1;	
}

if ($team1points == $team2points) {
	$differenceinpoints = 0;
}

/*
echo 'difference in points: '.$differenceinpoints;
echo '<br>';
echo 'team 1 points: '.$team1points;
echo '<br>';
echo 'team 2 points: '.$team2points;
echo '<br>';
*/


if(($team1points <= ($matchlength - 1)) && ($team2points <= ($matchlength - 1))){
	$matchruleset = 1;
} else if((($team1points >= $matchlength) && ($differenceinpointst1t2 > $numberofclearpoints)) or (($team2points >= $matchlength) && ($differenceinpointst2t1 > $numberofclearpoints))){
	$matchruleset = 2;
} else if((($team1points >= $matchlength) && ($differenceinpoints == 0)) or (($team2points >= $matchlength) && ($differenceinpoints == 0))){
	$matchruleset = 2;
} else {
	$matchruleset = 2;
}


if($teamthatservedfirst == 1){
	
	//echo 'using rulset 1 teamthatservedfirst 1:';
	$i=0;
	foreach ($GLOBALS['config']['doublesteam1servesfirstservicelength2'] as $k => $v) {
	$i++;
	}
	
	$numrepeats = $counter % $i;
	
	if(!isset($SwitchoverPos) or ($SwitchoverPos == '')){
			$j = 'serve' . $numrepeats;
	}else{
		$j = $SwitchoverPos;
	}		
			if($j == 'serve0'){$j = 'serve8';}
			
		
	//echo 'using rulset 2 teamthatservedfirst 1:';
	$f=0;
	foreach ($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j] as $k => $v) {
	$f++;
	}
	
	$numrepeats = $counter % $f;
	
			$g = 'serve' . $numrepeats;
			
			if($g == 'serve0'){$g = 'serve4';}


			
		if($matchruleset == 1){
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],0,1) == 1) {
				$pos1 = 'player2';
			}
		}
		if($matchruleset == 2){
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],0,1) == 1) {
				$pos1 = 'player2';
			}
		}	
			
			
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],0,1) == 2) {
				$pos1 = 'player1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],0,1) == 2) {
				$pos1 = 'player1';
			}
		}

		
		
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],2,1) == 1) {
				$pos2 = 'player2';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],2,1) == 1) {
				$pos2 = 'player2';
			}
		}		
		
			

		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],2,1) == 2) {
				$pos2 = 'player1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],2,1) == 2) {
				$pos2 = 'player1';
			}
		}	


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],4,1) == 3) {
				$pos3 = 'player3';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],4,1) == 3) {
				$pos3 = 'player3';
			}
		}	
		

		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],4,1) == 4) {
				$pos3 = 'player4';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],4,1) == 4) {
				$pos3 = 'player4';
			}
		}	


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],6,1) == 3) {
				$pos4 = 'player3';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],6,1) == 3) {
				$pos4 = 'player3';
			}
		}		


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],6,1) == 4) {
				$pos4 = 'player4';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],6,1) == 4) {
				$pos4 = 'player4';
			}
		}	
		
		
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],3,1) == 's') {
				$teampos = 'team1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],3,1) == 's') {
				$teampos = 'team1';
			}
		}			

			
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j]['serve1'],5,1) == 's') {
				$teampos = 'team2';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam1servesfirstservicelength2'][$j][$g],5,1) == 's') {
				$teampos = 'team2';
			}
		}		

}




if($teamthatservedfirst == 2){
	
	//echo 'using rulset 1 teamthatservedfirst 2:';
	$i=0;
	foreach ($GLOBALS['config']['doublesteam2servesfirstservicelength2'] as $k => $v) {
	$i++;
	}
	
	$numrepeats = $counter % $i;
	
	if(!isset($SwitchoverPos) or ($SwitchoverPos == '')){
			$j = 'serve' . $numrepeats;
	}else{
		$j = $SwitchoverPos;
	}		
			
			if($j == 'serve0'){$j = 'serve8';}
		
	//echo 'using rulset 2 teamthatservedfirst 2:';
	$f=0;
	foreach ($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j] as $k => $v) {
	$f++;
	}
	
	$numrepeats = $counter % $f;
	
			$g = 'serve' . $numrepeats;
			
			if($g == 'serve0'){$g = 'serve4';}


			
		if($matchruleset == 1){
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],0,1) == 1) {
				$pos1 = 'player2';
			}
		}
		if($matchruleset == 2){
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],0,1) == 1) {
				$pos1 = 'player2';
			}
		}	
			
			
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],0,1) == 2) {
				$pos1 = 'player1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],0,1) == 2) {
				$pos1 = 'player1';
			}
		}

		
		
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],2,1) == 1) {
				$pos2 = 'player2';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],2,1) == 1) {
				$pos2 = 'player2';
			}
		}		
		
			

		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],2,1) == 2) {
				$pos2 = 'player1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],2,1) == 2) {
				$pos2 = 'player1';
			}
		}	


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],4,1) == 3) {
				$pos3 = 'player3';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],4,1) == 3) {
				$pos3 = 'player3';
			}
		}	
		

		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],4,1) == 4) {
				$pos3 = 'player4';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],4,1) == 4) {
				$pos3 = 'player4';
			}
		}	


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],6,1) == 3) {
				$pos4 = 'player3';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],6,1) == 3) {
				$pos4 = 'player3';
			}
		}		


		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],6,1) == 4) {
				$pos4 = 'player4';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],6,1) == 4) {
				$pos4 = 'player4';
			}
		}	
		
		
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],3,1) == 's') {
				$teampos = 'team1';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],3,1) == 's') {
				$teampos = 'team1';
			}
		}			

			
		if($matchruleset == 1){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j]['serve1'],5,1) == 's') {
				$teampos = 'team2';
			}
		}
		if($matchruleset == 2){		
			if (substr($GLOBALS['config']['doublesteam2servesfirstservicelength2'][$j][$g],5,1) == 's') {
				$teampos = 'team2';
			}
		}		

}





//Calculates if Team 1 has won the match and sets $matchwinner to 1 if they have otherwise it sets it to 0
if(($team1points >= $matchlength) && ((isset($differenceinpoints)) && ($differenceinpoints >= $numberofclearpoints)) && ($team1points > $team2points)) {
	$matchwinner = 1;
	echo '<h1>Team 1 has won!</h1>';
} else {
	$matchwinner = 0;
}

//Calculates if Team 2 has won the match and sets $matchwinner to 2 if they have otherwise it sets it to 0
if(($team2points >= $matchlength) && ((isset($differenceinpoints)) && ($differenceinpoints >= $numberofclearpoints)) && ($team2points > $team1points)) {
	$matchwinner = 2;
	echo '<h1>Team 2 has won!</h1>';	
} else {
	$matchwinner = 0;
}

if((isset($matchruleset)) && ($matchruleset == 2)){ 
return array($pos1, $pos2, $pos3, $pos4, $numrepeats, $j, $teampos, $i, $matchwinner);
}
if((isset($matchruleset)) && ($matchruleset == 1)){ 
return array($pos1, $pos2, $pos3, $pos4, $numrepeats, '', $teampos, $i, $matchwinner);
}

}