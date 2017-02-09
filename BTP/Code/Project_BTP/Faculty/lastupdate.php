<?php
session_start();
include "dbConfig.php";
$arr = unserialize($_POST['attend']);
$cid=$arr['id']; 
$sdate=$arr['session'];
$str = serialize($_POST['cx']);
$sql="UPDATE Session SET Absenties='$str' WHERE C_id='$cid' AND Session_date='$sdate'";
$query=$conn->query($sql);
header("Location:attendenceupdated.php");
?>