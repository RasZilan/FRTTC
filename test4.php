<?php
require_once 'core/init.php';


$teamthatservedfirst = 1; 
$team1points = 2; 
$team2points = 4; 
$matchlength = 11;
$matchposition = 6;
$numberofclearpoints = 2;
$servicelength = 2;

$maxvalue = 25;


//GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$counter);
for($inc = 1; $inc <= $maxvalue; $inc++){ 




$get_val = GetPlayerPosition($teamthatservedfirst,$team1points,$team2points,$matchlength,$matchposition,$numberofclearpoints,$servicelength,$inc);
 
echo $get_val[0];
echo $get_val[1];
echo $get_val[2];
echo $get_val[3];

echo '  '.$get_val[4];
echo '<br>';
echo '  '.$get_val[5];
echo '  '. $inc .'<br>';

echo '  '.$get_val[7].'<br>';
}
?>