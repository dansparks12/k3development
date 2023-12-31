<?php
require "core/init.php";
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to("index.php");
}

if (Input::exists()) {
    if (Token::check(Input::get("token"))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            "username" => [
                "required" => true,
                "min" => 2,
                "max" => 20,
                "unique" => "users",
            ],

            "password" => [
                "required" => true,
                "min" => 6,
            ],
            "password_again" => [
                "required" => true,
                "matches" => "password",
            ],
            "name" => [
                "required" => true,
                "min" => 2,
                "max" => 50,
            ],
        ]);

        if ($validation->passed()) {
            $user = new User();
            $salt = Hash::salt(32);

            try {
                $user->create([
                    "username" => Input::get("username"),
                    "password" => Hash::make(
                        Input::get("password"),
                        mb_convert_encoding($salt, "UTF-8", "UTF-8")
                    ),
                    "salt" => mb_convert_encoding($salt, "UTF-8", "UTF-8"),
                    "name" => Input::get("name"),
                    "joined" => date("Y-m-d H:i:s"),
                    "group" => 1 /* one group is the standard user*/,
                ]);

                Session::flash(
                    "home",
                    "You have been registered and you can now log in!"
                );
                Redirect::to("admin.php");
                /* Redirect::to(404); */
            } catch (Exception $e) {
                die($e->getMessage());
            }

            /*Session::flash('success', 'You have registered successfully!');
             header('Location: index.php');*/
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, "</br>";
            }
        }
    }
}
?>



<form action="" method="post">

	<table>
		
		<tr>
			<div class="field">
				<td><label for="username">Username </label></td>
				<td><input type="text" name="username" id="username" value="<?php echo escape(
        Input::get("username")
    ); ?>" autocomlete="off"></td>
			</div>
		</tr>
		
		<tr>
			<div class="field">
				<td><label for="password">Choose a Password </label></td>
				<td><input type="password" name="password" id="password"></td>
			</div>
		</tr>
		
		<tr>
			<div class="field">
				<td><label for="password_again">Enter your Password again </label></td>
				<td><input type="password" name="password_again" id="password_again"></td>
			</div>
		</tr>
		
		<tr>
			<div class="field">
				<td><label for="name">Name </label></td>
				<td><input type="text" name="name" value="<?php echo escape(
        Input::get("name")
    ); ?>" id="name"></td>
			</div>
		</tr>
		
		
	</table><br>
	
		<table>
			<tr>
				<td><input type ="hidden" name="token" value="<?php echo Token::generate(); ?>"></td>
				<td><input type ="submit" value="Register">	</td>
			</tr>
		</table>
		
		<ul>
				<li><a href="index.php">Home </a></li>
				
		</ul>


</form>