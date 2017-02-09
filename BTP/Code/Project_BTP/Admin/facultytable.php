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
        <title>Faculty Table</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a>
                        <?php echo '<a class="brand"><font color="Aquamarine">Welcome.....'.$_SESSION['User'].'</font></a>'; ?>
                        <center class="brand" style="position: absolute;left: 610px;font-size: 30px;"><font color="#00e6e6">ADMIN PANEL</font></center>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/user.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Your Profile</a></li>
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
        <div class="wrapper">
            <div class="container">
                <div class="row">
                  <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="main.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
                                </li>
                                <li><a href="studentable.php"><i class="menu-icon icon-user"></i>Student Info</a></li>
                                <li><a href="facultytable.php"><i class="menu-icon icon-group"></i>Faculty Info</a></li>
                                <li><a href="hodtable.php"><i class="menu-icon icon-group"></i>HOD's Info</a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <h3>Faculty Data Table</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Faculty_id
                                                </th>
                                                <th>
                                                    User_id
                                                </th>
                                                <th>
                                                    User_Name
                                                </th>
                                                <th>
                                                    Designation
                                                </th>
                                                <th class="center">
                                                    Courses_Teaches
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql = "SELECT  Faculty.F_id,User.U_id,User.F_name,User.L_name,Faculty.F_designation FROM User,Faculty Where  Faculty.U_id=User.U_id";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            $cour=null;
                                            $m=$row["F_id"];
                                            $sql1="SELECT Course.C_name FROM Course,Teaches WHERE Teaches.F_id='$m' AND Teaches.C_id=Course.C_id";
                                            $result1 = $conn->query($sql1);
                                            if ($result1->num_rows > 0) {
                                            while($row1 = $result1->fetch_assoc()) 
                                            {
                                                 $cour="{$row1["C_name"]}  ,  {$cour}";
                                            }
                                            }
                                      echo '<tbody>
                                            <tr class="odd gradeX">
                                                <td class="center" >'.
                                                    $row["F_id"].'
                                                </td>
                                                <td class="center" >'.
                                                    $row["U_id"].'
                                                </td>
                                                <td>'.
                                                    $row["F_name"].' '.$row["L_name"].'
                                                </td>
                                                <td>'.
                                                    $row["F_designation"].'
                                                </td>
                                                 <td>'.
                                                    $cour.'
                                                </td>
                                            </tr>';
                                        }}
                                               ?>
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
                <b class="copyright">&copy; 2016 Admin_StudentsPortal_</b>All rights reserved.
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
