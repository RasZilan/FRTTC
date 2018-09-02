
<script type="text/javascript">
function HandleChange(){
document.getElementById("FRTTCdoublesmatch").submit();
}

</Script>
<link rel="stylesheet" type="text/css" href="css/FRTTCdoublesmatch.css" />
<?php

require_once 'core/init.php';

$user = new User(); //Current

if($user->isLoggedIn()) {

/*
	if(isset($_POST['MatchPlay'])){
		echo 'MatchPlay:'.$_POST['MatchPlay'];
	} else {
		echo 'MatchPlay: not set';	
	}
	echo '<br>';
	if(isset($_POST['MatchStarted'])){
		echo 'MatchStarted:'.$_POST['MatchStarted'];
	} else {
		echo 'MatchStarted: not set';	
	}
	echo '<br>';
	if(isset($_POST['MatchPos'])){
		echo 'Match Position is:'.$_POST['MatchPos'];
	} else {
		echo 'Match Position: not set';	
	}
	echo '<br>';	
	if(isset($_POST['GamesList'])){
		echo 'GamesList:'.$_POST['GamesList'];
	} else {
		echo 'GamesList: not set';	
	}	
	echo '<br>';	
	if(isset($_POST['GamesStarted'])){
		echo 'GamesStarted:'.$_POST['GamesStarted'];
	} else {
		echo 'GamesStarted: not set';	
	}	
	echo '<br>';	
	if(isset($_POST['StartMatch'])){
		echo 'StartMatch:'.$_POST['StartMatch'];
	} else {
		echo 'StartMatch: not set';	
	}	
	echo '<br>';			
	if(isset($_POST['MatchNumber'])){
		echo 'MatchNumber:'.$_POST['MatchNumber'];
	} else {
		echo 'MatchNumber: not set';	
	}	
	echo '<br>';	

	if(isset($_POST['Player1ADDPoint'])){
		echo 'Player1ADDPoint:'.$_POST['Player1ADDPoint'];
	} else {
		echo 'Player1ADDPoint: not set';	
	}	
	echo '<br>';	
	if(isset($_POST['Player2ADDPoint'])){
		echo 'Player2ADDPoint:'.$_POST['Player2ADDPoint'];
	} else {
		echo 'Player2ADDPoint: not set';	
	}	
	echo '<br>';	
	if(isset($_POST['Player3ADDPoint'])){
		echo 'Player3ADDPoint:'.$_POST['Player3ADDPoint'];
	} else {
		echo 'Player3ADDPoint: not set';	
	}	
	echo '<br>';	
	if(isset($_POST['Player4ADDPoint'])){
		echo 'Player4ADDPoint:'.$_POST['Player4ADDPoint'];
	} else {
		echo 'Player4ADDPoint: not set';	
	}	
	echo '<br>';



	if(isset($Gamecounter)){
		echo 'The game position is:'.$Gamecounter;
	} else {
		echo 'The game position is: not set';	
	}	
	echo '<br>';
	if(isset($_POST['Team1ADDFailedServicePoint'])){
		echo 'The failed service point: went to:'.$_POST['Team1ADDFailedServicePoint'];
	} else {
		echo 'The failed service point: not set';	
	}	
	echo '<br>';
	if(isset($_POST['Team2ADDFailedServicePoint'])){
		echo 'The failed service point: went to:'.$_POST['Team2ADDFailedServicePoint'];
	} else {
		echo 'The failed service point: not set';	
	}	
	echo '<br>';
*/
	
	echo '<p>Go <a href="index.php">Back</a> a page!</p>';
?>

	<form action="FRTTCdoublesmatch.php" method="post" id="FRTTCdoublesmatch">

<?php
	if(isset($_POST['RemoveMatch']) && isset($_POST['GamesList'])){	
	$deletematch = DB::getInstance()->delete('frttcdoublessetup',  array('id', '=', $_POST['GamesList']));

		if(!$deletematch->count()) {
			echo 'No Matches deleted';
		} else {
			foreach($deletematch->results() as $deletematch) {
				echo 'The game with the name: ('.$deletematch->gamename.') has been deleted';
			}
		}
	
	}
	
//	if(((!isset($_POST['MatchPlay'])) && ((!isset($_POST['MatchStarted'])) or (!$_POST['MatchStarted'])))){ 
	if((!isset($_POST['MatchPlay'])) or ((!isset($_POST['GamesList'])))){
		if(((isset($_POST['MatchStarted'])) && ($_POST['MatchStarted'] == '0')) or (!isset($_POST['MatchStarted']))){ 
	
			$games = DB::getInstance()->query('SELECT * FROM frttcdoublessetup WHERE starttime IS NULL');
			if(!$games->count())  {
				Session::flash('home', 'No Matches Available');
			} else {
?>				<table border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td>
				<select name="GamesList" size="14" onchange="HandleChange();">
<?php
					foreach($games->results() as $games) {
						echo '<option value="'.$games->id.'"'; 
							if(isset($_POST['GamesList']) && $games->id == $_POST['GamesList']) {
								echo ' selected ';
							}
						echo '>'.$games->gamename.'</option>';
					}
?>				
				</select>
				</td>
				<td>
		
<?php
				if(isset($_POST['GamesList'])){
					$gameselected = DB::getInstance()->query('SELECT * FROM frttcdoublessetup WHERE id = '.$_POST['GamesList'].'');	
					if(!$gameselected->count())  {
						echo 'Team 1:
						<br>
						Player 1:
						<br>
						Player 2:
						<br><br>
						Team 2:
						<br>
						Player 1:
						<br>
						Player 2:
						';
					} else {
						foreach ($gameselected->results() as $gameselected){
							echo 'Best of: '.$gameselected->bestof.' games &nbsp;&nbsp; Game To: '.$gameselected->gamelength.' &nbsp;&nbsp; Service Length: '.$gameselected->servicelength.' &nbsp;&nbsp; with: '.$gameselected->clearvalue.' clear points';
							echo '<br><br>';							
							
							
							echo 'Team 1: '.$gameselected->t1name;
							echo '<br>';
							echo 'Player 1: ';
								$userselected = DB::getInstance()->get('frttcplayers',  array('id', '=', $gameselected->p1t1));
								if(!$userselected->count())  {
									echo 'No user';
								} else {
									echo $userselected->first()->name;
								}
							echo '<br>';
							echo 'Player 2: ';
								$userselected = DB::getInstance()->get('frttcplayers',  array('id', '=', $gameselected->p2t1));
								if(!$userselected->count())  {
									echo 'No user';
								} else {
									echo $userselected->first()->name;
								}
							echo '<br><br>';
							echo 'Team 2: '.$gameselected->t2name;
							echo '<br>';
							echo 'Player 1: ';
								$userselected = DB::getInstance()->get('frttcplayers',  array('id', '=', $gameselected->p1t2));
								if(!$userselected->count())  {
									echo 'No user';
								} else {
									echo $userselected->first()->name;
								}
							echo '<br>';
							echo 'Player 2: ';
								$userselected = DB::getInstance()->get('frttcplayers',  array('id', '=', $gameselected->p2t2));
								if(!$userselected->count())  {
									echo 'No user';
								} else {
									echo $userselected->first()->name;
								}
						}
					}  
				}
?>
		
				</td>
				</tr>
				<tr>
				<td>
				<br><br>
				<input type="submit" name="MatchPlay" id="MatchPlay" value="Play Selected Match">
				<input type="submit" name="RemoveMatch" id="RemoveMatch" value="Remove Selected Match">
				</td>
				<td>&nbsp;</td>
				</tr>
				</table>
<?php
				
			}
		}
	}

	if(((isset($_POST['MatchPlay'])) && (isset($_POST['GamesList']))) or ((isset($_POST['MatchStarted'])) && (($_POST['MatchStarted'] == 1))) or (isset($_POST['StartMatch']))) {
						
		if(isset($_POST['StartMatch'])){
			$StartMatch = True;
		}
	
		if(isset($_POST['GamesList'])) {
			$MatchNumber = $_POST['GamesList'];
		}
	
		if(isset($_POST['MatchPlay'])) {	
		$MatchStarted = '1';

		}
		
		if((isset($_POST['MatchStarted'])) && ($_POST['MatchStarted'] == 1)) {	
			$matchstatusUpdate = DB::getInstance()->update('frttcdoublessetup', $_POST['MatchNumber'], array(
				'starttime' => date('Y-m-d H:i:s')
			));

			if($matchstatusUpdate) {
				//echo 'Successful Start of Match :'.date('Y-m-d H:i:s');
			} else {
				//echo 'Un-Successful Start of Match :'.date('Y-m-d H:i:s');
			}
		}
		
		if(isset($_POST['MatchNumber']) or isset($MatchNumber)){
			if(isset($MatchNumber)){
				$gameschosen = DB::getInstance()->get('frttcdoublessetup',  array('id', '=', $MatchNumber));
			} else if(isset($_POST['MatchNumber'])) {
				$gameschosen = DB::getInstance()->get('frttcdoublessetup',  array('id', '=', $_POST['MatchNumber']));
			}
			
			if(!$gameschosen->count())  {
				//echo 'No Game Chosen';
			} else {
				$Gamename = $gameschosen->first()->gamename;
				$Team1Name = $gameschosen->first()->t1name;
				$Team2Name = $gameschosen->first()->t2name;
				$Bestof = $gameschosen->first()->bestof;
				$Gamelength = $gameschosen->first()->gamelength;
				$Servicelength = $gameschosen->first()->servicelength;
				$Clearvalue = $gameschosen->first()->clearvalue;			
				$player1select = $gameschosen->first()->p1t1;
				$player2select = $gameschosen->first()->p2t1;
				$player3select = $gameschosen->first()->p1t2;
				$player4select = $gameschosen->first()->p2t2;
				$teamthatservedfirst = $gameschosen->first()->teamwhoserves;
				
				$player1name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player1select));
				if(!$player1name->count())  {
					echo 'Player 1 of Team 1 Doesnt exist!';
				} else {
					$p1t1 = $player1name->first()->name;
				}
				$player2name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player2select));
				if(!$player2name->count())  {
					echo 'Player 2 of Team 1 Doesnt exist!';
				} else {
					$p2t1 = $player2name->first()->name;
				}
				$player3name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player3select));
				if(!$player3name->count())  {
					echo 'Player 1 of Team 2 Doesnt exist!';
				} else {
					$p1t2 = $player3name->first()->name;
				}
				$player4name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player4select));
				if(!$player4name->count())  {
					echo 'Player 2 of Team 2 Doesnt exist!';
				} else {
					$p2t2 = $player4name->first()->name;
				}
				
				$Team1Pos = 1;
				$Team2Pos = 2;
				$round = 1;
		
				if(isset($_POST['MatchNumber']) && isset($round)){
					$get_val = ReturnTeamPoints(1, $_POST['MatchNumber'], $round);
					$team1points = $get_val[0];
					$get_val = ReturnTeamPoints(2, $_POST['MatchNumber'], $round);
					$team2points = $get_val[0];
				}
		
				if(isset($MatchNumber) && isset($round)){
					$get_val = ReturnTeamPoints(1, $MatchNumber, $round);
					$team1points = $get_val[0];
					$get_val = ReturnTeamPoints(2, $MatchNumber, $round);
					$team2points = $get_val[0];
				}	
		
				if(isset($SwitchoverPos)){
					$j = $SwitchoverPos;
				} else {
					$j = '';
				}					
				if(isset($_POST['SwitchoverPos'])){
					$j = $_POST['SwitchoverPos'];
				} else {
					$j = '';
				}			
		
				$matchlength = 11;
				$matchposition = 6;
				$numberofclearpoints = 2;
				$servicelength = 2;
		
				if(isset($_POST['MatchPos'])){
					$inc = $_POST['MatchPos'];
					$get_val = GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$inc,$j);
				} else {
					$inc = 1;
					$get_val = GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$inc,$j);
				}
		 
				if($get_val[0] == 'player1'){ $Player1Pos = 1; }		
				if($get_val[0] == 'player2'){ $Player1Pos = 2; }
				if($get_val[0] == 'player3'){ $Player1Pos = 3; }
				if($get_val[0] == 'player4'){ $Player1Pos = 4; }
		
				if($get_val[1] == 'player1'){ $Player2Pos = 1; }		
				if($get_val[1] == 'player2'){ $Player2Pos = 2; }
				if($get_val[1] == 'player3'){ $Player2Pos = 3; }
				if($get_val[1] == 'player4'){ $Player2Pos = 4; }

				if($get_val[2] == 'player1'){ $Player3Pos = 1; }		
				if($get_val[2] == 'player2'){ $Player3Pos = 2; }
				if($get_val[2] == 'player3'){ $Player3Pos = 3; }
				if($get_val[2] == 'player4'){ $Player3Pos = 4; }

				if($get_val[3] == 'player1'){ $Player4Pos = 1; }		
				if($get_val[3] == 'player2'){ $Player4Pos = 2; }
				if($get_val[3] == 'player3'){ $Player4Pos = 3; }
				if($get_val[3] == 'player4'){ $Player4Pos = 4; }
		
				if($get_val[6] == 'team1'){ $TeamServing = 1; }
				if($get_val[6] == 'team2'){ $TeamServing = 2; }	

				if($get_val[8] == 1){ $TeamWhoWon = 1; }
				if($get_val[8] == 2){ $TeamWhoWon = 2; }

				$SwitchoverPos = $get_val[5];
				
				if(isset($TeamWhoWon)){		
					if($TeamWhoWon == 1){
						Session::flash('home', 'Team 1 has won this match');
					}
					if($TeamWhoWon == 2){
						Session::flash('home', 'Team 2 has won this match');
					}
				}
				
			}
		}			
		
	
		if(isset($_POST['MatchNumber'])){
			if(isset($TeamServing) && $TeamServing==1){
				$playerwhoserved = $player1select;
			}
			if(isset($TeamServing) && $TeamServing==2){
				$playerwhoserved = $player3select;
			}
			
			if(isset($_POST['Player1ADDPoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(intval($player1select), intval($playerwhoserved), 1, intval($_POST['MatchNumber']), 1, intval($Gamecounter));
			}
			if(isset($_POST['Player2ADDPoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(intval($player2select), intval($playerwhoserved), 1, intval($_POST['MatchNumber']), 1, intval($Gamecounter));	
			}
			if(isset($_POST['Player3ADDPoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(intval($player3select), intval($playerwhoserved), 2, intval($_POST['MatchNumber']), 1, intval($Gamecounter));
			}
			if(isset($_POST['Player4ADDPoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(intval($player4select), intval($playerwhoserved), 2, intval($_POST['MatchNumber']), 1, intval($Gamecounter));
			}
			if(isset($_POST['Team1ADDFailedServicePoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(0, intval($playerwhoserved), 1, intval($_POST['MatchNumber']), 1, intval($Gamecounter));
			}
			if(isset($_POST['Team2ADDFailedServicePoint'])){
				if(!isset($Gamecounter)){$Gamecounter=0;}
				$Gamecounter = $_POST['MatchPos'] + 1;
				$MatchPos = $Gamecounter;
				UpdateTheMatchDatabase(0, intval($playerwhoserved), 2, intval($_POST['MatchNumber']), 1, intval($Gamecounter));	
			}
		}
		
		if(isset($_POST['MatchNumber']) or isset($MatchNumber)){
			if(isset($MatchNumber)){
				$gameschosen = DB::getInstance()->get('frttcdoublessetup',  array('id', '=', $MatchNumber));
			} else if(isset($_POST['MatchNumber'])) {
				$gameschosen = DB::getInstance()->get('frttcdoublessetup',  array('id', '=', $_POST['MatchNumber']));
			}
			
			if(!$gameschosen->count())  {
				//echo 'No Game Chosen';
			} else {
				$Gamename = $gameschosen->first()->gamename;
				$Team1Name = $gameschosen->first()->t1name;
				$Team2Name = $gameschosen->first()->t2name;
				$Bestof = $gameschosen->first()->bestof;
				$Gamelength = $gameschosen->first()->gamelength;
				$Servicelength = $gameschosen->first()->servicelength;
				$Clearvalue = $gameschosen->first()->clearvalue;			
				$player1select = $gameschosen->first()->p1t1;
				$player2select = $gameschosen->first()->p2t1;
				$player3select = $gameschosen->first()->p1t2;
				$player4select = $gameschosen->first()->p2t2;
				$teamthatservedfirst = $gameschosen->first()->teamwhoserves;
				
				$player1name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player1select));
				if(!$player1name->count())  {
					echo 'Player 1 of Team 1 Doesnt exist!';
				} else {
					$p1t1 = $player1name->first()->name;
				}
				$player2name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player2select));
				if(!$player2name->count())  {
					echo 'Player 2 of Team 1 Doesnt exist!';
				} else {
					$p2t1 = $player2name->first()->name;
				}
				$player3name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player3select));
				if(!$player3name->count())  {
					echo 'Player 1 of Team 2 Doesnt exist!';
				} else {
					$p1t2 = $player3name->first()->name;
				}
				$player4name = DB::getInstance()->get('frttcplayers',  array('id', '=', $player4select));
				if(!$player4name->count())  {
					echo 'Player 2 of Team 2 Doesnt exist!';
				} else {
					$p2t2 = $player4name->first()->name;
				}
				
				$Team1Pos = 1;
				$Team2Pos = 2;
				$round = 1;
		
				if(isset($_POST['MatchNumber']) && isset($round)){
					$get_val = ReturnTeamPoints(1, $_POST['MatchNumber'], $round);
					$team1points = $get_val[0];
					$get_val = ReturnTeamPoints(2, $_POST['MatchNumber'], $round);
					$team2points = $get_val[0];
				}
		
				if(isset($MatchNumber) && isset($round)){
					$get_val = ReturnTeamPoints(1, $MatchNumber, $round);
					$team1points = $get_val[0];
					$get_val = ReturnTeamPoints(2, $MatchNumber, $round);
					$team2points = $get_val[0];
				}	
		
				if(isset($SwitchoverPos)){
					$j = $SwitchoverPos;
				} else {
					$j = '';
				}					
				if(isset($_POST['SwitchoverPos'])){
					$j = $_POST['SwitchoverPos'];
				} else {
					$j = '';
				}					
		
				$matchlength = 11;
				$matchposition = 6;
				$numberofclearpoints = 2;
				$servicelength = 2;
		
				if(isset($_POST['MatchPos'])){
					$inc = $_POST['MatchPos'];
					$get_val = GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$inc,$j);
				} else {
					$inc = 1;
					$get_val = GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$inc,$j);
				}
		 
				if($get_val[0] == 'player1'){ $Player1Pos = 1; }		
				if($get_val[0] == 'player2'){ $Player1Pos = 2; }
				if($get_val[0] == 'player3'){ $Player1Pos = 3; }
				if($get_val[0] == 'player4'){ $Player1Pos = 4; }
		
				if($get_val[1] == 'player1'){ $Player2Pos = 1; }		
				if($get_val[1] == 'player2'){ $Player2Pos = 2; }
				if($get_val[1] == 'player3'){ $Player2Pos = 3; }
				if($get_val[1] == 'player4'){ $Player2Pos = 4; }

				if($get_val[2] == 'player1'){ $Player3Pos = 1; }		
				if($get_val[2] == 'player2'){ $Player3Pos = 2; }
				if($get_val[2] == 'player3'){ $Player3Pos = 3; }
				if($get_val[2] == 'player4'){ $Player3Pos = 4; }

				if($get_val[3] == 'player1'){ $Player4Pos = 1; }		
				if($get_val[3] == 'player2'){ $Player4Pos = 2; }
				if($get_val[3] == 'player3'){ $Player4Pos = 3; }
				if($get_val[3] == 'player4'){ $Player4Pos = 4; }
		
				if($get_val[6] == 'team1'){ $TeamServing = 1; }
				if($get_val[6] == 'team2'){ $TeamServing = 2; }	

				if($get_val[8] == 1){ $TeamWhoWon = 1; }
				if($get_val[8] == 2){ $TeamWhoWon = 2; }
				
				$SwitchoverPos = $get_val[5];
		
				if(isset($TeamWhoWon)){		
					if($TeamWhoWon == 1){
						Session::flash('home', 'Team 1 has won this match');
					}
					if($TeamWhoWon == 2){
						Session::flash('home', 'Team 2 has won this match');
					}
				}
				
			}
		}	
		
?>
	<center>
	<table border="1" cellpadding="0" cellspacing="0">
	<tr>
	<td colspan="2" align="center">
	Team 1 Name:
	<?php if(!isset($Team1Name)){echo 'NOT SET!';}else if(isset($Team1Name)){echo '<h2>'.$Team1Name.'</h2>';}else{echo 'NOT SET!';}?>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Team1Pos) && $Team1Pos == 1) {
			$get_val = ReturnTeamPoints(1, $_POST['MatchNumber'], $round);
			echo '<h1 id="Scores">'.$get_val[0].'</h1>';			
		}
		if(isset($Team2Pos) && $Team2Pos == 1) {
			$get_val = ReturnTeamPoints(2, $_POST['MatchNumber'], $round);
			echo '<h1 id="Scores">'.$get_val[0].'</h1>';
		}
	}
	?>	
	</td>
	<td align="center">Doubles Game Name:
	<br><?php if(!isset($Gamename)){echo 'NOT SET!';}else if(isset($Gamename)){echo '<h2>'.$Gamename.'</h2>';}else{echo 'NOT SET!';}?>
	Best of:&nbsp;  
	<?php if(!isset($Bestof)){echo 'NOT SET!';}else if(isset($Bestof)){echo $Bestof;}else{echo 'NOT SET!';}?>
	Games &nbsp;&nbsp; Game To:&nbsp; 
	<?php if(!isset($Gamelength)){echo 'NOT SET!';}else if(isset($Gamelength)){echo $Gamelength;}else{echo 'NOT SET!';}?>
	&nbsp;&nbsp; Service Length:&nbsp;
	<?php if(!isset($Servicelength)){echo 'NOT SET!';}else if(isset($Servicelength)){echo $Servicelength;}else{echo 'NOT SET!';}?>
	&nbsp;&nbsp; With:&nbsp;
	<?php if(!isset($Clearvalue)){echo 'NOT SET!';}else if(isset($Clearvalue)){echo $Clearvalue;}else{echo 'NOT SET!';}?>
	Clear Points
	<br>
	<?php if(isset($Bestof)){echo 'Game: 1 of '.$Bestof;} ?>
	</td>
	<td colspan="2" align="center">
	Team 2 Name:
	<?php if(!isset($Team2Name)){echo 'NOT SET!';}else if(isset($Team2Name)){echo '<h2>'.$Team2Name.'</h2>';}else{echo 'NOT SET!';}?>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Team1Pos) && $Team1Pos == 2) {
			$get_val = ReturnTeamPoints(1, $_POST['MatchNumber'], $round);
			echo '<h1 id="Scores">'.$get_val[0].'</h1>';			
		}
		if(isset($Team2Pos) && $Team2Pos == 2) {
			$get_val = ReturnTeamPoints(2, $_POST['MatchNumber'], $round);
			echo '<h1 id="Scores">'.$get_val[0].'</h1>';
		}
	}
	?>		
	</td>
	</tr>
	<tr>
	<td valign="top">User 2 Name:<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1)) or (isset($_POST['MatchPlay']))){
		if(isset($Player1Pos) && $Player1Pos == 2) {
			echo '<h2>'.$p1t1.'</h2>';
		}
		if(isset($Player2Pos) && $Player2Pos == 2) {
			echo '<h2>'.$p2t1.'</h2>';
		}
		if(isset($Player3Pos) && $Player3Pos == 2) {
			echo '<h2>'.$p1t2.'</h2>';
		}
		if(isset($Player4Pos) && $Player4Pos == 2) {
			echo '<h2>'.$p2t2.'</h2>';
		}
	}
	?>	
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 2) {
			echo '<input type="submit" name="Player1ADDPoint" id="Player1ADDPoint" value="+">';
		}
		if(isset($Player2Pos) && $Player2Pos == 2) {
			echo '<input type="submit" name="Player2ADDPoint" id="Player2ADDPoint" value="+">';
		}
		if(isset($Player3Pos) && $Player3Pos == 2) {
			echo '<input type="submit" name="Player3ADDPoint" id="Player3ADDPoint" value="+">';
		}
		if(isset($Player4Pos) && $Player4Pos == 2) {
			echo '<input type="submit" name="Player4ADDPoint" id="Player4ADDPoint" value="+">';
		}
	}
	?>
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 2) {
			$get_val = ReturnPlayerPoints($player1select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player2Pos) && $Player2Pos == 2) {
			$get_val = ReturnPlayerPoints($player2select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player3Pos) && $Player3Pos == 2) {
			$get_val = ReturnPlayerPoints($player3select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player4Pos) && $Player4Pos == 2) {
			$get_val = ReturnPlayerPoints($player4select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
	}
	?>
	</td>
	<td><img src="pictures/person-left.jpg"></td>
	<td rowspan="3"><img src="pictures/table.jpg"></td>
	<td><img src="pictures/person-right.jpg"></td>
	<td valign="top">User 1 Name:<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1)) or (isset($_POST['MatchPlay']))){
		if(isset($Player1Pos) && $Player1Pos == 3) {
			echo '<h2>'.$p1t1.'</h2>';
		}
		if(isset($Player2Pos) && $Player2Pos == 3) {
			echo '<h2>'.$p2t1.'</h2>';
		}
		if(isset($Player3Pos) && $Player3Pos == 3) {
			echo '<h2>'.$p1t2.'</h2>';
		}
		if(isset($Player4Pos) && $Player4Pos == 3) {
			echo '<h2>'.$p2t2.'</h2>';
		}
	}
	?>	
	<br>	
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 3) {
			echo '<input type="submit" name="Player1ADDPoint" id="Player1ADDPoint" value="+">';
		}
		if(isset($Player2Pos) && $Player2Pos == 3) {
			echo '<input type="submit" name="Player2ADDPoint" id="Player2ADDPoint" value="+">';
		}
		if(isset($Player3Pos) && $Player3Pos == 3) {
			echo '<input type="submit" name="Player3ADDPoint" id="Player3ADDPoint" value="+">';
		}
		if(isset($Player4Pos) && $Player4Pos == 3) {
			echo '<input type="submit" name="Player4ADDPoint" id="Player4ADDPoint" value="+">';
		}
	}
	?>
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 3) {
			$get_val = ReturnPlayerPoints($player1select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player2Pos) && $Player2Pos == 3) {
			$get_val = ReturnPlayerPoints($player2select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player3Pos) && $Player3Pos == 3) {
			$get_val = ReturnPlayerPoints($player3select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player4Pos) && $Player4Pos == 3) {
			$get_val = ReturnPlayerPoints($player4select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
	}
	?>
	<br><?php if((isset($TeamServing)) && ($TeamServing == 1)){echo ' SERVING <br><img src="pictures/serving-bat.jpg">';}else{echo ' &nbsp; <br><img src="pictures/no-bat.jpg">';}?>
	</td>
	<tr>
	<td valign="top">User 1 Name:<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1)) or (isset($_POST['MatchPlay']))){
		if(isset($Player1Pos) && $Player1Pos == 1) {
			echo '<h2>'.$p1t1.'</h2>';
		}
		if(isset($Player2Pos) && $Player2Pos == 1) {
			echo '<h2>'.$p2t1.'</h2>';
		}
		if(isset($Player3Pos) && $Player3Pos == 1) {
			echo '<h2>'.$p1t2.'</h2>';
		}
		if(isset($Player4Pos) && $Player4Pos == 1) {
			echo '<h2>'.$p2t2.'</h2>';
		}
	}
	?>
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 1) {
			echo '<input type="submit" name="Player1ADDPoint" id="Player1ADDPoint" value="+">';
		}
		if(isset($Player2Pos) && $Player2Pos == 1) {
			echo '<input type="submit" name="Player2ADDPoint" id="Player2ADDPoint" value="+">';
		}
		if(isset($Player3Pos) && $Player3Pos == 1) {
			echo '<input type="submit" name="Player3ADDPoint" id="Player3ADDPoint" value="+">';
		}
		if(isset($Player4Pos) && $Player4Pos == 1) {
			echo '<input type="submit" name="Player4ADDPoint" id="Player4ADDPoint" value="+">';
		}
	}
	?>
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 1) {
			$get_val = ReturnPlayerPoints($player1select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player2Pos) && $Player2Pos == 1) {
			$get_val = ReturnPlayerPoints($player2select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player3Pos) && $Player3Pos == 1) {
			$get_val = ReturnPlayerPoints($player3select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player4Pos) && $Player4Pos == 1) {
			$get_val = ReturnPlayerPoints($player4select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
	}
	?>	
		<br><?php if((isset($TeamServing)) && ($TeamServing == 2)){echo ' SERVING <br><img src="pictures/serving-bat.jpg">';}else{echo ' &nbsp; <br><img src="pictures/no-bat.jpg">';}?>
	</td>
	<td><img src="pictures/person-left.jpg"></td>
	<td><img src="pictures/person-right.jpg"></td>
	<td valign="top">User 2 Name:<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1)) or (isset($_POST['MatchPlay']))){
		if(isset($Player1Pos) && $Player1Pos == 4) {
			echo '<h2>'.$p1t1.'</h2>';
		}
		if(isset($Player2Pos) && $Player2Pos == 4) {
			echo '<h2>'.$p2t1.'</h2>';
		}
		if(isset($Player3Pos) && $Player3Pos == 4) {
			echo '<h2>'.$p1t2.'</h2>';
		}
		if(isset($Player4Pos) && $Player4Pos == 4) {
			echo '<h2>'.$p2t2.'</h2>';
		}
	}
	?>	
	<br>	
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 4) {
			echo '<input type="submit" name="Player1ADDPoint" id="Player1ADDPoint" value="+">';
		}
		if(isset($Player2Pos) && $Player2Pos == 4) {
			echo '<input type="submit" name="Player2ADDPoint" id="Player2ADDPoint" value="+">';
		}
		if(isset($Player3Pos) && $Player3Pos == 4) {
			echo '<input type="submit" name="Player3ADDPoint" id="Player3ADDPoint" value="+">';
		}
		if(isset($Player4Pos) && $Player4Pos == 4) {
			echo '<input type="submit" name="Player4ADDPoint" id="Player4ADDPoint" value="+">';
		}
	}
	?>
	<br>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($Player1Pos) && $Player1Pos == 4) {
			$get_val = ReturnPlayerPoints($player1select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player2Pos) && $Player2Pos == 4) {
			$get_val = ReturnPlayerPoints($player2select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player3Pos) && $Player3Pos == 4) {
			$get_val = ReturnPlayerPoints($player3select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
		if(isset($Player4Pos) && $Player4Pos == 4) {
			$get_val = ReturnPlayerPoints($player4select, $_POST['MatchNumber'], $round);
			echo '<h1>'.$get_val[0].'</h1>';
		}
	}
	?>	
	</td>
	</tr>
	<td>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($TeamServing) && $TeamServing==2) {
			if(isset($Team1Pos) && $Team1Pos == 1) {
				echo '<input type="submit" name="Team2ADDFailedServicePoint" id="Team2ADDFailedServicePoint" value="+"> Fowl on Service';
			}
			if(isset($Team2Pos) && $Team2Pos == 1) {
				echo '<input type="submit" name="Team1ADDFailedServicePoint" id="Team1ADDFailedServicePoint" value="+"> Fowl on Service';
			}
		}
	}
	?>	
	</td>
	<td>&nbsp;&nbsp;</td>	
	<td>&nbsp;&nbsp;</td>
	<td>
	<?php 
	if((isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == 1))){
		if(isset($TeamServing) && $TeamServing==1) {
			if(isset($Team1Pos) && $Team1Pos == 2) {
				echo '<input type="submit" name="Team2ADDFailedServicePoint" id="Team2ADDFailedServicePoint" value="+"> Fowl on Service';
			}
			if(isset($Team2Pos) && $Team2Pos == 2) {
				echo '<input type="submit" name="Team1ADDFailedServicePoint" id="Team1ADDFailedServicePoint" value="+"> Fowl on Service';
			}
		}
	}
	?>
	</td>	
	<tr>
	</tr>
	</table>
	</center>
<?php 

/*
	if(isset($Gamecounter)){
		echo 'The game position is:'.$Gamecounter;
	}
*/
	
	
	if(!isset($_POST['StartMatch']) or (!isset($_POST['MatchStarted']))) {
			if(isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == '0')){
				echo '<input type="submit" name="StartMatch" id="StartMatch" value="Start the Match">';
			}
	}

	}
	

?>
	
	<input type="hidden" name="SwitchoverPos" id="SwitchoverPos" value="<?php if(isset($SwitchoverPos)){echo $SwitchoverPos;}else if(isset($_POST['SwitchoverPos'])){echo $_POST['SwitchoverPos'];}else{echo '';}?>">
	<input type="hidden" name="MatchPos" id="MatchPos" value="<?php if(isset($MatchPos)){echo $MatchPos;}else{echo 0;}?>">
	<input type="hidden" name="MatchNumber" id="MatchNumber" value="<?php if(isset($MatchNumber)){echo $MatchNumber;}else if(isset($_POST['MatchNumber'])){echo $_POST['MatchNumber'];}else{echo '';}?>">
	<input type="hidden" name="MatchStarted" id="MatchStarted" value="<?php if(isset($_POST['StartMatch'])){echo '1';}else if(isset($StartMatch)){echo '1';}else if((isset($MatchStarted)) && ($MatchStarted == '1')){echo '1';}else if(isset($_POST['MatchStarted']) && ($_POST['MatchStarted'] == '1')){echo '1';}else{echo '0';}?>">


</form>

<?php

	if(isset($teamthatservedfirst)){
		echo 'Team That Serves First:'.$teamthatservedfirst;
	} else {
		echo 'Team That Serves First: not set';	
	}
	echo '<br>';
	if(isset($TeamServing)){
		echo 'Team That Is Currently Serving:'.$TeamServing;
	} else {
		echo 'Team That Is Currently Serving: not set';	
	}
	echo '<br>';

} else {
	Redirect::to('index.php');
}
?>	