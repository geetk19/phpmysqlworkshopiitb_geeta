<?php
$servername = "localhost";
$database = "id15003067_result";
$username = "id15003067_root";
$password = "WTdj8IfNR{+nuW9p";

// Create connection

$conn = new mysqli($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
echo "Connected successfully";

?>
