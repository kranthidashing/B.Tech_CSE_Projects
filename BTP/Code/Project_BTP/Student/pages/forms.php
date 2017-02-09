<?php
session_start();
include "dbConfig.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Welcome....<?php echo $_SESSION['uname'] ?></a>
                 <center class="brand" style="position: absolute;top: 5px;left: 610px;font-size: 30px;font-style: bold;"><font color="#00e6e6">STUDENTS PANEL</font></center>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-file-text fa-fw"></i>Attendence Portal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="courseslist.php">View Attendences</a>
                                </li>
                                <li>
                                    <a href="#">Request for Attendences</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list fa-fw"></i>Course Portal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="check.php">Course Registration</a>
                                </li>
                                <li>
                                    <a href="registercourse.php">View register courses</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Library Portal<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">View Book</a>
                                </li>
                                <li>
                                    <a href="#">Request for Book</a>
                                </li>
                                <li>
                                    <a href="#">Check Status</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1><Center class="page-header">Update Profile</Center></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
            $f=$_SESSION['id'];
            $sql="SELECT U_id,F_name,L_name,U_name,U_gender,U_email,U_phone_no,U_category  FROM User WHERE U_id='$f'";
                             $query = $conn->query($sql);
                            if($query)
                            {
                               $row=mysqli_fetch_row($query);
                                $Full_Name=$row[1].' '.$row[2];
                                $U_name=$row[3];
                                $U_gender=$row[4];
                                $U_email=$row[5];
                                $U_phone_no=$row[6];
                                $U_category=$row[7];
                            }
            ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" role="form" action="test.php" method="POST">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Full_Name:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$Full_Name.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">User_Name:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$U_name.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">User_Email:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$U_email.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">User_Role:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$U_category.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Gender:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$U_gender.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">phone_no:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 40px; font-size: 20px;">'.$U_phone_no.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Roll_No:</label>
                                            <div class="col-sm-10">
                                            <input type="tel" class="form-control" style="position:relative; left: 40px;" name="rnum" placeholder="Enter Your Rollno....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Age:</label>
                                            <div class="col-sm-10">
                                            <input type="number" class="form-control" style="position:relative; left: 40px;" name="age" placeholder="Enter Your Age....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">DOB:</label>
                                            <div class="col-sm-10">
                                            <input type="date" name="dob" class="form-control" style="position:relative; left: 40px;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Address:</label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" style="position:relative; left: 40px;" name="add" rows="3"></textarea>
                                            </div>
                                        </div>
   
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Branch:</label>
                                            <div class="col-sm-10">
                                            <div class="radio" style="position:relative; left: 40px;">
                                                <label>
                                                    <input type="radio" name="dep"  id="optionsRadios1" value="1" checked>Computer & Science Engneering
                                                </label>
                                            </div>
                                            <div class="radio" style="position:relative; left: 40px;">
                                                <label>
                                                    <input type="radio" name="dep"  id="optionsRadios2" value="2">Electronic & Communcation Engneering
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 18px;" for="text">Semster:</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" style="position:relative; left: 40px; " name="sem">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" name="log" style="position:relative;left: 375px;" class="btn btn-default">Update</button>
                                        <button type="reset"  onclick="form.html" style="position:relative;left: 400px;" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
