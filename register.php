<?php
/**
 * Created by Chris on 9/29/2014 3:53 PM.
 */

require_once 'core/init.php';


$userlogin = new User(); //Current

if($userlogin->isLoggedIn() && $userlogin->hasPermission('admin')){

echo '<p>Go <a href="index.php">Back</a> a page!</p>';

if (Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'name' => array(
                'name' => 'Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
			'group' => array(
                'required' => true,
            ),
        ));

        if ($validate->passed()) {
            $user = new User();
            $salt = Hash::salt(64);
			
            try {
                $user->create(array(
                    'name' => Input::get('name'),
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => Input::get('group')
                ));

                Session::flash('home', 'The user account ' . Input::get('username') . ' has been registered. You may now log in as that user.');
                Redirect::to('index.php');
            } catch(Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
}
?>

<form action="" method="post">
    <div class="field">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
    </div>

    <div class="field">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>">
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="field">
        <label for="password_again">Password Again</label>
        <input type="password" name="password_again" id="password_again" value="">
    </div>
	
    <div class="field">
        <label for="group">Group Membership</label>
		<br>
		<input type="radio" name="group" id="group" value="1"> Normal User<br>
		<input type="radio" name="group" id="group" value="2"> Administrative User<br>
    </div>
	
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register">
</form>

<?php
}
?>