<?php
session_start();
include "dbConfig.php";
?>  
<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add User</title>
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
								<h3>Add User Form</h3>
							</div>
							<div class="module-body">
									<form class="form-horizontal row-fluid" action="test.php" method="POST">
										<div class="control-group">
											<label class="control-label" for="basicinput">First Name</label>
											<div class="controls">
												<input type="text" name="fname" required="required" id="basicinput" placeholder="Type something here..." class="span8">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Last Name</label>
											<div class="controls">
												<input type="text" name="lname" required="required" id="basicinput" placeholder="Type something here..." class="span8">
												<span class="help-inline">Minimum 5 Characters</span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">User Name</label>
											<div class="controls">
												<input type="text" name="uname" required="required" id="basicinput" placeholder="Type something here..." class="span8">
												<span class="help-inline">Minimum 8 Characters</span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">User Gender</label>
											<div class="controls">
												<select tabindex="1" name="ugender" data-placeholder="Select here.." class="span8">
													<option value="">Select here..</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">User Email</label>
											<div class="controls">
												<input type="email" name="uemail" required="required" id="basicinput" placeholder="xyz@email.com" class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">User Password</label>
											<div class="controls">
												<input type="password" name="upass" required="required" id="basicinput" placeholder="**********" class="span8">
												<span class="help-inline">Minimum 8 Characters</span>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">User Phone.no</label>
											<div class="controls">
												<input type="tel" name="uph" required="required"  id="basicinput" placeholder="9*********" class="span8">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label">User Role</label>
											<div class="controls">
												<label class="radio">
													<input type="radio" name="urole" id="optionsRadios1" value="Student" checked="">
													Student
												</label> 
												<label class="radio">
													<input type="radio" name="urole" id="optionsRadios2" value="Faculty">
													Faculty
												</label> 
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Submit Form</button>
											</div>
										</div>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
				</div>
			<center class="brand" style="position: absolute;left: 750px;font-size: 30px;">OR</center></br></br>
			<div class="span9">
					<div class="content" style="position: relative;left: 270px;"">

						<div class="module">
							<div class="module-head">
								<h3>Upload User File</h3>
							</div>
							<div class="module-body">
									<form class="form-horizontal row-fluid" action="csv.php" method="POST">
									select file to upload: <input type="file" class="btn" name="file">
					                <button type="submit" value="Upload" name="submit" class="btn" style="position: absolute;left: 500px;">Upload</button>
									</form>
							</div>
						</div>
					</div><!--/.content-->
				</div><!--/.span9-->
		    </div><!--/.container-->
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