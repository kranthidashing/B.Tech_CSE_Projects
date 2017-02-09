<?php
include "dbConfig.php";
if (isset($_POST['submit']))
{
   $col1 = $_POST['fname'];
   $col2 = $_POST['lname'];
   $col3 = $_POST['uname'];
   $col4 = $_POST['ugender'];
   $col5 = $_POST['uemail'];
   $col6 = md5($_POST['upass']);
   $col7 = $_POST['uph'];
   $col8 = $_POST['urole'];
   $query = "insert into User(F_name,L_name,U_name,U_gender,U_email,U_password,U_phone_no,U_category) values('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."','".$col8."')";
   $s=$conn->query($query);
   header('Location:usertable.php');
}
?>