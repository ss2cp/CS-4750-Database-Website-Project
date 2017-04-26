<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-color: #BDC3C7;
        }
    </style>
</head>
<body>
<!-- Navbar -->
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
           <a class="navbar-brand" href="./index.php">PokemonDB</a>
       </div>
     <!-- /.navbar-collapse -->
     </div>
    <!-- /.container -->
    </nav>

<div class="container">
<div class="row">
<div class="col-md-9">

<?php
    $username="cs4750s17csp9sm";
    $password="dataPro";
    $database="cs4750s17csp9sm";
    $mysqlserver="stardock.cs.virginia.edu";

    $link=mysqli_connect($mysqlserver,$username,$password,$database) or die("Failed to connect to server !!");

    if(isset($_REQUEST['submit']))
    {
        $errorMessage = "";
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        $email=$_POST['email'];
        $phoneNum=$_POST['phoneNum'];

        $streetNum=$_POST['streetNum'];
        $streetName=$_POST['streetName'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zipcode=$_POST['zipcode'];
        
        $userName=$_POST['userName'];
        $password=$_POST['password'];

        if ($errorMessage != "" ) {
            echo "<p class='message'>" .$errorMessage. "</p>" ;
        }
        else{
            // $query1 = "INSERT INTO `cs4750s17csp9sm`.`User` VALUES ('$userID', '$cartID', '', '', '$name', '$dob', '$email', '$phoneNum', '$userName')";
            // $query2 = "INSERT INTO `cs4750s17csp9sm`.`Cart` VALUES ('$cartID', '$userID')";
            // $query3 = "INSERT INTO `cs4750s17csp9sm`.`Address` VALUES ('$addrID', 'USA', '$state', '$city', '$streetName', '$streetNum', '$zipcode', '$userID')";
            $query4 = "INSERT INTO `cs4750s17csp9sm`.`pokemon_user` VALUES ('$userName', '$password')";

            // mysqli_query($link,$query1);
            // mysqli_query($link,$query2);
            // mysqli_query($link,$query3);
            mysqli_query($link,$query4);

            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $userName;

            echo "<Legend>";
            echo "New User Created!";
            echo "</Legend>";
        }
    }
?>

</div>
</div>
</div>

</body>

</html>