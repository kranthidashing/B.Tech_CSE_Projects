<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student login</title>
        <link rel="stylesheet" href="css/style.css"> 
  </head>

  <body>

    <div class="login">
  <div class="heading">
    <h2>Student Login</h2>
    <form action="login.php" method="POST">
      <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" required="required" name="uname" class="form-control" placeholder="Username">
          </div>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" required="required" name="pass" class="form-control" placeholder="Password">
        </div>

        <button type="submit" name="log" class="float">Login</button>
       </form>
 		</div>
 </div>  
  </body>
</html>
