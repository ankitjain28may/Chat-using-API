<?php
include 'src/Registration.php';
include 'src/whatsprot.class.php';

$username = '918447269408';
$nickname = "anku";
$password = 'dnvquA5N9E0fsQflnSfjYkHKsVg='; // The one we got registering the number
$debug = true;

// Create a instance of WhastPort.
$w = new WhatsProt($username, $nickname, $debug);

$w->connect(); // Connect to WhatsApp network
$w->loginWithPassword($password); // logging 


?>