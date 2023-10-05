<?php
require "core/init.php";
$user = new User();
$event = new Event();
if (!$user->isLoggedIn()) {
    Redirect::to("index.php");
}
$id = Input::get("view");
$event->findID($id);
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
                    <p> Welcome back <br /> <?php echo $user->data()
                        ->name; ?> is logged in. </p>
					
				</header>
				<nav id="nav">
					<ul>
                        <li><a href="admin.php">Admin Area</a></li>
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
										<h2>Event Info
                                        </h2>
                                        <table>
                                        <tr>
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Category</th>
                                        </tr>
                                        <tr>

                                        <?php switch (
                                            $event->data()->category
                                        ) {
                                            case 1:
                                                $category = "Category 1";
                                                $cat = 1;
                                                break;
                                            case 2:
                                                $category = "Category 2";
                                                $cat = 2;
                                                break;
                                            case 3:
                                                $category = "Category 3";
                                                $cat = 3;
                                                break;
                                            case 4:
                                                $category = "Category 4";
                                                $cat = 4;
                                                break;
                                            case 5:
                                                $category = "Category 5";
                                                $cat = 5;
                                                break;
                                            default:
                                                $category =
                                                    "No category specified";
                                        } ?>
                                        <td><?php echo $event->data()
                                            ->event_name; ?></td>
                                        <td><?php echo $event->data()
                                            ->date; ?></td>
                                        <td><?php echo $event->data()
                                            ->time; ?></td>
                                        <td><?php echo $event->data()
                                            ->location; ?></td>
                                        <td><?php echo $category; ?></td>
                                        </tr>
                                        </table>
                                        <table>
                                        <tr>
                                         <th>Getting involved</th>
                                         <th>Who can join?</th>
                                         <th>Organiser</th>
                                         <th>Audience</th>
                                         </tr>
                                         <tr>
                                        <td><?php echo $event->data()
                                            ->getinvolved; ?></td>
                                        <td><?php echo $event->data()
                                            ->joining; ?></td>
                                        <td><?php echo $event->data()
                                            ->organiser; ?></td>
                                        <td><?php echo $event->data()
                                            ->audience; ?></td>
                                    </tr>
                                    </table>
                                    <h2> Marketing </h2>
                                    <table>
                                        <tr>
                                         <th>eNews</th>
                                         <th>Calendars (All)</th>
                                         <th>Sunday handouts</th>
                                         <th>Handout at other event</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $event->data()->marketing1 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing1 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing1;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing2 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing2 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing2;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing3 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing3 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing3;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing4 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing4 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing4;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <table>
                                        <tr>
                                         <th>Church News</th>
                                         <th>Sunday Slides</th>
                                         <th>Reception Screen</th>
                                         <th>Social Media</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $event->data()->marketing5 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing5 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing6;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing6 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing6 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing6;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing7 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing7 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing7;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing8 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing8 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing8;
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
                                            $event->data()->marketing9 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing9 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing9;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing10 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing10 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing10;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing11 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing11 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            $event->data()->marketing11;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing12 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing12 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing12;
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
                                            $event->data()->marketing13 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing13 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing13;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing14 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing14 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing14;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing15 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing15 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing15;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing16 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing16 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing16;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <br />
                                    <table>
                                        <tr>
                                         <th>Video</th>
                                         <th>Blog</th>
                                         <th>Leadership Push</th>
                                         <th>Specific email</th>
                                         </tr>
                                         <tr>
                                        <td><?php if (
                                            $event->data()->marketing17 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing17 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing17;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing18 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing18 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing18;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing19 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing19 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing19;
                                        } ?></td>
                                        <td><?php if (
                                            $event->data()->marketing20 == 1
                                        ) {
                                            echo "Yes";
                                        } elseif (
                                            $event->data()->marketing20 == 0
                                        ) {
                                            echo "No";
                                        } else {
                                            echo $event->data()->marketing20;
                                        } ?></td>
                                     </tr>
                                    </table>
                                    <br />
                                    <?php
                                    $cat = $event->data()->category;

                                    switch ($cat) {
                                        case 1:
                                            $time = "4-6 months";
                                            break;
                                        case 2:
                                            $time = "2-3 months";
                                            break;
                                        case 3:
                                            $time = "1 month";
                                            break;
                                        case 4:
                                            $time = "A few weeks";
                                            break;
                                        case 5:
                                            $time = "Just before the event";
                                        default:
                                            $time = "";
                                    }

                                    if ($cat == 0) {
                                        echo " ";
                                    } else {
                                        echo "<h3> Based on the category, start planning this event <u>" .
                                            $time .
                                            "</u> beforehand. </h3>";
                                    }
                                    ?> 
									</header>
                                   
										
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