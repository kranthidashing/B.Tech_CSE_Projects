<?php
session_start();
include "dbConfig.php";
if(isset($_POST["cr1"]))
{
$course=$_POST["cr1"];
   //$course=5001;
}
$ses=null;
if(isset($_POST["sub"]))
{
	//$course=5001;
$course=$_POST["sub"];
$ses=$_POST["session"];
}
$flag=0;
if(!empty($ses))
{
$sql="select C_id,Session_date from Session where C_id='$course' and Session_date='$ses'";
$count=mysqli_num_rows($conn->query($sql));
if($count==0)
{
   $flag=1;
   $conn->query("insert into Session(C_id,Session_date) values('".$course."','".$ses."')");	
}
else
{
	$flag=2;
}
}
$sql="select C_name from Course where C_id='$course'";
$row=mysqli_fetch_row($conn->query($sql));
$coursename=$row[0];
$array = array("id"=>"$course","session"=>"$ses");
$str = serialize($array);
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Course</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

               <?php echo '<a class="brand"><font color="Aquamarine">Welcome.....'.$_SESSION['uname'].'</font></a>'; ?>
                <center class="brand" style="position: absolute;left: 640px;font-size: 30px;"><font color="#00e6e6">FACUTLY PANEL</font></center>
				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="#">Edit Profile</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="sidebar">

						<ul class="widget widget-menu unstyled">
							<li class="active">
								<a href="main.php">
									<i class="menu-icon icon-dashboard"></i>
									Dashboard
								</a>
							</li>
							<li>
								<a href="activity.html">
									<i class="menu-icon icon-bullhorn"></i>
									News Feed
								</a>
							</li>
							<li>
								<a href="message.html">
									<i class="menu-icon icon-user"></i>
									Student Info
									
								</a>
							</li>
							
							<li>
								<a href="task.html">
									<i class="menu-icon icon-group"></i>
									Faculty Info
									
								</a>
							</li>
						</ul><!--/.widget-nav-->
						<ul class="widget widget-menu unstyled">
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Enter Session Details</h3>
							</div>
							<div class="module-body">
									<form class="form-horizontal row-fluid" action="attendences.php" method="POST">

										<div class="control-group">
										    <?php
										    if($flag==0 || $flag==1)
										    {
										       echo '<label class="control-label" for="basicinput">Session_datetime:</label>';
										    }
											
											if($flag==0)
											{
									    echo '<div class="controls">
												<input type="datetime-local" name="session" required="required"  id="basicinput" class="span8">
											</div>';
										     }
										     if($flag==1)
											{
									    echo '<div class="controls">
												<p class="form-control-static" style="position:relative; top:5px;font-size: 16px;font-style: bold;font-style: italic;">'.$ses.'</p>
											</div>';
										     }
										     if($flag==2)
											{
									    echo '<center><p class="form-control-static" style="position:relative; top:5px;font-size: 16px;font-style: bold;font-style: italic;">Session_Attendence_over</p></center>';
										     }
											?>
										</div>
										<?php
                                        if($flag==0)
                                        {
										echo '<div class="control-group">
											<div class="controls">
												<button type="submit" name="sub" class="btn" value="'.$course.'">Submit</button>
											</div>
										</div>';} ?>
									</form>
								</div>
							</div>
							<br>
							<?php
							 if($flag==1) { ?>
							<div class="module">
                                <div class="module-head">
                                   <?php echo '<h3>Course:'.' '.$coursename.'</h3>'; ?>
                                </div>
                                <div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Student_Name
                                                </th>
                                                <th>
                                                    Student_Rollno
                                                </th>
                                                <th>
                                                    Student_Semester
                                                </th>
                                                <th>
                                                    Student_Department
                                                </th>
                                                <th>
                                                    MARK_IF_ABSENT
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $c11=array();
                                        $c11[0]=$course;
                                        $c11[1]=$ses;
                                        $sql11 = "SELECT Student.S_id,User.F_name,User.L_name,Student.S_rollno,Semester.Sem_no,Department.D_name FROM Enrolls,Student,User,Semester,Department,Belongs,Studying WHERE Enrolls.C_id='$course' AND Enrolls.S_id=Student.S_id AND Student.U_id=User.U_id AND Student.S_id=Studying.S_id AND Studying.Sem_id=Semester.Sem_id AND Student.S_id=Belongs.S_id  AND Belongs.D_id=Department.D_id";
                                        $result = $conn->query($sql11);
                                        $counter=mysqli_num_rows($conn->query($sql11));
                                        if($counter==0)
                                        {
                                        	$conn->query("DELETE FROM Session WHERE C_id='$course' AND Session_date='$ses'");
                                        }
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                      echo '<tbody>
                                            <tr class="odd gradeX">
                                                <td class="center" >'.
                                                       $row["F_name"].' '.$row["L_name"].'
                                                </td>
                                                <td><center>'.
                                                    $row["S_rollno"].'</center>
                                                </td>
                                                <td><center>'.
                                                    $row["Sem_no"].'</center>
                                                </td>
                                                <td>'.
                                                    $row["D_name"].'
                                                </td>
                                                <td>
                                                    <form action="lastupdate.php" method="POST">
                                                    <center><input type="checkbox" name="cx[]" style="height: 16px; width: 18px;" value="'.$row["S_id"].'"></center>
                                                    
                                                </td>
                                            </tr>';
                                        }}
                                               ?>
                                    </table>
                                    
                                </div>
                                <div class="control-group">
								<div class="controls">
							<center><button type="submit" name="attend" class="btn" <?php if ($counter==0){ ?> disabled <?php   } ?> <?php echo 'value='.$str  ?>  >Submit</button></center>
								</div>
							    </div>
							    </form>
                            </div>
                            <?php } ?>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
				</div>
	    </div><!--/.wrapper-->
	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2016 Admin_StudentsPortal</b>All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body></html>