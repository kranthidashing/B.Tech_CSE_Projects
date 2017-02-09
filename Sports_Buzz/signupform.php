<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    <!--    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" /> -->
    </head>
    <body>
        <div class="container">
            <header>
                <h1>SportsBuzz</h1>
            </header>
            <section>               
                <div id="container_demo" >
                    <div id="wrapper">
                       <div id="login" class="animate form">
                            <form  action="signup.php" method="POST"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Firstname</label>
                                    <input id="usernamesignup" name="Fname" required="required" type="text" placeholder="firstname" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Lastname</label>
                                    <input id="usernamesignup" name="Lname" required="required" type="text" placeholder="lastname" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Username</label>
                                    <input id="usernamesignup" name="uname" required="required" type="text" placeholder="username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" >Email</label>
                                    <input id="emailsignup" name="ename" required="required" type="email" placeholder="email"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Password </label>
                                    <input id="passwordsignup" name="pass" required="required" type="password" placeholder="******"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="******"/>
                                </p>
                                <p class="signin button"> 
                                <br><br>
                                    <input type="submit" name="submit" value="Sign up"/> 
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>