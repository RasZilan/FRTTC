<?php
require_once 'core/init.php';

/*
if(isset($_POST['GameHasStarted'])){
	$GameHasStarted = True;
	echo 'The Game Has Started';
}
*/


if(isset($_POST['GameStart'])){
	unset($_POST['GameStart']);
	$GameHasStarted = True;
}

if(isset($_POST['GameStop'])){
	unset($_POST['GameStop']);
	$GameHasStarted = False;
}

if(isset($_POST['GameHasStarted']) && ($_POST['GameHasStarted'] = 1)){
	$GameHasStarted = True;
}
if(isset($_POST['GameHasStarted']) && ($_POST['GameHasStarted'] = 0)){
	$GameHasStarted = False;
}

if($_POST['GameHasStarted']){
	if(isset($_POST['Player1Team1ADD'])){
		unset($_POST['Player1Team1ADD']); 
			$t1p1 = $_POST['t1p1'];
			$t1p1++;
	}
	if(isset($_POST['Player2Team1ADD'])){
		unset($_POST['Player2Team1ADD']);		
			$t1p2 = $_POST['t1p2'];
			$t1p2++;				
	}
	if(isset($_POST['Player1Team2ADD'])){
		unset($_POST['Player1Team2ADD']);		
			$t2p1 = $_POST['t2p1'];
			$t2p1++;			
	}
	if(isset($_POST['Player2Team2ADD'])){
		unset($_POST['Player2Team2ADD']);		
			$t2p2 = $_POST['t2p2'];
			$t2p2++;			
	}
	
	if(isset($t1p1)){		
		echo 't1p1: '.$t1p1.'<br>';
	} else {
		echo 't1p1: 0<br>';
	}	
	if(isset($t1p2)){	
		echo 't1p2: '.$t1p2.'<br>';
	} else {
		echo 't1p2: 0<br>';
	}	
	if(isset($t2p1)){	
		echo 't2p1: '.$t2p1.'<br>';
	} else {
		echo 't2p1: 0<br>';
	}	
	if(isset($t2p2)){	
		echo 't2p2: '.$t2p2.'<br>';
	} else {
		echo 't2p2: 0<br>';
	}
}


?>





<form action="test2.php" method="post" id="FRTTCdoublesGame">


<table>
<tr>
<td>Player 2<input type="submit" name="Player2Team1ADD" value="+"><br>Score:<br><?php echo $_POST['t1p2'];?></td>
<td>Player 1<input type="submit" name="Player1Team2ADD" value="+"><br>Score:<br><?php echo $_POST['t2p1'];?></td>
</tr>
<tr>
<td>Player 1<input type="submit" name="Player1Team1ADD" value="+"><br>Score:<br><?php echo $_POST['t1p1'];?></td>
<td>Player 2<input type="submit" name="Player2Team2ADD" value="+"><br>Score:<br><?php echo $_POST['t2p2'];?></td>
</tr>
</table>

<input type="submit" name="GameStart" value="GameStart" <?php if(isset($GameHasStarted) && ($GameHasStarted)){echo '';}else{echo 'Disabled';}?>>
<input type="submit" name="GameStop" value="GameStop" <?php if(isset($GameHasStarted) && (!$GameHasStarted)){echo 'Disabled';}else{echo '';}?>>


<input type="hidden" name="GameHasStarted" value="<?php if(isset($GameHasStarted)){echo True;}else if(isset($_POST['GameHasStarted'])){echo True;}else{echo False;}?>">

<input type="hidden" name="t1p1" value="<?php if(!$_POST['GameHasStarted']){echo 0;}else if(isset($_POST['t1p1'])){ echo $_POST['t1p1'];}?>">
<input type="hidden" name="t1p2" value="<?php if(!$_POST['GameHasStarted']){echo 0;}else if(isset($_POST['t1p2'])){ echo $_POST['t1p2'];}?>">
<input type="hidden" name="t2p1" value="<?php if(!$_POST['GameHasStarted']){echo 0;}else if(isset($_POST['t2p1'])){ echo $_POST['t2p1'];}?>">
<input type="hidden" name="t2p2" value="<?php if(!$_POST['GameHasStarted']){echo 0;}else if(isset($_POST['t2p2'])){ echo $_POST['t2p2'];}?>">



</form>