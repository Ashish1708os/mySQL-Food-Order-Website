<?php
// start session
session_start();


// create constants to store non repeating value
// $server = "localhost:3307";
// $username = "root";
// $password = "";

define('SITEURL', 'http://localhost/food-order/');
define('SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-website');

$conn = mysqli_connect(SERVER, DB_USERNAME, DB_PASSWORD);

if (!$conn) {
    die("connection to this database failed due to " . mysqli_connect_error());
}
// echo "Success connecting to the Database";

$db_select = mysqli_select_db($conn, DB_NAME);
