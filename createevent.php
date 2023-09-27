<!DOCTYPE HTML>
<?php
require 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if (Input::exist()) {

	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'event_name' => array(
			'required' => true,
			'min' => 3,
			''

	))




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
					<li><a href="admin.php" class="active">Admin Area</a></li>
						<li><a href="createevent.php">Add Event</a></li>
						<li><a href="createuser.php">Create User</a></li>
                        <li><a href="logout.php">Logout</a></li>
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
										<h2>Create Event</h2>
									</header>
										
                                    <form method="post" action="#">
												<label for="eventName">Event Name</label>
												<input type="text" name="eventName" id="eventName" value="" placeholder="Event Name" />
                                                <br />
												<label for="eventDate">Date</label>
												<input type="date" name="date" id="date" value="" placeholder="Date" />
												<br />
												<br />
												<label for="eventTime">Time</label> <input type="time" name="time" id="time" value="" placeholder="Time" />
                                                <br />
												<br />
												<label for="eventLocation">Location</label>
												<input type="text" name="location" id="location" value="" placeholder="Location" />
                                                <br />
												<label for="eventInvolved">How to get involved?</label>
												<input type="text" name="involved" id="involved" value="" placeholder="How to get involved?" />
                                                <br />
												<label for="eventJoining">Who will be joining?</label>
												<input type="text" name="joining" id="joining" value="" placeholder="Who will be joining?" />
												<br />
												<label for="eventOrganiser">Organiser</label>
												<input type="text" name="organiser" id="organiser" value="" placeholder="Organiser" />
												<br />
												<label for="eventAudience">Who is it aimed at?</label>
												<input type="text" name="audience" id="audience" value="" placeholder="Who is it aimed at?" />
												<br />

                                                <label for="eventDate">Category</label>
												<select id="category" name="category">
													<option value="1"> Category 1 </option>
													<option value="2"> Category 2 </option>
													<option value="3"> Category 3 </option>
													<option value="4"> Category 4 </option>
													<option value="5"> Category 5 </option>
												</select>
                                                <br />
												<h4> Please enter in the dates below for each of the different comms method. </h4>
												<br />
												<h4> Please write them like this 'Sun 13 Sept 2023' and seperate with a comma. </h4>
												<br />
                                                <label for="eventType">eNews</label>
												<input type="text" name="marketing1" id="marketing1" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Calendars (All)</label>
												<input type="text" name="marketing2" id="marketing2" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Sunday handouts</label>
												<input type="text" name="marketing3" id="marketing3" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Handout at other event</label>
												<input type="text" name="marketing4" id="marketing4" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Church news</label>
												<input type="text" name="marketing5" id="marketing5" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Sunday slides</label>
												<input type="text" name="marketing6" id="marketing6" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Reception Screen</label>
												<input type="text" name="marketing7" id="marketing7" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Social Media</label>
												<input type="text" name="marketing8" id="marketing8" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">App Feature</label>
												<input type="text" name="marketing9" id="marketing9" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Website latest</label>
												<input type="text" name="marketing10" id="marketing10" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Toilet Posters</label>
												<input type="text" name="marketing11" id="marketing11" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Kerb Banners</label>
												<input type="text" name="marketing12" id="marketing12" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Pull-up banner</label>
												<input type="text" name="marketing13" id="marketing13" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Coffee Box tables</label>
												<input type="text" name="marketing14" id="marketing14" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Key dates front</label>
												<input type="text" name="marketing15" id="marketing15" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Front door signs</label>
												<input type="text" name="marketing16" id="marketing16" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Video</label>
												<input type="text" name="marketing17" id="marketing17" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Blog</label>
												<input type="text" name="marketing18" id="marketing18" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Leadership push</label>
												<input type="text" name="marketing19" id="marketing19" value="" placeholder="Dates" />
                                                <br />
												<label for="eventType">Specific Email</label>
												<input type="text" name="marketing20" id="marketing20" value="" placeholder="Dates" />
									</div>
										</div>
											<br />
										<ul class="actions">
											<li style="margin:auto;"><input type="submit" value="Submit" class="primary" /></li>
										</ul>
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