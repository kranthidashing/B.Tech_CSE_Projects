<?php
session_start();
include "dbConfig.php";
if (isset($_POST['log']) && !empty($_POST['uname']) && !empty($_POST['pass']))
{
 $unam=$_POST["uname"];
 $pas=$_POST["pass"];
$pas=md5($pas);
$sql = "SELECT U_id,U_name,U_password,U_category FROM User WHERE  U_name='$unam'";
$sql1= "SELECT Student.U_id,User.U_id,User.U_name,Student.S_id FROM Student,User WHERE Student.U_id=User.U_id AND User.U_name='$unam'";
$query = $conn->query($sql);
$query1 = $conn->query($sql1);
if($query)
{
	$row=mysqli_fetch_row($query);
	//print_r($row);
	 $i=$row[0];
	 $u=$row[1];
	 $p=$row[2];
	 $c=$row[3];
}
if($query1)
{
	$row=mysqli_fetch_row($query1);
	//print_r($row);
	 $u1=$row[2];
	 $s1=$row[3];
}
if($unam == $u && $pas == $p && $c == "student")
{
	$_SESSION['uname']=$unam;
	$_SESSION['id']=$i;
	if($unam == $u1)
	{
	$_SESSION['sid']=$s1;
	header('Location:pages/index.php');	 
    }
    else
    {
        header('Location:proceed.php');
    }
}
else
{
header('Location:incorrect.php');
}  
}
?>