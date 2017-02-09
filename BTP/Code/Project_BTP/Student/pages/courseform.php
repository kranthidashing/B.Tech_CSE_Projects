<?php
session_start();
include "dbConfig.php";
$sql="SELECT E_date FROM validition WHERE vid=1";
$query=$conn->query($sql);
$y=1;
if($query)
{
    $y=0;
    $row=mysqli_fetch_row($query);
    $ed=$row[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>

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
                    <h1><Center class="page-header">Course Registration</Center></h1>
                </div>

                <!-- /.col-lg-12 -->
            </div> 
                       <?php
            $f=$_SESSION['id'];
            $f1=$_SESSION['sid'];
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
            $sql1="SELECT S_id,U_id,S_rollno,S_age,S_dob,S_address FROM Student WHERE U_id='$f' AND S_id='$f1'";
                             $query1 = $conn->query($sql1);
                            if($query1)
                            {
                                $row=mysqli_fetch_row($query1);
                                $U_rollno=$row[2];
                                $U_age=$row[3];
                                $U_dob=$row[4];
                                $U_add=$row[5];
                            }
            $sql2="SELECT Department.D_name,Department.D_period  FROM Department,Belongs WHERE Belongs.S_id='$f1' AND Department.D_id=Belongs.D_id";
                             $query2 = $conn->query($sql2);
                            if($query2)
                            {
                              $row=mysqli_fetch_row($query2);
                              $U_department=$row[0];
                              $U_Period=$row[1];
                            }  
            $sql3="SELECT Semester.year,Semester.season,Semester.Sem_no  FROM Semester,Studying WHERE Studying.S_id='$f1' AND Semester.Sem_id=Studying.Sem_id";
                             $query3 = $conn->query($sql3);
                            if($query3)
                            {
                              $row=mysqli_fetch_row($query3);
                              $U_year=$row[0];
                              $U_season=$row[1];
                              $U_sem_no=$row[2];
                            }  
            $sql4="SELECT Course.C_name,Course.No_Of_Credits,Course.Type FROM Semester,Offers,Course,Handles,Department WHERE Semester.Sem_no='$U_sem_no' AND Semester.Sem_id=Offers.Sem_id AND Offers.C_id=Course.C_id AND Department.D_name='$U_department' AND Department.D_id=Handles.D_id AND Handles.C_id=Course.C_id";
                              $result = $conn->query($sql4);
                              $in=0;
                              if ($result->num_rows > 0) 
                              {
                              while($row = $result->fetch_assoc()) 
                              {
                                   $course[]=$row['C_name'];
                                    $credits[]=$row['No_Of_Credits'];
                                   $type[]=$row['Type']; 
                                   $in++;
                              }
                              }
            ?>          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php echo'<p class="form-control-static" style="position:relative; left: opx; font-size: 19px; font-style: Bold;">Form_Expires:'.'<a  style="font-size: 16px; font-style: italic;">  '.$ed.'</a></p>'; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" role="form" action="Conform.php" method="POST">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Full_Name:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$Full_Name.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">User_Name:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_name.'</p>'; ?> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Roll_no:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_rollno.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Branch:</label>
                                            <div class="col-sm-10">
                                           <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_department.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Current_year:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_year.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Current_sem:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_sem_no.'</p>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Current_season:</label>
                                            <div class="col-sm-10">
                                            <?php echo'<p class="form-control-static" style="position:relative; left: 65px; font-size: 19px; font-style: italic;">'.$U_season.'</p>'; ?> 
                                            </div>
                                        </div> 
                                       <label class="control-label col-sm-2" style="position: relative;left: -15px; font-size: 16px;" for="text"> AVALIABLE_COURSES</label>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Core_Courses:</label>
                                            <div class="col-sm-10">
                                            <?php 
                                            $flag1=0;
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='CORE')
                                            	{ $flag1=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag1==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Flexi_Cores:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag2=0;
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='Flexi_CORE')
                                            	{ $flag2=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }

                                            if($flag2==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            } 
                                            ?>
                                            
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Bouquet_Cores:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag3=0;
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='Bouquet_CORE')
                                            	{ $flag3=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            } 
                                            if($flag3==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            } 
                                            ?>  
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">It_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag4=0;
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='It_Elective')
                                            	{ $flag4=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            } 
                                            if($flag4==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            } 
                                            ?>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Math_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php
                                            $flag5=0; 
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='Math_Elective')
                                            	{
                                            		$flag5=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag5==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br><br>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Skill_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag=0;
                                            for($ii=0;$ii<$in;$ii++)
                                            {
                                            	if($type[$ii]=='Skill_Elective')
                                            	{
                                            		$flag=1;
                                            echo'
                                            <div class="checkbox" name="cx[]" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag==0)
                                            {
                                            	echo '<p class="form-control-static" style="position:relative; left: 135px; font-size: 17px; font-style: italic;">NOT_Avaliable For the Current Semester</p>';
                                            } 
                                            ?>
                                            
                                            </div>
                                            </div>
                                            <br>
                                             <label class="control-label col-sm-2" style="position: relative;left: -15px; font-size: 17px;" for="text">Additional_Project_1</label>
                                            <br><br>
                                            <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 16px;" for="text">Faculty_name:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" style="position:relative; left: 65px;" name="fname1" placeholder="Enter Faculty Name....">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 16px;" for="text">No_Of_Credits:</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" style="position:relative; left: 65px; " name="cr1">
                                                <option value="">Select credits..</option>
                                                <option value="2">2-cr</option>
                                            
                                                <option value="4">4-cr</option>
                                              
                                            </select>
                                            </div>
                                            </div>
                                            <br>
                                        <button type="submit" name="log1" style="position:relative;left: 375px;" class="btn btn-default">Submit</button>
                                        <button type="reset"  onclick="courseform.php" style="position:relative;left: 400px;" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                               
                                
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
