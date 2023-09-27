<!DOCTYPE HTML>
<?php
require 'core/init.php';
$user = new User();
$event = new Event();
if(!$user->isLoggedIn()) {
	Redirect::to('index.php');
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
					<h1 id="logo"><a href="#">Welcome</a></h1>
					<p>This is K3</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#one">Add a new Entry</a></li>
						<li><a href="#two">Other</a></li>
						<li><a href="#three">mmm</a></li>
						<li><a href="logout.php">Log Out</a></li>
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
							
						
								</div>
							</section>


						
					</div>
				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; Untitled.</li>
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