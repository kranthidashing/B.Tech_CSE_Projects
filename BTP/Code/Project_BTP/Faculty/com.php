<?php
session_start();
include "dbConfig.php";
$c1=$_POST['c1'];
$c2=$_POST['c2'];
$sql="select Dummy.S_id,User.F_name from Dummy,Student,User,Course where Course.C_name='$c1' and Course.C_id=Dummy.C_id and Dummy.S_id=Student.S_id and Student.U_id=User.U_id";
$result = $conn->query($sql);

   if ($result->num_rows > 0) 
   {
    // output data of each row
    while($row = $result->fetch_assoc()) 
     {
     	$c11[]=$row['F_name'];
     }
  }


  echo '<br>';
  echo '<br>';


  $sql="select Dummy.S_id,User.F_name from Dummy,Student,User,Course where Course.C_name='$c2' and Course.C_id=Dummy.C_id and Dummy.S_id=Student.S_id and Student.U_id=User.U_id";
$result = $conn->query($sql);

   if ($result->num_rows > 0) 
   {
    // output data of each row
    while($row = $result->fetch_assoc()) 
     {
     	   $c22[]=$row['F_name'];
     }
  }

   $result1=array_intersect($c11,$c22);
       $f1=count($result1);
        for($i=0;$i<=$f1;$i++)
	{
		if(!empty($result1[$i]))
		{
			$c33[]=$result1[$i]; 
		}
	}

    print_r($c33);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>common data</title>
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
                        <?php echo '<a class="brand"><font color="Aquamarine">Welcome.....'.$_SESSION['uname'].'</font></a>'; ?>
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
                            <div class="module">
                                <div class="module-head">
                                    <h3>Student Data Table</h3>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    S.no
                                                </th>
                                                <th>
                                                    Student_Name
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
    // output data of each row          
                                        $m=0;
                                        while(!empty($c33[$m])) 
                                        {
                                        	$m1=$m+1;
                                      echo '<tbody>
                                            <tr class="odd gradeX">
                                                <td class="center" >'.
                                                    $m1.'
                                                </td>
                                                <td>'.
                                                    $c33[$m].'
                                                </td>
                                            </tr>';
                                            $m=$m+1;
                                        }
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
