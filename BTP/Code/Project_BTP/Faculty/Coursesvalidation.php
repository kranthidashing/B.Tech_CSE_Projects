<?php
session_start();
include "dbConfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Course Validation</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top" style="width:2250px;">
            <div class="navbar-inner">
                <div class="container" style="width:2250px;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a>
                      <!--  <?php //echo '<a class="brand"><font color="Aquamarine">Welcome.....'.$_SESSION['uname'].'</font></a>'; ?> -->
                        <center class="brand" style="position: absolute;left: 610px;font-size: 30px;"><font color="#00e6e6">FACULTY PANEL</font></center>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
                                    <li><a href="main.php">Go to Dashboard</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper" style="width:2250px;">
            <div class="container">
                <div class="row">
                   <div class="span9">
                        <div class="content">
                            <div class="module" style="position:relative; left:-525px;width:2200px;">
                                <div class="module-head" >
                                    <h3>Student Courses Details</h3>
                                </div>
                                <div class="module-body table">
                                    <table class="table">
    <thead>
      <tr>
        <th>User_id</th>
        <th>Student_id</th>
        <th>User_name</th>
        <th>Roll_no</th>
        <th>User_Branch</th>
        <th>Current_Sem</th>
        <th>Core_Courses</th>
        <th>Flexi_Cores</th>
        <th>Bouquet_Cores</th>
        <th>It_Electives</th>
        <th>Math_Electives</th>
        <th>Skill_Electives</th>
        <th>Additional_Projects</th>
        <th>No.of Credits</th>
        <th>STATUS</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $g=$_SESSION['fid'];
    $aa="SELECT Sem_no,Department FROM HOD WHERE F_id='$g'";
    $r1=mysqli_fetch_row($conn->query($aa));
    $C_sem=$r1[0];
    $depat=$r1[1];
    if($depat=="COMPUTER SCIENCE & ENGNEERING")
        $dd="CSE";
    if($depat=="ELECTRONIC COMMUNICATION & ENGNEERING")
        $dd="ECE";
    $sql="select User.U_id,Student.S_id,User.F_name,User.L_name,Student.S_rollno from Semester,Department,Belongs,Studying,Student,User where Semester.sem_no='$C_sem' and Department.D_name='$depat' and Semester.Sem_id=Studying.Sem_id and Studying.S_id=Student.S_id and Department.D_id=Belongs.D_id and Belongs.S_id=Student.S_id and Student.U_id=User.U_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
     $cour1=null;
     $cour2=null;
     $cour3=null;
     $cour4=null;
     $cour5=null;
     $cour6=null;
     $crd=0;
     $m=$row["S_id"];
     $ql="select S_id from Enrolls where S_id='$m'";
     $count=mysqli_num_rows($conn->query($ql));
     $sql1="SELECT Course.C_name,Course.No_Of_Credits,Course.Type FROM Course,Dummy WHERE Dummy.S_id='$m' AND Dummy.C_id=Course.C_id";
     $result1 = $conn->query($sql1);
     if ($result1->num_rows > 0) {
     while($row1 = $result1->fetch_assoc()) 
     {
        $crd=$crd+$row1["No_Of_Credits"];
        if($row1["Type"]=="CORE")
        {
        $cour1="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour1}";
        }
         if($row1["Type"]=="Flexi_CORE")
        {
        $cour2="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour2}";
        }
         if($row1["Type"]=="Bouquet_CORE")
        {
        $cour3="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour3}";
        }
         if($row1["Type"]=="It_Elective")
        {
        $cour4="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour4}";
        }
         if($row1["Type"]=="MATH_Elective")
        {
        $cour5="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour5}";
        }
         if($row1["Type"]=="SKILL_Elective")
        {
        $cour6="{$row1["C_name"]} ({$row1["No_Of_Credits"]}) {$cour6}";
        }
     }
     }
    if($cour1==null)
        $cour1="Not_Registered";
    if($cour2==null)
        $cour2="Not_Registered";
    if($cour3==null)
        $cour3="Not_Registered";
    if($cour4==null)
        $cour4="Not_Registered";
    if($cour5==null)
        $cour5="Not_Registered";
    if($cour6==null)
        $cour6="Not_Registered";
   echo '<tr>
        <td ><center>'.$row["U_id"].'</center></td>
        <td><center>'.$row["S_id"].'</center></td>
        <td>'.$row["F_name"].' '.$row["L_name"].'</td>
        <td>'.$row["S_rollno"].'</td>
        <td>'.$dd.'</td>
        <td><center>'.$C_sem.'</center></td>
        <td>'.$cour1.'</td>
        <td>'.$cour2.'</td>  
        <td>'.$cour3.'</td>
        <td>'.$cour4.'</td>
        <td>'.$cour5.'</td>
        <td>'.$cour6.'</td>
        <td>Under Uma of 2 credits</td>
        <td>'.$crd.'-Credits</td>';
        if($count<=0)
        {
      echo '<td><form action="enroll.php" method="POST">
            <button type="submit" class="btn" style="background-color: green;" name="accept" id="accept" value='.$m.'>Accept</button>
            <button type="submit" class="btn" style="background-color: red;" disabled>Reject</button>
        </form>
        </td>';
         }
         if($count>0)
        {
      echo '<td>
            <button type="submit" class="btn" style="background-color: Aqua;" disabled>Accepted</button>
            </td>';
         }
     echo  '</tr>'; }}
      ?>
    </tbody>
  </table>
                                </div>
                            </div>
                            <!--/.module-->
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2016 Faculty_StudentsPortal_</b>All rights reserved.
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
