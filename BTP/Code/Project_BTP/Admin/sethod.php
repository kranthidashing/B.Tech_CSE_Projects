<?php
session_start();
include "dbConfig.php";
?>  
<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Set Hod</title>
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

               <?php echo '<a class="brand"><font color="Aquamarine">Welcome.....'.$_SESSION['User'].'</font></a>'; ?>
                <center class="brand" style="position: absolute;left: 640px;font-size: 30px;"><font color="#00e6e6">ADMIN PANEL</font></center>
				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
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
								<a href="#">
									<i class="menu-icon icon-bullhorn"></i>
									News Feed
								</a>
							</li>
							<li><a href="studentable.php"><i class="menu-icon icon-user"></i>Student Info</a></li>
                                <li><a href="facultytable.php"><i class="menu-icon icon-group"></i>Faculty Info</a></li>
                                <li><a href="hodtable.php"><i class="menu-icon icon-group"></i>HOD's Info</a></li>
                            </ul>
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
								<h3>Set HOD Form</h3>
							</div>
							<div class="module-body">
									<form class="form-horizontal row-fluid" action="sethod1.php" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">Select Details</label>
											<div class="controls">
						                    <select tabindex="1" name="c1" data-placeholder="Select here.." class="span8">
						                    <br>
											<option value="">Select HOD Name..</option>
											<?php
													$sql="SELECT User.F_name,User.L_name,Faculty.F_id FROM Faculty,User WHERE User.U_id=Faculty.U_id";
													$result = $conn->query($sql);
                                                    if ($result->num_rows > 0) 
                                                    {
                                                    while($row = $result->fetch_assoc()) 
                                                    {
                                                       echo '<option value="'.$row["F_id"].'">'.$row["F_name"].' '.$row["L_name"].'</option>';

                                                    }
                                                    }
													?>
											</select>
											</div>
											<br>
											<div class="controls">
						                    <select tabindex="1" name="c2" data-placeholder="Select here.." class="span8">
											<option value="">Select Department..</option>
											<option value="1">Computer & Science Engneering</option>
											<option value="2">Electronic & Communication Engneering</option>
											</select>
											</div>
											<br>
											<div class="controls">
						                    <select tabindex="1" name="c3" data-placeholder="Select here.." class="span8">
											<option value="">Select Sem.no..</option>
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
										<div class="control-group">
											<div class="controls">
												<button type="submit" style="position: relative; left:170px;" name="submit1" class="btn">Submit</button>
											</div>
										</div>
									</form>
							</div>
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
</body> </html>