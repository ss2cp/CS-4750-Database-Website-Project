<!--
Ketao Yin
CS 4750
item_added.php
-->

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
    <?php include("./navbar.php");?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <?php
                    $cartID = "";
                    $productID = $_GET[product_id];
                    $quantity = "1";
                    $dateAdded = date("Y-m-d");

                    $username="pjw5za";
                    $password="4qHnaBJ2";
                    $database="pjw5za";
                    $mysqlserver="localhost";

                    // Create connection
                    $conn = mysqli_connect($mysqlserver,$username,$password,$database);

                    // Find session user's cart_id
                    $sessionUserName = $_SESSION['username'];
                    $cartQuery = "SELECT `cart_id` FROM `User` WHERE `login` = \"$sessionUserName\"";
                    $cartResult = mysqli_query($link, $cartQuery);
                    $cartID = $cartResult->fetch_assoc()["cart_id"];

                    // Check connection
                    if (mysqli_connect_errno())
                    {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }

                    $query = "INSERT INTO `pjw5za`.`Contains` VALUES ('$cartID', '$productID', '$quantity', '$dateAdded')";
                    $result = mysqli_query($conn, $query);

                    echo "<legend>Item Added!</legend>";
                    
                    $_SESSION['cartID'] = $cartID;
                ?>

            </div>
        </div>    
    </div>

</body>

</html>
