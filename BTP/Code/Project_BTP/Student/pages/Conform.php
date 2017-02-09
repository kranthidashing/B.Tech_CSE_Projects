<?php
session_start();
include "dbConfig.php";
$id=$_SESSION['sid'];
if(isset($_POST['log1']))
{
	$r=mysqli_fetch_row($conn->query("select Sem_id from Studying where S_id='$id'"));
    $semid=$r[0];
    $r=mysqli_fetch_row($conn->query("select Sem_no from Semester where Sem_id='$semid'"));
    $semno=$r[0];
    $result=$conn->query("select C_name from Course where C_id like '$semno%'");
    if ($result->num_rows > 0) 
    {
    while($row = $result->fetch_assoc()) 
    {
    	$r1[]=$row["C_name"];
    }
    }
    $f1=count($r1);
	for($i=0;;$i++)
	{
		if(!empty($_POST['cx'][$i]))
		{
		    $c[]=$_POST['cx'][$i];
		    $e=$_POST['cx'][$i];
            $sql="select C_id from Course where C_name='$e'";
            $row=mysqli_fetch_row($conn->query($sql));
            $c1=$row[0];
			$sql2="insert into Dummy values('".$id."','".$c1."')";
            $conn->query($sql2);
        }
        else
        	break;
    }
    $result1=array_diff($r1,$c);
    for($i=0;$i<$f1;$i++)
	{
		if(!empty($result1[$i]))
		{
		    $e=$result1[$i];
            $sql="select C_id from Course where C_name='$e'";
            $row=mysqli_fetch_row($conn->query($sql));
            $c11=$row[0];
			$sql2="insert into Dummy1 values('".$id."','".$c11."')";
            $conn->query($sql2);
        }
    }
    if(!empty($_POST['fname1']) && !empty($_POST['cr1']))
    {
    	$fname1=$_POST['fname1'];
    	$cr1=$_POST['cr1'];
    	$sql2="insert into Additional values('".$id."','".$fname1."','".$cr1."')";
        $conn->query($sql2);

    }
    header('Location:completed.php');
}

?>