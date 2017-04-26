<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>DashShop Login Page</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      <!-- Navbar placeholder -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="">DASHSHOP</a>
           </div>
         <!-- /.navbar-collapse -->
         </div>
      <!-- /.container -->
      </nav>

      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">         
         <?php
            $msg = '';
            
            $username="cs4750s17csp9sm";
            $password="dataPro";
            $database="cs4750s17csp9sm";
            $mysqlserver="stardock.cs.virginia.edu";

            $link=mysqli_connect($mysqlserver,$username,$password,$database) or die("Failed to connect to server !!");

            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
				   $inputUserName = $_POST['username'];
               $inputPassword = $_POST['password'];

               $loginQuery = "SELECT `login`, `password` FROM `User_Credential` WHERE `login` = \"$inputUserName\"";
               $loginResult = mysqli_query($link, $loginQuery);
               $validPassword = $loginResult->fetch_assoc()["password"];

               if ($inputPassword == $validPassword) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $inputUserName;
                  
                  header("Location: ./index.php");
                  exit;

               }else {
                  $msg = 'Wrong username or password!';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form"
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>

         </form>

         <form action="./signup.php" target="_blank" action="">
            <button class = "btn btn-lg btn-primary btn-block">Sign Up</button>
         </form>

        </div>
      </div> 
      
   </body>
</html>