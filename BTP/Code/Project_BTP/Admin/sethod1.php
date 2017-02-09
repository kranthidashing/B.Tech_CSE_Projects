<?php
session_start();
include "dbConfig.php";
if(isset($_POST['submit1']))
{
     echo  $fa_id=$_POST['c1'];
      $dep_no=$_POST['c2'];
    echo   $sem_no=$_POST['c3'];
      $d=$sem_no/2;
      if($d==0.5)
      	$f=11;
      if($d==1)
      	$f=12;
      if($d==1.5)
      	$f=21;
      if($d==2)
      	$f=22;
      if($d==2.5)
      	$f=31;
      if($d==3)
      	$f=32;
      if($d==3.5)
      	$f=41;
      if($d==4)
      	$f=42;
     echo $hod=$dep_no.$f;
      if($dep_no==1)
      	$dep_name="COMPUTER SCIENCE & ENGNEERING";
      if($dep_no==2)
      	$dep_name="ELECTRONIC COMMUNICATION & ENGNEERING";
      echo $dep_name;

      $sql="UPDATE HOD SET F_id='$fa_id',Sem_no='$sem_no',Department='$dep_name' WHERE H_id='$hod'";
      $conn->query($sql);
      header("Location:hodtable.php");
}
?>