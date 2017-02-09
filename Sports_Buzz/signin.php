<?php
session_start();
include "dbConfig.php";
if($_POST["log"])
{
$unam=$_POST["uname"];
$pas=$_POST["pass"];
$pas=md5($pas);
$sql="select id,uname,pswd from signup where uname='$unam' ";
//echo $sql;
$query=mysql_query($sql);

//echo $query;
//echo "kejf";
if($query)
{
	$row=mysql_fetch_row($query);
	//print_r($row);
	echo $u=$row[1];
	echo $p=$row[2];
	$_SESSION['id']=$row[0];
    echo $unam;
    echo $pas;
}
if($unam == $u && $pas == $p)
{
	//echo "klwgm";

	$_SESSION['uname']=$unam;
	echo "welcom $unam";
	header('Location:loc.php');
}
else
{
echo "incorrect username or password";
header('Location:incorrect.php');
}
}
?>