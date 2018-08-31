<?php
/**
 * Created by Chris on 9/29/2014 3:53 PM.
 */

require_once 'core/init.php';

echo '<p>Go <a href="index.php">Back</a> a page!</p>';

$user = new User();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if($user->hasPermission('admin')){
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'playerlist' => array(
                'required' => true,
            ),
            'new_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password_again' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'new_password'
            )
        ));
    }

    if($validate->passed()) {

            $salt = Hash::salt(32);
			$userUpdate = DB::getInstance()->update('users', Input::get('playerlist'), array(			
                'password' => Hash::make(Input::get('new_password'), $salt),
                'salt' => $salt
            ));

            Session::flash('home', 'the password has been changed!');
            Redirect::to('index.php');

    } else {
        foreach($validate->errors() as $error) {
            echo $error, '<br>';
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
	<select name="playerlist" size="14">
	
<?php
	$userselect = DB::getInstance()->query('SELECT * FROM users');
	if(!$userselect->count())  {
		echo 'No user';
	} else {
		foreach($userselect->results() as $userselect) {
			echo '<option value="'.$userselect->id.'">'.$userselect->username.'</option>';
		}
	}
?>
	</select>
    </div>

    <div class="field">
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password">
    </div>

    <div class="field">
        <label for="new_password_again">New Password Again</label>
        <input type="password" name="new_password_again" id="new_password_again">
    </div>

    <input type="hidden" name="token" id="token" value="<?php echo escape(Token::generate()); ?>">
    <input type="submit" value="Change Password">
</form>

<?php
}
?>