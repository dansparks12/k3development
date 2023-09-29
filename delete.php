<?php
require 'core/init.php';
$user = new User();
$event = new Event();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
$eventID = Input::get('delete');
$event->findID($eventID);

$event->delete('event_id', $eventID);
Redirect::to('admin.php');







?>