<?php
session_start();
include "dbConfig.php";
$sql="SELECT E_date FROM validition WHERE vid=1";
$query=$conn->query($sql);
$f=1;
if($query)
{
    $f=0;
    $row=mysqli_fetch_row($query);
    $ed=$row[0];
}
$date = date('Y-m-d H:i:s');
if($date>$ed && $f==0)
{
	header("Location:Coursesvalidation.php");
}
else
{
    header("Location:check2.php");
}
?>