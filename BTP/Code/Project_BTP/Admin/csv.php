<?php
session_start();
include "dbConfig.php";
// path where your CSV file is located
if(isset($_POST["submit"]))
{
  if($_POST["file"]!='user_details.csv' || empty($_POST["file"]))
  {
     header('Location:incorrect1.php');
  }
  else
  {
define('CSV_PATH','/var/www/html/Project_BTP/Admin/csv_files/');
$e=$_POST["file"];
// Name of your CSV file
$csv_file = CSV_PATH . $e; 

if (($handle = fopen($csv_file, "r")) !== FALSE) {
   fgetcsv($handle);   
   while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
   {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $col[$c] = $data[$c];
        }

   $col1 = $col[0];
   $col2 = $col[1];
   $col3 = $col[2];
   $col4 = $col[3];
   $col5 = $col[4];
   $col6 = md5($col[5]);
   $col7 = $col[6];
   $col8 = $col[7];
   
// SQL Query to insert data into DataBase
$query = "insert into User(F_name,L_name,U_name,U_gender,U_email,U_password,U_phone_no,U_category) values('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."','".$col8."')";
$s=$conn->query($query);
}
    fclose($handle);
}
 header('Location:usertable.php');
}
}
?>
