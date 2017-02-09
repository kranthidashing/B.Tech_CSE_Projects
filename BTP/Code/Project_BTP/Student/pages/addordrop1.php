<?php
session_start();
include "dbConfig.php";
$id=$_SESSION['sid'];
if(isset($_POST['log12']))
{
	//print_r($_POST);
	//echo $_POST['ad'];
	for($i=0;;$i++)
	{
		if(!empty($_POST['cx'][$i]))
		{
		    $e=$_POST['cx'][$i];
            $sql="select C_id from Course where C_name='$e'";
            $row=mysqli_fetch_row($conn->query($sql));
            $c1=$row[0];
			$sql2="insert into Dummy1 values('".$id."','".$c1."')";
            $conn->query($sql2);
            $sql3="DELETE FROM Dummy WHERE S_id='$id' AND C_id='$c1'";
            $conn->query($sql3);
        }
        else
        	break;
    }
    for($i=0;;$i++)
	{
		if(!empty($_POST['cx1'][$i]))
		{
		    $e=$_POST['cx1'][$i];
            $sql="select C_id from Course where C_name='$e'";
            $row=mysqli_fetch_row($conn->query($sql));
            $c1=$row[0];
			$sql2="insert into Dummy values('".$id."','".$c1."')";
            $conn->query($sql2);
            $sql3="DELETE FROM Dummy1 WHERE S_id='$id' AND C_id='$c1'";
            $conn->query($sql3);
        }
        else
        	break;
    }
    if(!empty($_POST['ad']))
    {
    	$sql3="DELETE FROM Additional WHERE S_id='$id'";
        $conn->query($sql3);
    }

    header('Location:registercourse.php');
    //header('Location:index.php');
}
?>