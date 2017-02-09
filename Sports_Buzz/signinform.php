<!DOCTYPE html>
 <html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>SportsBuzz Login</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body background="p.jpg">
        <div class="container">
            <header>
            <br><br><br>
               <h1><h1>SportsBuzz</h1></h1>
            </header>
            <section>				
                <div id="container_demo" > 
                   <div id="wrapper">
                         <div id="login" class="animate form">
                            <form  action="signin.php" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Email</label>
                                    <input id="username" name="uname" required="required" type="text" placeholder="usename"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Password</label>
                                    <input id="password" name="pass" required="required" type="password" placeholder="*******" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name="log" value="Login" /> 
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>