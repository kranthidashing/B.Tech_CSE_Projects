<?php
session_start();
include "dbConfig.php";
$f=$_POST['accept'];
$sql="INSERT INTO Enrolls(S_id,C_id) SELECT S_id,C_id FROM Dummy WHERE S_id='$f'";
$conn->query($sql);
header("Location:Coursesvalidation.php");
?>