<!--
Ketao Yin
CS 4750
checkout_billing.php
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
    <legend>Billing Information</legend>
    <h4>Saved billing methods:</h4>

    <?php
        $userID = "";

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
        
        $query = "SELECT a . * FROM  `Billing` a INNER JOIN  `Address` b ON a.`address_id` = b.`address_id` AND b.`user_id` =  \"$userID\"";
        $result = mysqli_query($conn, $query);

        // Saved billing info
        echo "<form method=\"post\" action=\"./checkout_shipping.php\">";
        while ($row = $result->fetch_assoc()) {
            $ccNum = $row["credit_number"];
            echo "<input type=\"radio\" name=\"ccNumSelection\">$ccNum<br>";
        }
        echo "<hr>";

        // Placeholder form
        echo "<h4>Enter new billing information:</h4>
        <div class=\"form-group\">
            <label for=\"ccNum\" class=\"col-sm-2\">Credit Card Number</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"ccNum\" id=\"ccNum\" placeholder=\"1234567890123456\">
            </div>
            <label for=\"cvv\" class=\"col-sm-2\">CVV</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"cvv\" id=\"cvv\" placeholder=\"123\">
            </div>
            <label for=\"expirationDate\" class=\"col-sm-2\">Expiration Date</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"expirationDate\" id=\"expirationDate\" placeholder=\"MMYY\">
            </div>
        </div>

        <div class=\"row\" align=\"center\" width=\"200px\" height=\"100px\">
            <input type=\"submit\" value=\"Continue\"/>
        </div>
        </form>";
    ?>

</body>

</html>
