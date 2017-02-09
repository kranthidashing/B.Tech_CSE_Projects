<?php
include "sessioncheck.php";
$servername ="localhost";
$username = "root";
$password = "kranthi158";
$dbname = "students_portal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
?>
