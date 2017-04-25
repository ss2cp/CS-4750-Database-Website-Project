<!--
Ketao Yin
CS 4750
checkout_complete.php
-->

<?php
    session_start();
?>

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
    <link href="./css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navbar -->
    <?php include("./navbar.php");?>

    <div class="container">
    <legend>Thank you for shopping with us!</legend>

    <div class="row" align="center" width="200px" height="100px">
        <form action="./index.php">
            <input type="submit" value="Homepage"/>
        </form>
    </div>

    <div class="row" align="center" width="200px" height="100px">
        <form action="./cart.php">
            <input type="submit" value="Cart"/>
        </form>
    </div>

    <!-- Clear cart and move into Order -->
    <?php
        $username="pjw5za";
        $password="4qHnaBJ2";
        $database="pjw5za";
        $mysqlserver="localhost";

        // Create connection
        $conn = mysqli_connect($mysqlserver,$username,$password,$database);

        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // Find session user's user_id
        $sessionUserName = $_SESSION['username'];
        $userQuery = "SELECT `user_id` FROM `User` WHERE `login` = \"$sessionUserName\"";
        $userResult = mysqli_query($link, $userQuery);
        $userID = $userResult->fetch_assoc()["user_id"];
        $cartID = $_SESSION['cartID'];

        $orderID = "";
        $orderDate = date("Y-m-d");
        $deliveryDate = "";
        $billingID = $_SESSION['billingID'];

        $query1 = "SELECT * FROM `Contains` WHERE `cart_id` = \"$cartID\"";
        $result = mysqli_query($conn, $query1);


        while ($row = $result->fetch_assoc()) {
            $productID = $row["product_id"];

            $countOrderQuery = "SELECT COUNT(`order_id`) FROM `Orders`";
            $countOrderResult = mysqli_query($link, $countOrderQuery);
            $orderCount = $countOrderResult->fetch_assoc()["COUNT(`order_id`)"];

            // Generate new orderID
            if ($orderCount >= "10000") {
                $orderID = "O" . ($orderCount);
            } elseif ($orderCount >= "1000") {
                $orderID = "O0" . ($orderCount);
            } elseif ($orderCount >= "100") {
                $orderID = "O00" . ($orderCount);
            } elseif ($orderCount >= "10") {
                $orderID = "O000" . ($orderCount);
            } else {
                $orderID = "O0000" . ($orderCount);
            }

            $query2 = "INSERT INTO `Orders` VALUES ('$orderID', '$orderDate', '$deliveryDate', '$userID', '$billingID', '$productID')";
            mysqli_query($conn, $query2);
        }

        $query3 = "DELETE FROM `Contains` WHERE `cart_id` = \"$cartID\"";
        mysqli_query($conn, $query3);


        // Process SQL request needed from page before, if necessary
        if ($_POST['streetNum'] && $_POST['streetName']) {
            $addressID = "";
            $country = "USA";
            $state = $_POST['state'];
            $city = $_POST['city'];
            $streetName = $_POST['streetName'];
            $streetNum = $_POST['streetNum'];
            $zipCode = $_POST['zipcode'];

            $countAddressQuery = "SELECT COUNT(`address_id`) FROM `Address`";
            $countAddressResult = mysqli_query($link, $countAddressQuery);
            $addressCount = $countAddressResult->fetch_assoc()["COUNT(`address_id`)"];

            // Generate new addressID
            if ($addressCount >= "10000") {
                $addressID = "A" . ($addressCount);
            } elseif ($addressCount >= "1000") {
                $addressID = "A0" . ($addressCount);
            } elseif ($addressCount >= "100") {
                $addressID = "A00" . ($addressCount);
            } elseif ($addressCount >= "10") {
                $addressID = "A000" . ($addressCount);
            } else {
                $addressID = "A0000" . ($addressCount);
            }

            $query = "INSERT INTO `pjw5za`.`Address` VALUES ('$addressID', '$country', '$state', '$city', '$streetName', '$streetNum', '$zipCode', '$userID')";
            mysqli_query($link,$query);
        }

    ?>

</body>

</html>
