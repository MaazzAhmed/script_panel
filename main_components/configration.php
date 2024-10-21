<?php
$servername ="localhost";
$username = "eduresea_script_panel";
$password = "eduresea_script_panel";
$dbname = "eduresea_script_panel";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed:". $conn->connect_error);
}

?>