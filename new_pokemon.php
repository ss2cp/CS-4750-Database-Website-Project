<?php
   // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
 
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $query2= "SELECT MAX(id) FROM `pokemon`";
    $result = mysqli_query($link,  $query2);
    $row = mysqli_fetch_row($result);

    /* free result set */
    

    if(isset($_REQUEST['submit1']))

    {
        $errorMessage = "";
        $name=$_POST['name'];
        $id=$_POST['id'];
        $type1=$_POST['type1'];
        $type2=$_POST['type2'];
        $url=$_POST['url'];

        if($name == ""||$id == ""||$type1 == ""||$url == ""){
            if ($name == "" ) {
            echo "<p class='message'>" ."Please input pokemon name.". "</p>" ;
            }
            if ($id == "" ) {
            echo "<p class='message'>" ."Please input pokemon ID.". "</p>" ;
            }
            if ($id!=$row[0]+1) {
            echo "<p class='message'>" ."Please input VALID pokemon ID. It has to be $row[0]+1". "</p>" ;
            }
            if ($type1 == "" ) {
            echo "<p class='message'>" ."Please input at least one pokemon type.". "</p>" ;
            }
            if ($url == "" ) {
            echo "<p class='message'>" ."Please input pokemon image url to make it prettier.". "</p>" ;
            }
            
            echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
        }
        else{
            $query = "INSERT INTO `cs4750s17csp9sm`.`pokemon` VALUES ('$id', '$name','$type1', '$type2','$url')";

            mysqli_query($link,$query);

            echo "<Legend>";
            echo "New Pokemon Created!";
            echo "</Legend>";
        }
    }
    $result->close();

    mysqli_close($link);
?>

</div>
</div>
</div>

</body>

</html>