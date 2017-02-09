<?php
session_start();
include "dbConfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update</title>
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
                <center class="brand" style="position: absolute;left: 640px;font-size: 30px;"><font color="#00e6e6">FACULTY PANEL</font></center>
				<div class="nav-collapse collapse navbar-inverse-collapse">
					<ul class="nav pull-right">
						<li class="nav-user dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="images/user.png" class="nav-avatar" />
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Your Profile</a></li>
								<li class="divider"></li>
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
								<a href="activity.html">
									<i class="menu-icon icon-bullhorn"></i>
									News Feed
								</a>
							</li>
							<li>
								<a href="task.html">
									<i class="menu-icon icon-tasks"></i>
									Course Info
									
								</a>
							</li>
						</ul><!--/.widget-nav-->
						<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									More Pages
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="other-login.html">
											<i class="icon-inbox"></i>
											Login
										</a>
									</li>
									<li>
										<a href="other-user-profile.html">
											<i class="icon-inbox"></i>
											Profile
										</a>
									</li>
									<li>
										<a href="other-user-listing.html">
											<i class="icon-inbox"></i>
											All Users
										</a>
									</li>
								</ul>
							</li>
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
				<?php
				$f=$_SESSION['id'];;
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


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update Profile</h3>
							</div>
							<div class="module-body">

									<form class="form-horizontal row-fluid" action="test.php" method="POST">
									    <div class="control-group">
											<label class="control-label" for="basicinput">Full Name:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$Full_Name.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">User Name:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$U_name.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">User Email:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$U_email.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">User Role:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$U_category.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Gender:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$U_gender.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Phone.no:</label>
											<div class="controls">
												<?php echo '<p class="form-control-static" style="position:relative; top:5px;font-size: 17.5px;font-style: bold;font-style: italic;">'.$U_phone_no.'</p>'; ?>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Designation:</label>
											<div class="controls">
												<input type="text" name="des" id="basicinput" placeholder="Enter Your Qualification...." class="span8" required="required">
												<span class="help-inline">Minimum 10 Characters</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Age:</label>
											<div class="controls">
												<input type="number" name="age" id="basicinput" placeholder="Enter Your Age...." class="span8" required="required">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Date Of Birth:</label>
											<div class="controls">
												<input type="date" name="dob" id="basicinput" placeholder="Enter Your DOB...." class="span8" required="required">
											</div>
										</div>

										<div class="control-group">
										    <label style="position:relative; left:100px;font-size: 16px;font-style: bold;">Teaches:</label>
										    </br>
											<label class="control-label" for="basicinput">Course-1</label>
											<div class="controls">
												<select tabindex="1" name="c1" data-placeholder="Select here.." class="span8" required>
													<option value="">Select Course-1..</option>
													<?php
													$sql="select C_name from Course";
													$result = $conn->query($sql);
                                                    if ($result->num_rows > 0) 
                                                    {
                                                    while($row = $result->fetch_assoc()) 
                                                    {
                                                       echo '<option value="'.$row["C_name"].'">'.$row["C_name"].'</option>';

                                                    }
                                                    }
													?>
												</select>
											</div>
											</br>
											<label class="control-label" for="basicinput">Course-2</label>
											<div class="controls">
												<select tabindex="1" name="c2" data-placeholder="Select here.." class="span8">
													<option value="">Select Course-2..</option>
													<?php
													$sql="select C_name from Course";
													$result = $conn->query($sql);
                                                    if ($result->num_rows > 0) 
                                                    {
                                                    while($row = $result->fetch_assoc()) 
                                                    {
                                                       echo '<option value="'.$row["C_name"].'">'.$row["C_name"].'</option>';

                                                    }
                                                    }
													?>
												</select>
											</div>
											</br>
											<label class="control-label" for="basicinput">Course-3</label>
											<div class="controls">
												<select tabindex="1" name="c3" data-placeholder="Select here.." class="span8">
													<option value="">Select Course-3..</option>
													<?php
													$sql="select C_name from Course";
													$result = $conn->query($sql);
                                                    if ($result->num_rows > 0) 
                                                    {
                                                    while($row = $result->fetch_assoc()) 
                                                    {
                                                       echo '<option value="'.$row["C_name"].'">'.$row["C_name"].'</option>';

                                                    }
                                                    }
													?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button  type="submit" name="log" class="btn">Submit</button>
											</div>
										</div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
		</div>
	</div>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>