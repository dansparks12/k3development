<?php
header('Content-Type: application/json');
require "core/init.php";
$user = new User();
$event = new Event();
if (!$user->isLoggedIn()) {
    Redirect::to("index.php");
}

$searchQuery = Input::get("query");
 if (!empty($searchQuery)) {
 $results = $event->searchEvents($searchQuery)->results();
 }
else {
    $results = [];
}
echo $results;












?>