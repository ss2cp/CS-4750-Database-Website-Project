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

<?php include("./navbar.php");?>

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
        $id=$_POST['id'];
        $type1=$_POST['type1'];
        $type2=$_POST['type2'];
        $url=$_POST['url'];

        if ($errorMessage != "" ) {
            echo "<p class='message'>" .$errorMessage. "</p>" ;
        }
        else{
            $query = "INSERT INTO `cs4750s17csp9sm`.`pokemon` VALUES ('$id', '$name','$type1', '$type2','$url')";

            mysqli_query($link,$query);

            echo "<Legend>";
            echo "New Pokemon Created!";
            echo "</Legend>";
        }
    }
?>

</div>
</div>
</div>

</body>

</html>