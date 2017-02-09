<?php
session_start();
include "dbConfig.php";
if((isset($_POST['log']) && $_POST['c1']<>$_POST['c2'] && $_POST['c2']<>$_POST['c3'] && $_POST['c1']<>$_POST['c3']) || isset($_POST['log']) && empty($_POST['c2']) && empty($_POST['c3']))
{
    $uid=$_SESSION['id'];
    $des=$_POST['des'];
    $age=$_POST['age'];
    $dob=$_POST['dob'];
    $c1 =$_POST['c1'];
    $c2 =$_POST['c2'];
    $c3 =$_POST['c3'];
  $sql="insert into Faculty(U_id,F_designation,F_age,F_dob) values('".$uid."','".$des."','".$age."','".$dob."')";
   $conn->query($sql);
   $sql1= "SELECT F_id,U_id FROM Faculty WHERE U_id='$uid'";
   $query=$conn->query($sql1);
 if($query)
{
   $row=mysqli_fetch_row($query);
   $i=$row[0];
}
$_SESSION['fid']=$i;
if(!empty($_POST['c1']))
{
  $sql="select C_id from Course where C_name='$c1'";
 $f=$conn->query($sql);
  if($f)
{
   $row=mysqli_fetch_row($f);
   $i1=$row[0];
}
$sql="insert into Teaches(C_id,F_id) values('".$i1."','".$i."')";
$conn->query($sql);
}
if(!empty($_POST['c2']))
{
 $f=$conn->query("select C_id from Course where C_name='$c2'");
  if($f)
{
   $row=mysqli_fetch_row($f);
   $i1=$row[0];
}
$sql="insert into Teaches values('".$i1."','".$i."')";
$conn->query($sql);
}

if(!empty($_POST['c3']))
{
 $f=$conn->query("select C_id from Course where C_name='$c3'");
  if($f)
{
   $row=mysqli_fetch_row($f);
   $i1=$row[0];
}
$sql="insert into Teaches values('".$i1."','".$i."')";
$conn->query($sql);

}
header('Location:main.php');
}
else
{
   header('Location:check.php');
}
?>