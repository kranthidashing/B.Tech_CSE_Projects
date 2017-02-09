<?php
session_start();
include "dbConfig.php"
$c_id = (int)$_GET['C_id'];
//$s_id=$_SESSION['sid'];
$s_id=3;
$sql="SELECT Session_date,Absenties FROM Session Where C_id='$c_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{  
	echo unserialize($row["Absenties"]);
	echo '<br>';



}
}
?>