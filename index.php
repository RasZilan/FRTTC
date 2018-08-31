<?php
/**
 * Created by Chris on 9/29/2014 3:42 PM.
 */

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>

    <p>Hello, <a href="profile.php?user=<?php echo escape($user->data()->username);?>"><?php echo escape($user->data()->username); ?></p>

    <ul>
        <li><a href="update.php">Update Profile</a></li>
        <li><a href="changepassword.php">Change Password</a></li>
        <li><a href="logout.php">Log out</a></li>
		<?php if($user->hasPermission('admin')){echo '<li><a href="register.php">Register a user</a></li>';}?>
		<?php if($user->hasPermission('admin')){echo '<li><a href="adminchangeuserpassword.php">Change a users password</a></li>';}?>
		</ul>
	
	<ul>
        <li><a href="FRTTCdoublesconfig.php">Create Doubles Match</a></li>
        <li><a href="FRTTCsinglesconfig.php">Create Singles Match</a></li>
        <li><a href="FRTTCdoublesmatch.php">Begin Doubles Match</a></li>
        <li><a href="FRTTCsinglesmatch.php">Begin Singles Match</a></li>		
    </ul>
<?php

    if($user->hasPermission('admin')) {
        echo '<p>You are a Administrator!</p>';
    }

} else {
    echo '<p>You need to <a href="login.php">login</a></p>';
}