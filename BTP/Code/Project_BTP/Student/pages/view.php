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

    <title>Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
         
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4><center>Attendences Details</center><h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="info">
                                            <th><center>Session.no</center></th>
                                            <th><center>Session_datetime</center></th>
                                            <th><center>Status</center></th>
                                        </tr>
                                    </thead>
                                    <?php  
                                     $c_id = (int)$_GET['C_id'];
                                     $s_id=$_SESSION['sid'];
                                     //$s_id=6;
                                     $no_of_sessions=0;
                                     $no_of_presents=0;
                                     $no_of_absents=0;
                                     $sql="SELECT Session_date,Absenties FROM Session Where C_id='$c_id'";
                                     $result = $conn->query($sql);
                                     if ($result->num_rows > 0) 
                                     {
                                     while($row = $result->fetch_assoc()) 
                                     {  
	                                    $no_of_sessions++;
                                        $q=array();
                                        if(empty($row["Absenties"]) || $row["Absenties"]=='N;')
                                        {
                                               $no_of_presents++;
                                               $status ="PRESENT";
                                        }
                                        else
                                        {
	                                    $q=unserialize($row["Absenties"]);
	                                    if (in_array($s_id,$q)) 
	                                    {
	                                          $no_of_absents++;
                                              $status ="ABSENT";
                                        }
                                        else
                                        {
                                               $no_of_presents++;
                                               $status ="PRESENT";
                                        }
                                        }
                                     //   echo $row["Session_date"].'------------>'.$status;
	                                   // echo '<br>';
                                     echo
                                    '<tbody>
                                        <tr class="success">
                                            <td><center>'.$no_of_sessions.'</center></td>
                                            <td><center>'.$row["Session_date"].'</center></td>
                                            <td><center>'.$status.'</center></td>
                                        </tr>
                                    </tbody>';  }}
                                    
                                    ?>
                                </table>
                            </div> 
                            <!-- /.table-responsive -->
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="danger">
                                            <th><center>No_Of_Sessions</center></th>
                                            <th><center>No_Of_Absents</center></th>
                                            <th><center>No_Of_Presents</center></th>
                                            <th><center>Attendence Percentage</center></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $percentage=0;
                                    if($no_of_sessions!=0)
                                    {
                                    $percentage=($no_of_presents/$no_of_sessions)*100;
                                    }
                                    echo '<tbody>
                                        <tr class="warning">
                                            <td><center>'.$no_of_sessions.'</center></td>
                                            <td><center>'.$no_of_absents.'</center></td>
                                            <td><center>'.$no_of_presents.'</center></td>
                                            <td><center>'.$percentage.'%</center></td>
                                        </tr>
                                        
                                    </tbody>';
                                    ?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
