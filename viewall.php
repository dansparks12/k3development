<?php
require "core/init.php";
$user = new User();
$event = new Event();
if(!$user->isLoggedIn()) {
    Redirect::to("index.php");
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
					<p> Welcome back <br /> <?php echo $user->data()->name; ?> is logged in. </p>
					
				</header>
				<nav id="nav">
					<ul>
						<li><a href="admin.php">Admin Area</a></li>
						<li><a href="createevent.php">Add Event</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="viewall.php"  class="active">View all events</a></li>
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
										<h2>Data</h2>
									</header>
                                    <?php
                                    foreach ($event->allEventsASC()->results()as $events) {
                                    
                                        if ($events->date > date("Y-m-d")) {
                                            echo "<h2>" . $events->event_name . " - " . date("D d M Y", strtotime($events->date)) . " - " . $events->time ."</h2>";
                                            ?>
                                            <table>
                                        <tr>
                                         <th>eNews</th>
                                         <th>Calendars (All)</th>
                                         <th>Sunday handouts</th>
                                         <th>Handout at other event</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $events->marketing1 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing1 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing1;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing2 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing2 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing2;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing3 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing3 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing3;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing4 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing4 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing4;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <br />
                                    <table>
                                        <tr>
                                         <th>Church News</th>
                                         <th>Sunday Slides</th>
                                         <th>Reception Screen</th>
                                         <th>Social Media</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $events->marketing5 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing5 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing5;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing6 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing6 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing6;
                                        } ?></td>
                                        <td><?php if (
                                           $events->marketing7 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing7 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing7;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing8 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing8 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing8;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <br />
                                    <table>
                                        <tr>
                                         <th>App Feature</th>
                                         <th>Website Latest</th>
                                         <th>Toilet Posters</th>
                                         <th>Kerb Banners</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $events->marketing9 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing9 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing9;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing10 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing10 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing10;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing11 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing11 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            $events->marketing11;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing12 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing12 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing12;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <br />
                                    <table>
                                        <tr>
                                         <th>Pull-up Banner</th>
                                         <th>Coffee Box tables</th>
                                         <th>Key Dates front</th>
                                         <th>Front Door signs</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $events->marketing13 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing13 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing13;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing14 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing14 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing14;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing15 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing15 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing15;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing16 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing16 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing16;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <table>
                                        <tr>
                                         <th>Video</th>
                                         <th>Blog</th>
                                         <th>Leadership Push</th>
                                         <th>Specific email</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $events->marketing17 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing17 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing17;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing18 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing18 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing18;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing19 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing19 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing19;
                                        } ?></td>
                                        <td><?php if (
                                            $events->marketing20 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $events->marketing20 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $events->marketing20;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <?php
                                        }
                                           
                                    }
                                    ?>
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