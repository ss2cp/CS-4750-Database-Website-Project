<!-- delete from r -->
<?php
   session_start();
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

   $query3 = "SELECT MAX(id) FROM `pokemon`";
    $result = mysqli_query($link,  $query3);
    $row = mysqli_fetch_row($result);
    
    if(isset($_REQUEST['submit2']))
    {
        $errorMessage = "";
        // $name=$_POST['name'];
        $id=$_POST['Did'];
        // $type1=$_POST['type1'];
        // $type2=$_POST['type2'];
        // $url=$_POST['url'];

        if ($id > $row ) {
            if ($id!=$row) {
            echo "<p class='message'>" ."Please input VALID pokemon ID.". "</p>" ;
            }
            
            echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
        }

        else{
        	
	        $query = "DELETE FROM `cs4750s17csp9sm`.`pokemon` WHERE `id` =('$id')";

	        mysqli_query($link,$query);

	        echo "<Legend>";
	        echo "<p class='message'> HI this has been deleted ".$id. "</p>";
            echo "</Legend>";
        }
    }
?>

</div>
</div>
</div>

</body>

</html>