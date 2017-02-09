<?php
session_start();
$servername ="localhost";
$username = "root";
$password = "kranthi158";
$dbname = "students_portal";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
if($_POST['unam']=='Admin1')
{
if (isset($_POST['login']) && !empty($_POST['unam']) && !empty($_POST['pas']))
{
$unam=$_POST['unam'];
$pas=$_POST['pas'];
$pas=md5($pas);
$sql = "SELECT A_name,A_password FROM Admin WHERE  A_name='$unam'";
$query = $conn->query($sql);
if($query)
{
	$row=mysqli_fetch_row($query);
         $u=$row[0];
	     $p=$row[1];
}
if($unam == $u && $pas == $p)
{
	$_SESSION['User'] = $u;
    header('Location:Admin/main.php');
}
else
{
   header('Location:Admin/incorrect.php');
} 
}
}
else
{
if(isset($_POST['login']) && !empty($_POST['unam']) && !empty($_POST['pas']))
{
$unam=$_POST["unam"];
$pas=$_POST["pas"];
$pas=md5($pas);
$sql = "SELECT U_id,U_name,U_password,U_category FROM User WHERE  U_name='$unam'";
$query = $conn->query($sql);
if($query)
{
	$row=mysqli_fetch_row($query);
	//print_r($row);
	 $i=$row[0];
	 $u=$row[1];
	 $p=$row[2];
	 $c=$row[3];
}
if($c=="student")
{
$sql1= "SELECT Student.U_id,User.U_id,User.U_name,Student.S_id FROM Student,User WHERE Student.U_id=User.U_id AND User.U_name='$unam'";
$query1 = $conn->query($sql1);
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
	header('Location:Student/pages/index.php');	 
    }
    else
    {
        header('Location:Student/proceed.php');
    }
}
else
{
header('Location:incorrect.php');
}  
}
else
{
$sql2= "SELECT Faculty.U_id,User.U_id,User.U_name,Faculty.F_id FROM Faculty,User WHERE Faculty.U_id=User.U_id AND User.U_name='$unam'";
$query2 = $conn->query($sql2);
if($query2)
{
	$row=mysqli_fetch_row($query2);
	//print_r($row);
	 $u2=$row[2];
	 $s2=$row[3];
}

if($unam == $u && $pas == $p && $c == "faculty")
{
	$_SESSION['uname']=$unam;
	$_SESSION['id']=$i;
	if($unam == $u2)
	{
	$_SESSION['fid']=$s2;
	header('Location:Faculty/main.php'); 
    }
    else
    {
        header('Location:Faculty/proceed.php');
    }
}
else
{
header('Location:incorrect.php');
}  
}
}
}
?>
