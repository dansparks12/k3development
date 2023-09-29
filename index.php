<!DOCTYPE HTML>
<?php
require_once "core/init.php";

$user = new User();
if ($user->isLoggedIn()) {
    Redirect::to("admin.php");
}

if (Input::exists()) {
    if (Token::check(Input::get("token"))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            "username" => ["required" => true],
            "password" => ["required" => true],
        ]);

        if ($validation->passed()) {
            $user = new User();

            $remember = Input::get("remember") === "on" ? true : false;
            $login = $user->login(
                Input::get("username"),
                Input::get("password"),
                $remember
            );

            if ($login) {
                Session::flash(
                    "success",
                    "<h3>Welcome " . Input::get("username") . "!</h3>"
                );
                Redirect::to("admin.php");
            } else {
                Session::flash("failed", "Login Failed, Please try again.");
                Redirect::to("index.php#first");
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, "<br>";
            }
        }
    }
}
?>
<html>
	<head>
		<title>K3</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="images/avatar.jpg" alt="" /></span>
					<h1 id="logo"><a href="#">K3 Alpha</a></h1>
					
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one" class="active">Login</a></li>
						<li><a href="#two">About</a></li>
					</ul>
				</nav>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="image main" data-position="center">
									<img src="images/banner.jpg" alt="" />
								</div>
								<div class="container">
									<header class="major">
										<h2>Login</h2>
									</header>
										<form method="post" action="#">
												<label for="username">Username</label>
												<input type="text" name="username" id="username" value="" placeholder="Username" />
												<label for="password">Password</label>
												<input type="password" name="password" id="password" value="" placeholder="Password" />
												
											<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
											<br />
											<input type="submit" value="Login" class="primary" />
										

											<?php if (Session::exists("failed")) {
               echo Session::flash("failed");
           } ?>
</div>
										
									</form>
								</div>
</section>


					</div>

				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>