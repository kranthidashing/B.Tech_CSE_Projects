<?php
session_start();
$k=0;
include "dbConfig.php";
$FnameErr = $LnameErr = $unameErr = $enameErr = "";
$fname=$lname=$gender=$uname=$email=$pass="";
if ($_POST["submit"])
{
if(empty($_POST["Fname"]))
{
	$k=1;
	$FnameErr = "Name is required";
}
else
{
$fname=$_POST["Fname"];
}
if(empty($_POST["Lname"]))
{
	$k=1;
	$LnameErr = "Name is required";
}
else
{
$lname=$_POST["Lname"];
}
if(empty($_POST["uname"]))
{
	$k=1;
	$unameErr = "Username is required";
}
else
{
$uname=$_POST["uname"];
}
if(empty($_POST["ename"]))
{
	$k=1;
	$enameErr = "Email is required";
}
else
{
$email=$_POST["ename"];
}
if(empty($_POST["pass"]))
{
	$k=1;
	$passErr= "Password is required";
}
else
{
$pass=$_POST["pass"];
}
if($_POST["submit"])
{
if($k!=1)
{
$unam=$_POST["uname"];
$enam=$_POST["ename"];
$sql="select uname,email from signup where uname='$unam' or email='$enam'";
//echo $sql;
$query=mysql_query($sql);
//echo $query;
if($query)
{
	$row=mysql_fetch_row($query);
	//print_r($row);
	$u=$row[0];
	$p=$row[1];
if(($unam == $u && $enam == $p))
{
	$k=1;
	echo "email and username already exists";
}
else if(($unam == $u && $enam != $p))
{
	$k=1;
	echo "username already exists";
}
else if(($unam != $u && $enam == $p))
{
	$k=1;
	echo "email already exists";
}
}
if($k!=1)
{
if(!empty($_POST["Fname"]) && !empty($_POST["Lname"]) && !empty($_POST["uname"]) && !empty($_POST["ename"]) && !empty($_POST["pass"]))
{
$sql="insert into signup set fname='".$fname."',lname='".$lname."',uname='".$uname."',email='".$email."',pswd='".md5($pass)."',gender='".$gender."'";
$query=mysql_query($sql);
if(!$query)
	echo "falied".mysqli_error();
else	
{
	echo "sucessfull register";
	header('Location:after.php');
}
}
}
}
}
}
?>
