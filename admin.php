<?php
require "core/init.php";
$user = new User();
$event = new Event();
if (!$user->isLoggedIn()) {
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
						<li><a href="admin.php" class="active">Admin Area</a></li>
						<li><a href="createevent.php">Add Event</a></li>
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
										<h2>Data</h2>
									</header>
									<form>
                                    <?php
                                    $month = date("m");
                                    $year = date("Y");

                                    for ($i = 1; $i <= 17; $i++) {
                                        $dateObj = DateTime::createFromFormat(
                                            "!m",
                                            $month
                                        );
                                        $monthName = $dateObj->format("F");
                                        echo "<hr />";
                                        echo "<h2><u>" .
                                            $monthName .
                                            " " .
                                            $year .
                                            "</u></h2>";

                                        foreach (
                                            $event
                                                ->eventByMonth($month, $year)
                                                ->results()
                                            as $events
                                        ) {
                                            $dbdate = strtotime($events->date);
                                            $date = date("d F Y", $dbdate);
                                            echo "<h4>" .
                                                $events->event_name .
                                                " | " .
                                                $date .
                                                "</h4>";
                                            echo "<a href=\"edit.php?edit=$events->event_id\">edit</a> | <a href=\"delete.php?delete=$events->event_id\">delete</a> | <a href=\"view.php?view=$events->event_id\">view</a>";
                                            echo "<br />";
                                            echo "<br />";
                                        }
                                        $month++;
                                        if ($month == 13) {
                                            $month = 1;
                                            $year++;
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
			<script src="assets/js/search.js"></script>

	</body>
</html>