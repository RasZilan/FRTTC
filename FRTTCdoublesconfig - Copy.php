
<script type="text/javascript">
function HandleChange(){
document.getElementById("FRTTCdoubles").submit();
}

</Script>
<link rel="stylesheet" type="text/css" href="css/FRTTCdoublesconfig.css" />
<?php
require_once 'core/init.php';
	if(isset($_POST['Player1ADD']) && isset($_POST['PlayerList'])) {
		
				
		$user1assign = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
			'assigned' => '1'
		));
		
		//echo 'Player1ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user1 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));

		if(!$user1->count())  {
			echo 'No user';
		} else {
			foreach($user1->results() as $user1) {
				//echo $user1->name , '<br>';
				$Player1Username = $user1->name;
				$Player1ID = $user1->id;
			}
		}
		
	} else {
		//echo 'Player1ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}
	
	if(isset($_POST['Player1REMOVE']) && isset($_POST['Player1ID'])) {
		$user1unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player1ID'], array(
		'assigned' => '0'
		));
		unset($Player1Username);
		unset($Player1ID);
		unset($_POST['Player1Username']);
		unset($_POST['Player1ID']);
	}
	
	if(isset($_POST['Player2ADD']) && isset($_POST['PlayerList'])) {
		
				
		$user2assign = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
			'assigned' => '1'
		));
		
		//echo 'Player2ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user2 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));

		if(!$user2->count())  {
			echo 'No user';
		} else {
			foreach($user2->results() as $user2) {
				//echo $user2->name , '<br>';
				$Player2Username = $user2->name;
				$Player2ID = $user2->id;
			}
		}
		
	} else {
		//echo 'Player2ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}
	
	if(isset($_POST['Player2REMOVE']) && isset($_POST['Player2ID'])) {
		$user2unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player2ID'], array(
		'assigned' => '0'
		));
		unset($Player2Username);
		unset($Player2ID);
		unset($_POST['Player2Username']);
		unset($_POST['Player2ID']);
	}	
	
	if(isset($_POST['Player3ADD']) && isset($_POST['PlayerList'])) {
		
				
		$user1assign = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
			'assigned' => '1'
		));
		
		//echo 'Player3ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user3 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));

		if(!$user3->count())  {
			echo 'No user';
		} else {
			foreach($user3->results() as $user3) {
				//echo $user3->name , '<br>';
				$Player3Username = $user3->name;
				$Player3ID = $user3->id;
			}
		}
		
	} else {
		//echo 'Player3ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}
	
	if(isset($_POST['Player3REMOVE']) && isset($_POST['Player3ID'])) {
		$user3unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player3ID'], array(
		'assigned' => '0'
		));
		unset($Player3Username);
		unset($Player3ID);
		unset($_POST['Player3Username']);
		unset($_POST['Player3ID']);
	}	
	
	if(isset($_POST['Player4ADD']) && isset($_POST['PlayerList'])) {
		
				
		$user4assign = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
			'assigned' => '1'
		));
		
		//echo 'Player4ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user4 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));

		if(!$user4->count())  {
			echo 'No user';
		} else {
			foreach($user4->results() as $user4) {
				//echo $user4->name , '<br>';
				$Player4Username = $user4->name;
				$Player4ID = $user4->id;
			}
		}
		
	} else {
		//echo 'Player4ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}
	
	if(isset($_POST['Player4REMOVE']) && isset($_POST['Player4ID'])) {
		$user4unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player4ID'], array(
		'assigned' => '0'
		));
		unset($Player4Username);
		unset($Player4ID);
		unset($_POST['Player4Username']);
		unset($_POST['Player4ID']);
	}	
	
/*	
	if(isset($_POST['Player2ADD']) && isset($_POST['PlayerList'])) {
		echo 'Player2ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user2 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));
		$user2Update = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
		'assigned' => '1'
		));
		if(!$user2->count())  {
			echo 'No user';
		} else {
			echo $user2->first()->name , '<br>';
			$Player2Username = $user2->first()->name;
		}
	} else {
		echo 'Player2ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}

	if(isset($_POST['Player2REMOVE']) && isset($_POST['Player2ID'])) {
		$user1unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player2ID'], array(
		'assigned' => '0'
		));
		unset($Player2Username);
		unset($Player2ID);
	}
	
	if(isset($_POST['Player3ADD']) && isset($_POST['PlayerList'])) {
		echo 'Player3ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user3 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));
		$user3Update = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
		'assigned' => '1'
		));
		if(!$user3->count())  {
			echo 'No user';
		} else {
			echo $user3->first()->name , '<br>';
			$Player3Username = $user3->first()->name;
		}
	} else {
		echo 'Player3ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}	
	
	if(isset($_POST['Player3REMOVE']) && isset($_POST['Player3ID'])) {
		$user1unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player3ID'], array(
		'assigned' => '0'
		));
		unset($Player3Username);
		unset($Player3ID);
	}	
	
	if(isset($_POST['Player4ADD']) && isset($_POST['PlayerList'])) {
		echo 'Player4ADD Pressed and PlayerList is:' . $_POST['PlayerList'];
		
		$user4 = DB::getInstance()->get('FRTTCPlayers',  array('id', '=', $_POST['PlayerList']));
		$user4Update = DB::getInstance()->update('FRTTCPlayers', $_POST['PlayerList'], array(
		'assigned' => '1'
		));
		if(!$user4->count())  {
			echo 'No user';
		} else {
			echo $user4->first()->name , '<br>';
			$Player4Username = $user4->first()->name;
		}
	} else {
		echo 'Player4ADD Not Pressed and or PlayerList isnt selected! <br>';	
	}
	
	if(isset($_POST['Player4REMOVE']) && isset($_POST['Player4ID'])) {
		$user1unassign = DB::getInstance()->update('FRTTCPlayers', $_POST['Player4ID'], array(
		'assigned' => '0'
		));
		unset($Player4Username);
		unset($Player4ID);
	}	
	
*/
if (isset($_POST['CreateMatch'])) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'Player1Username' => array(
                'required' => true
            ),
			'Player2Username' => array(
                'required' => true
            ),
			'Player3Username' => array(
                'required' => true
            ),
			'Player4Username' => array(
                'required' => true
            ),
            'Team1Name' => array(
                'required' => true
            ),
			'Team2Name' => array(
                'required' => true
            ),
			'Gamename' => array(
                'required' => true
            ),
			'TeamServing' => array(
                'required' => true
            ),
			'LengthOfGames' => array(
                'required' => true
            ),
			'ServiceLength' => array(
                'required' => true
            ),
			'BestOfGames' => array(
                'required' => true
            ),
			'NumberOfPointsClear' => array(
                'required' => true
            ),
			'DateTime' => array(
                'required' => true
            ),
        ));

        if ($validate->passed()) {
			
			/*insert into database
			'p1t1' =>
            'p2t1' => 
			'p1t2' => 
			'p2t2' => 
            't1name' => 
			't2name' => 
			'gamename' => 
			'starttime' => 
			'endtime' => 
			'teamwhoserves' => 
			'gamelength' => 
			'servicelength' => 
			'bestof' => 
			'clearvalue' => 
			'gamecreated' =>
			*/
			Session::flash('home', 'Welcome Data has been registered. You may now start the Match.');
            Redirect::to('index.php');
			
			
			
        } else {
            foreach ($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
}

/*
echo '<br><br>';
	$userx = DB::getInstance()->get('FRTTCPlayers',  array('assigned', '=', '0'));
	if(!$userx->count())  {
		echo 'No user';
	} else {
		foreach($userx->results() as $userx) {
			echo 'user id: ' . $userx->id . ' username: ' . $userx->name .'<br>';
		}
	}

*/
?>

<form action="FRTTCdoublesconfig.php" method="post" id="FRTTCdoubles">
    <div class="field">
        <label for="Gamename">Doubles - Game Name:</label>
        <input type="text" name="Gamename" value="<?php if(isset($_POST['Gamename'])){echo $_POST['Gamename'];}else{echo '';}?>" id="Gamename">
        <br><br>
		Insert Date and Time: 
		<input type="button" name="ADDDateTime" value="+">
	    <input type="text" name="DateTime" value="<?php echo date('H:i:s d-m-Y'); ?>">
	</div>
	<br><br>
	<div class="field">
	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td>Best of number of Games:</td>
	<td>
             <select id="BestOfGames" name="BestOfGames" onchange="HandleChange();">
               <option value = "1" <?php if(isset($_POST['BestOfGames']) && $_POST['BestOfGames']=='1'){echo 'SELECTED';}else{echo '';} ?>>1</option>
               <option value = "3" <?php if(isset($_POST['BestOfGames']) && $_POST['BestOfGames']=='3'){echo 'SELECTED';}else{echo '';} ?>>3</option>
               <option value = "5" <?php if(isset($_POST['BestOfGames']) && $_POST['BestOfGames']=='5'){echo 'SELECTED';}else{echo '';} ?>>5</option>
               <option value = "7" <?php if(isset($_POST['BestOfGames']) && $_POST['BestOfGames']=='7'){echo 'SELECTED';}else{echo '';} ?>>7</option>
             </select>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>Length of Game:</td>
	<td>
			 <select id="LengthOfGames" name="LengthOfGames" onchange="HandleChange();">
               <option value = "5" <?php if(isset($_POST['LengthOfGames']) && $_POST['LengthOfGames']=='5'){echo 'SELECTED';}else{echo '';} ?>>5</option>
               <option value = "11" <?php if(isset($_POST['LengthOfGames']) && $_POST['LengthOfGames']=='11'){echo 'SELECTED';}else{echo '';} ?>>11</option>
               <option value = "21" <?php if(isset($_POST['LengthOfGames']) && $_POST['LengthOfGames']=='21'){echo 'SELECTED';}else{echo '';} ?>>21</option>
             </select>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<td>Length of Service:</td>
	<td>
			 <select id="ServiceLength" name="ServiceLength" onchange="HandleChange();">
               <option value = "1" <?php if(isset($_POST['ServiceLength']) && $_POST['ServiceLength']=='1'){echo 'SELECTED';}else{echo '';} ?>>1</option>
               <option value = "2" <?php if(isset($_POST['ServiceLength']) && $_POST['ServiceLength']=='2'){echo 'SELECTED';}else{echo '';} ?>>2</option>
             </select>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>	
	<tr>	
	<td>Number of Points Clear:</td>
	<td>
			 <select id="NumberOfPointsClear" name="NumberOfPointsClear" onchange="HandleChange();">
               <option value = "1" <?php if(isset($_POST['NumberOfPointsClear']) && $_POST['NumberOfPointsClear']=='1'){echo 'SELECTED';}else{echo '';} ?>>1</option>
               <option value = "2" <?php if(isset($_POST['NumberOfPointsClear']) && $_POST['NumberOfPointsClear']=='2'){echo 'SELECTED';}else{echo '';} ?>>2</option>
             </select>
	</td>
	</tr>
	</table>
	</div>
	<br><br>

	<table border="0" cellpadding="0" cellspacing="0">


	
    <div class="field">
	<tr>
	<td rowspan="14">PlayerList:&nbsp; &nbsp; <br><br> 
	<select name="PlayerList" size="14">
	
<?php


	//$user = DB::getInstance()->query("SELECT * FROM FRTTCPlayers WHERE assigned=".'0');
	$user = DB::getInstance()->get('FRTTCPlayers',  array('assigned', '=', '0'));
	if(!$user->count())  {
		echo 'No user';
	} else {
		foreach($user->results() as $user) {
			echo '<option value="'.$user->id.'">'.$user->name.'</option>';
		}
	}
	

	

?>
	</select>
	
	</td>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; Team 1 Name: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; Team Serving: </td>
	</tr>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; <input type="text" name="Team1Name" id="Team1Name" value="<?php if(isset($_POST['Team1Name'])){echo $_POST['Team1Name'];}else{echo '';}?>">&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; <input type="radio" name="TeamServing" value="1" onclick="HandleChange();" <?php if(isset($_POST['TeamServing']) && $_POST['TeamServing']=='1'){echo 'checked="checked"';}else{echo '';}?>></td>
	</tr>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>	
	<td>&nbsp; &nbsp; Player 1 username: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>	
	<tr>
	<td>&nbsp; &nbsp; <input type="submit" name="Player1ADD" value="+"></td>
	<td>&nbsp; &nbsp; <input type="submit" name="Player1REMOVE" value="-">&nbsp; &nbsp; </td>	
	<td>
	&nbsp; &nbsp; <input type="text" name="Player1Username" id="Player1Username" value="<?php if(isset($Player1Username)){echo $Player1Username;}else if(isset($_POST['Player1Username'])){echo $_POST['Player1Username'];}else{echo '';}?>" readonly>
	<input type="hidden" name="Player1ID" id="Player1ID" value="<?php if(isset($Player1ID)){echo $Player1ID;}else if(isset($_POST['Player1ID'])){echo $_POST['Player1ID'];}else{echo '';}?>">
	&nbsp; &nbsp;</td>
	<td>&nbsp; &nbsp; </td>
	</tr>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; Player 2 username: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>	
	<tr>
	<td>&nbsp; &nbsp; <input type="submit" name="Player2ADD" value="+"></td>
	<td>&nbsp; &nbsp; <input type="submit" name="Player2REMOVE" value="-">&nbsp; &nbsp; </td>	
	<td>
	&nbsp; &nbsp; <input type="text" name="Player2Username" id="Player2username" value="<?php if(isset($Player2Username)){echo $Player2Username;}else if(isset($_POST['Player2Username'])){echo $_POST['Player2Username'];}else{echo '';}?>" readonly>
	<input type="hidden" name="Player2ID" id="Player2ID" value="<?php if(isset($Player2ID)){echo $Player2ID;}else if(isset($_POST['Player2ID'])){echo $_POST['Player2ID'];}else{echo '';}?>">
	&nbsp; &nbsp;</td>
	<td>&nbsp; &nbsp; </td>
	</tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>	
	</tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; Team 2 Name: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>			
	<td>&nbsp; &nbsp; <input type="text" name="Team2Name" id="Team2Name" value="<?php if(isset($_POST['Team2Name'])){echo $_POST['Team2Name'];}else{echo '';}?>">
	&nbsp; &nbsp;</td>
	<td>&nbsp; &nbsp; <input type="radio" name="TeamServing" value="2" onclick="HandleChange();" <?php if(isset($_POST['TeamServing']) && $_POST['TeamServing']=='2'){echo 'checked="checked"';}else{echo '';}?>></td>
	</tr>	
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>		
	<td>&nbsp; &nbsp; Player 1 username: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>	
	<tr>
	<td>&nbsp; &nbsp; <input type="submit" name="Player3ADD" value="+"></td>
	<td>&nbsp; &nbsp; <input type="submit" name="Player3REMOVE" value="-">&nbsp; &nbsp; </td>		
	<td>
	&nbsp; &nbsp; <input type="text" name="Player3Username" id="Player3Username" value="<?php if(isset($Player3Username)){echo $Player3Username;}else if(isset($_POST['Player3Username'])){echo $_POST['Player3Username'];}else{echo '';}?>" readonly>
	<input type="hidden" name="Player3ID" id="Player3ID" value="<?php if(isset($Player3ID)){echo $Player3ID;}else if(isset($_POST['Player3ID'])){echo $_POST['Player3ID'];}else{echo '';}?>">
	&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>	
	<td>&nbsp; &nbsp; Player 2 username: &nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>
	</tr>	
	<tr>
	<td>&nbsp; &nbsp; <input type="submit" name="Player4ADD" value="+"></td>
	<td>&nbsp; &nbsp; <input type="submit" name="Player4REMOVE" value="-">&nbsp; &nbsp; </td>		
	<td>
	&nbsp; &nbsp; <input type="text" name="Player4Username" id="Player4Username" value="<?php if(isset($Player4Username)){echo $Player4Username;}else if(isset($_POST['Player4Username'])){echo $_POST['Player4Username'];}else{echo '';}?>" readonly>
	<input type="hidden" name="Player4ID" id="Player4ID" value="<?php if(isset($Player4ID)){echo $Player4ID;}else if(isset($_POST['Player4ID'])){echo $_POST['Player4ID'];}else{echo '';}?>">
	&nbsp; &nbsp;</td>
	<td>&nbsp; &nbsp; </td>
	</tr>
    </div>
	<tr>
	<td>&nbsp; &nbsp; </td>
	<td>&nbsp; &nbsp; </td>	
	<td>&nbsp; &nbsp; </td>
	<td>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" name="CreateMatch" value="CreateMatch">
	&nbsp; &nbsp; 
	</td>
	</tr>	
    
	
	</table>
	</font>
</form>

<hr length="100%">


	<table border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td colspan="2" align="center">Team 1 Name:<br><?php if(!isset($_POST['Team1Name']) or ($_POST['Team1Name']=='')){echo 'NOT SET!';}else if(isset($_POST['Team1Name'])){echo $_POST['Team1Name'];}else{echo 'NOT SET!';}?></td>
	<td align="center">Doubles Game Name:
	<br><?php if(!isset($_POST['Gamename']) or ($_POST['Gamename']=='')){echo 'NOT SET!';}else if(isset($_POST['Gamename'])){echo $_POST['Gamename'];}else{echo 'NOT SET!';}?>
	<br>
	Best of:&nbsp;  
	<?php if(!isset($_POST['BestOfGames']) or ($_POST['BestOfGames']=='')){echo '1';}else if(isset($_POST['BestOfGames'])){echo $_POST['BestOfGames'];}else{echo '1';}?> 
	Games &nbsp;&nbsp; Game To:&nbsp; 
	<?php if(!isset($_POST['LengthOfGames']) or ($_POST['LengthOfGames']=='')){echo '5';}else if(isset($_POST['LengthOfGames'])){echo $_POST['LengthOfGames'];}else{echo '5';}?> 
	&nbsp;&nbsp; Service Length:&nbsp;
	<?php if(!isset($_POST['ServiceLength']) or ($_POST['ServiceLength']=='')){echo '1';}else if(isset($_POST['ServiceLength'])){echo $_POST['ServiceLength'];}else{echo '1';}?> 
	&nbsp;&nbsp; With:&nbsp;
	<?php if(!isset($_POST['NumberOfPointsClear']) or ($_POST['NumberOfPointsClear']=='')){echo '1';}else if(isset($_POST['NumberOfPointsClear'])){echo $_POST['NumberOfPointsClear'];}else{echo '1';}?> 
	Clear Points	
	</td>
	<td colspan="2" align="center">Team 2 Name:<br><?php if(!isset($_POST['Team2Name']) or ($_POST['Team2Name']=='')){echo 'NOT SET!';}else if(isset($_POST['Team2Name'])){echo $_POST['Team2Name'];}else{echo 'NOT SET!';}?></td>
	</tr>
	<tr>
	<td>User 2 Name:<br><?php if(isset($Player2Username)){echo $Player2Username;}else if(isset($_POST['Player2Username']) && ($_POST['Player2Username'] != '')){echo $_POST['Player2Username'];}else{echo 'NOT SET!';}?></td>
	<td><img src="pictures/person-left.jpg"></td>
	<td rowspan="2"><img src="pictures/table.jpg"></td>
	<td><img src="pictures/person-right.jpg"></td>
	<td>User 1 Name:<br><?php if(isset($Player3Username)){echo $Player3Username;}else if(isset($_POST['Player3Username']) && ($_POST['Player3Username'] != '')){echo $_POST['Player3Username'];}else{echo 'NOT SET!';}?><br><?php if(isset($_POST['TeamServing']) && $_POST['TeamServing']=='2'){echo ' SERVING <br><img src="pictures/serving-bat.jpg">';}else{echo '';}?></td>
	<tr>
	<td>User 1 Name:<br><?php if(isset($Player1Username)){echo $Player1Username;}else if(isset($_POST['Player1Username']) && ($_POST['Player1Username'] != '')){echo $_POST['Player1Username'];}else{echo 'NOT SET!';}?><br><?php if(isset($_POST['TeamServing']) && $_POST['TeamServing']=='1'){echo ' SERVING <br><img src="pictures/serving-bat.jpg">';}else{echo '';}?></td>
	<td><img src="pictures/person-left.jpg"></td>
	<td><img src="pictures/person-right.jpg"></td>
	<td>User 2 Name:<br><?php if(isset($Player4Username)){echo $Player4Username;}else if(isset($_POST['Player4Username']) && ($_POST['Player4Username'] != '')){echo $_POST['Player4Username'];}else{echo 'NOT SET!';}?></td>
	</tr>
	</table>