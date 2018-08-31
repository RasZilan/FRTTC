<?php
require_once 'core/init.php';


$player = 9; 
$round = 1; 
$match = 5;
$team = 1;

$get_val = ReturnPlayerPoints($player, $match, $round);
 
echo $get_val[0];

echo '<br><br>';

$get_val = ReturnPlayerPoints($team, $match, $round);

echo $get_val[0];

