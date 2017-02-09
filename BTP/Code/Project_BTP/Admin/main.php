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
        <title>Admin</title>
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
                                <li><a href="#"><i class="menu-icon icon-bullhorn"></i>News Feed </a>
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
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="usertable.php" class="btn-box big span4"><i class=" icon-group"></i>
                                        <p class="text-muted">
                                            Users</p>
                                    </a><a href="studentable.php" class="btn-box big span4"><i class="icon-group"></i>
                                        <p class="text-muted">
                                            Students</p>
                                    </a>
                                    </a><a href="facultytable.php" class="btn-box big span4"><i class="icon-group"></i>
                                        <p class="text-muted">
                                            faculties</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12" style="position : relative; left :145px;">
                                                <a href="form.php" class="btn-box small span4"><i class=" icon-user"></i><b>Add Users</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-list"></i><b>Add Course</b>
                                                </a><a href="validation1.php" class="btn-box small span4"><i class="icon-edit"></i><b>Course Validation</b></a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12" style="position : relative; left :145px;">
                                                <a href="sethod.php" class="btn-box small span4"><i class="icon-user"></i><b>Add Faculty Advisor</b>
                                                </a><a href="hodtable.php" class="btn-box small span4"><i class="icon-group"></i><b>View Faculty Advisor's</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b> </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12" style="position : relative; left :145px;">
                                                <a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b> </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12" style="position : relative; left :145px;">
                                                <a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-warning-sign"></i><b>Under Construction</b> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2016 Admin_StudentsPortal</b>All rights reserved.
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
