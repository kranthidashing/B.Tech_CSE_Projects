<?php
session_start();
include "dbConfig.php";
$sql="SELECT E_date FROM validition WHERE vid=1";
$query=$conn->query($sql);
$f=1;
if($query)
{
    $f=0;
    $row=mysqli_fetch_row($query);
    $ed=$row[0];
}
$f1=$_SESSION['sid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add OR Drop</title>

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
                            <!-- /.nav-second-level -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php 
         $sql="select C_id from Dummy where S_id='$f1'";
         $result = $conn->query($sql);
         $in=0;
         if ($result->num_rows > 0) 
         {
         while($row = $result->fetch_assoc()) 
         { 
            $c12=$row['C_id'];
            $sql2="SELECT C_name,No_Of_Credits,Type FROM Course WHERE C_id='$c12'";
            $query2 =$conn->query($sql2);
            $row1=mysqli_fetch_row($query2);
            $course[]=$row1[0];
            $credits[]=$row1[1];
            $type[]=$row1[2]; 
            $in++;
          }
          }
          
          $sql="select C_id from Dummy1 where S_id='$f1'";
         $result = $conn->query($sql);
         $in1=0;
         if ($result->num_rows > 0) 
         {
         while($row = $result->fetch_assoc()) 
         { 
            $c12=$row['C_id'];
            $sql2="SELECT C_name,No_Of_Credits,Type FROM Course WHERE C_id='$c12'";
            $query2 =$conn->query($sql2);
            $row1=mysqli_fetch_row($query2);
            $course1[]=$row1[0];
            $credits1[]=$row1[1];
            $type1[]=$row1[2]; 
            $in1++;
          }
          }

        ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1><Center class="page-header">Add or Drop Courses</Center></h1>
                </div>

                <!-- /.col-lg-12 -->
            </div>          
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php echo'<p class="form-control-static" style="position:relative; left: opx; font-size: 19px; font-style: Bold;">Form_Expires:'.'<a  style="font-size: 16px; font-style: italic;">  '.$ed.'</a></p>'; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form class="form-horizontal" role="form" action="addordrop1.php" method="POST">
                                       
                                       <label class="control-label col-sm-2" style="position: relative;left: 375px; font-size: 21px;" for="text">DROP_COURSES</label>
                                            <br><br>
                                            <center><p style="position: relative;left: 250px; font-size: 15px; font-style: italic;">(**Tick the courses that you want to drop**)</p></center>
                                            <br>
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
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br>
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
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            
                                            </div>
                                        </div>
                                        <br>
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
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>  
                                            </div>
                                        </div>
                                        <br>
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
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            </div>
                                        </div>
                                        <br>
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
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br>
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
                                            <div class="checkbox"  style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$course[$ii].'">'.$course[$ii].'**('.$credits[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag==0)
                                            {
                                            	echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            <br>
                                            
                                            </div>
                                            </div>
                                             <label class="control-label col-sm-2" style="position: relative;left: -15px; font-size: 17px;" for="text">Additional_Project_1</label>
                                             <div class="col-sm-10" >
                                            <?php 
                                            $flagx=0;
                                            $sqlx="select Faculty_name,Credits from Additional where S_id='$f1'";
                                            $queryx =$conn->query($sqlx);
                                            $rowx=mysqli_fetch_row($queryx);
                                            $facul=$rowx[0];
                                            $cred=$rowx[1];
                                            if(!empty($facul) && !empty($cred))
                                            {
                                            $flagx=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 18px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="ad" style="height: 16px; width: 18px;" value="'.$f1.'">Faculty_name:'.' '.$facul.' '.'('.$cred.'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            if($flagx==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <label class="control-label col-sm-2" style="position: relative;left: 375px; font-size: 21px;" for="text">ADD_COURSES</label>
                                            <br><br>
                                            <center><p style="position: relative;left: 250px; font-size: 15px; font-style: italic;">(**Tick the courses that you want to add**)</p></center>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Core_Courses:</label>
                                            <div class="col-sm-10">
                                            <?php 
                                            $flag1=0;
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='CORE')
                                                { $flag1=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag1==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Flexi_Cores:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag2=0;
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='Flexi_CORE')
                                                { $flag2=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }

                                            if($flag2==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Bouquet_Cores:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag3=0;
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='Bouquet_CORE')
                                                { $flag3=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            } 
                                            if($flag3==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>  
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">It_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag4=0;
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='It_Elective')
                                                { $flag4=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            } 
                                            if($flag4==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Math_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php
                                            $flag5=0; 
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='Math_Elective')
                                                {
                                                    $flag5=1;
                                            echo'
                                            <div class="checkbox" style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag5==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            }  
                                            ?>
                                            </div>
                                        </div>
                                        <br>
                                         <div class="form-group">
                                            <label class="control-label col-sm-2" style="font-size: 17px;" for="text">Skill_Electives:</label>
                                            <div class="col-sm-10" >
                                            <?php 
                                            $flag=0;
                                            for($ii=0;$ii<$in1;$ii++)
                                            {
                                                if($type1[$ii]=='Skill_Elective')
                                                {
                                                    $flag=1;
                                            echo'
                                            <div class="checkbox"  style="position:relative; left: 135px; font-size: 16px; font-style: italic;">
                                                <label>
                                                    <input type="checkbox" name="cx1[]" style="height: 16px; width: 18px;" value="'.$course1[$ii].'">'.$course1[$ii].'**('.$credits1[$ii].'Credits)
                                                </label>
                                            </div><br>';
                                            
                                            }
                                            }
                                            if($flag==0)
                                            {
                                                echo '<center><p class="form-control-static">------------------</p></center>';
                                            } 
                                            ?>
                                            
                                            </div>
                                            </div>
                                            <br>
                                            <br>
                                        <button type="submit" name="log12" style="position:relative;left: 375px;" class="btn btn-default">Update</button>
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
