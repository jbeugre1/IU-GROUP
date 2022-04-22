<?php
$server = "localhost";
$username = "jbeugre";
$password = "winterize obeying lockets moveables";
$database = "jbeugre_db";


// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 	
}

?>