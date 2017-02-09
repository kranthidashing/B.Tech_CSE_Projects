<?php
include "dbConfig.php";
if($_POST["log"])
{
	$f1=$_POST["field1"];
	$f2=$_POST["field2"];
    $result = $db->query("insert into events(title,date) values('".$f1."','".$f2."')");
}
if($result)
{
	header('location:index.php');
}

?>