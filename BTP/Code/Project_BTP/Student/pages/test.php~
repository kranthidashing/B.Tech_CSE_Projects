<?php
session_start();
include "dbConfig.php";
if (isset($_POST['log']))
{
 $y=$_SESSION['id'];
 $r=$_POST['rnum'];
 $g=$_POST['age'];
 $d=$_POST['dob'];
 $add=$_POST['add'];
 $s=$_POST['sem'];
 $dp=$_POST['dep'];
 $sql="insert into Student(U_id,S_rollno,S_age,S_dob,S_address) values('".$_SESSION['id']."','".$r."','".$g."','".$d."','".$add."')";
 $conn->query($sql);
 $sql1= "SELECT S_id,U_id FROM Student WHERE U_id='$y'";
 $query=$conn->query($sql1);
 if($query)
{
	$row=mysqli_fetch_row($query);
	echo $i=$row[0];
}
$_SESSION['sid']=$i;
 if($s==1)
 	{$s1=101;}
 if($s==2)
 	{$s1=102;}
 if($s==3)
 	{$s1=201;}
 if($s==4)
 	{$s1=202;}
 if($s==5)
 	{$s1=301;}
 if($s==6)
 	{$s1=302;}
 if($s==7)
 	{$s1=401;}
 if($s==8)
 	{$s1=402;}
 $sql2="insert into Studying values('".$i."','".$s1."')";
 $conn->query($sql2);
 if($dp==2)
 	{$s2=1002;}
 if($dp==1)
    {$s2=1001;}
$sql3="insert into Belongs values('".$i."','".$s2."')";
 $conn->query($sql3);

header('Location:index.php');
}
?>