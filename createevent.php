<!DOCTYPE HTML>
<?php
require "core/init.php";
$user = new User();
$event = new Event();
$marketing = new Marketing();
if (!$user->isLoggedIn()) {
    Redirect::to("index.php");
}

if (Input::exists()) {
    $validate = new Validate();
    $validation = $validate->check($_POST, [
        "eventName" => [
            "required" => true,
            "min" => 3,
        ],
        "date" => [
            "required" => true,
        ],
        "time" => [
            "required" => true,
        ],
        "category" => [
            "required" => true,
            "max" => 1,
        ],
    ]);
    if ($validation->passed()) {
        try {
            $event->create([
                "event_name" => Input::get("eventName"),
                "date" => Input::get("date"),
                "time" => Input::get("time"),
                "month" => date("m", strtotime(Input::get("date"))),
                "year" => date("Y", strtotime(Input::get("date"))),
                "location" => Input::get("location"),
                "getinvolved" => Input::get("involved"),
                "joining" => Input::get("joining"),
                "organiser" => Input::get("organiser"),
                "audience" => Input::get("audience"),
                "category" => Input::get("category"),
                "marketing1" => Input::get("marketing1"),
                "marketing2" => Input::get("marketing2"),
                "marketing3" => Input::get("marketing3"),
                "marketing4" => Input::get("marketing4"),
                "marketing5" => Input::get("marketing5"),
                "marketing6" => Input::get("marketing6"),
                "marketing7" => Input::get("marketing7"),
                "marketing8" => Input::get("marketing8"),
                "marketing9" => Input::get("marketing9"),
                "marketing10" => Input::get("marketing10"),
                "marketing11" => Input::get("marketing11"),
                "marketing12" => Input::get("marketing12"),
                "marketing13" => Input::get("marketing13"),
                "marketing14" => Input::get("marketing14"),
                "marketing15" => Input::get("marketing15"),
                "marketing16" => Input::get("marketing16"),
                "marketing17" => Input::get("marketing17"),
                "marketing18" => Input::get("marketing18"),
                "marketing19" => Input::get("marketing19"),
                "marketing20" => Input::get("marketing20"),
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        Session::flash("Event added sucessfully");
        Redirect::to("admin.php");
    }
}
?>


<html>
	<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
					<li><a href="admin.php">Admin Area</a></li>
						<li><a href="createevent.php" class="active">Add Event</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="viewall.php">View all events</a></li>
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
												
											
												<select class="select" id="marketing" name="marketing">
												<?php
											
												foreach($marketing->totalMarketing()->results() as $marketings) {
														echo "<option value=" . $marketings->marketing_id . ">" . $marketings->marketing_name . "</option>";
												}
										
												
												?>
												</select>
												<script>
													const selectEl = document.getElementById('marketing');
													selectEl.addEventListener('change', () => {
													var text = selectEl.options[selectEl.selectedIndex].text;
													<?php
													$javascript_to_php_variable = echo "<script>document.writeln(text);</script>" ;
													echo $javascript_to_php_variable;
													?>
													
													console.log(text);
												});

</script>
											
												
						
											<br />

											<br />
                                
												<input type="date" name="marketing1" id="marketing1" value="" placeholder="Dates" />
												<input type="date" name="marketing2" id="marketing1" value="" placeholder="Dates" />
												<input type="date" name="marketing1" id="marketing1" value="" placeholder="Dates" />
												<input type="date" name="marketing1" id="marketing1" value="" placeholder="Dates" />
												<input type="date" name="marketing1" id="marketing1" value="" placeholder="Dates" />

                                               
									</div>
										</div>
										
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