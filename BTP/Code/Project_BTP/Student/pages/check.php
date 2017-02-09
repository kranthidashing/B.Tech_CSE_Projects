<?php
session_start();
$count=0;
include "dbConfig.php";
$id=$_SESSION['sid'];
$sql1="select S_id from Dummy where S_id='$id'";
$count=mysqli_num_rows($conn->query($sql1));
$date = date('Y-m-d H:i:s');
$sql="SELECT S_date,E_date FROM validition WHERE vid=1";
$query=$conn->query($sql);
$f=1;
if($query)
{
	$f=0;
	$row=mysqli_fetch_row($query);
    $sd=$row[0];
    $ed=$row[1];
}
if($count<=0)
{
if($f==0 && ((empty($sd) && empty($ed)) || $sd>$date))
{
	header('Location:notstarted.php');
}
else if($sd<=$date && $ed>=$date)
{
	header('Location:courseform.php');
}
else if($ed<$date)
{
	header('Location:end.php');
}
}
else
{
	if($ed<$date)
	{
		header('Location:end.php');
	}
	else
	{
        header('Location:complete.php');
	}
}
?>  