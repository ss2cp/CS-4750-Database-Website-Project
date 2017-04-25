<!--
Ketao Yin
CS 4750
checkout_shipping.php
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
    <legend>Shipping Information</legend>
    <h4>Saved shipping address:</h4>

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

        // Saved address info
        $query = "SELECT * FROM `Address` WHERE `user_id` =  \"$userID\"";
        $result = mysqli_query($conn, $query);

        echo "<form method=\"post\" action=\"./checkout_complete.php\">";
        while ($row = $result->fetch_assoc()) {
            $country = $row["country"];
            $state = $row["state_province"];
            $city = $row["city"];
            $streetName = $row["street_name"];
            $streetNum = $row["street_number"];
            $zipCode = $row["zip_code"];

            echo "<input type=\"radio\" name=\"addressSelection\">$streetNum $streetName, $city, $state $zipCode<br>";
        }
        echo "<hr>";

        // Placeholder form
        echo "<h4>Enter new shipping information:</h4>
        <div class=\"form-group\">
            <label for=\"streetNum\" class=\"col-sm-2\">Street Number</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"streetNum\" id=\"streetNum\" placeholder=\"123\">
            </div>
            <label for=\"streetName\" class=\"col-sm-2\">Street Name</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"streetName\" id=\"streetName\" placeholder=\"Main Street\">
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"city\" class=\"col-sm-2\">City</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"city\" id=\"city\" placeholder=\"New York\">
            </div>
            <label for=\"state\" class=\"col-sm-2\">State</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"state\" id=\"state\" placeholder=\"NY\">
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"zipcode\" class=\"col-sm-2\">ZIP Code</label>
            <div class=\"col-sm-4\">
                <input type=\"text\" class=\"form-control\" name=\"zipcode\" id=\"zipcode\" placeholder=\"10001\">
            </div>
        </div>";

        // Continue button
        echo "<div class=\"row\" align=\"center\" width=\"200px\" height=\"100px\">
                <input type=\"submit\" value=\"Submit\"/>
            </div>
            </form>";
    
        // Process SQL request needed from page before, if necessary
        if ($_POST['ccNum'] && $_POST['cvv']) {
            $billingID = "";
            $ccNum = $_POST['ccNum'];
            $cvv = $_POST['cvv'];
            $expirationDate = $_POST['expirationDate'];
            $addressID = "";

            $addressQuery = "SELECT `address_id` FROM `Address` WHERE `user_id` =  \"$userID\"";
            $addressResult = mysqli_query($conn, $addressQuery);
            $addressID = $addressResult->fetch_assoc()["address_id"];

            $countBillingQuery = "SELECT COUNT(`billing_id`) FROM `Billing`";
            $countBillingResult = mysqli_query($link, $countBillingQuery);
            $billingCount = $countBillingResult->fetch_assoc()["COUNT(`billing_id`)"];

            // Generate new billingID
            if ($billingCount >= "10000") {
                $billingID = "B" . ($billingCount);
            } elseif ($billingCount >= "1000") {
                $billingID = "B0" . ($billingCount);
            } elseif ($billingCount >= "100") {
                $billingID = "B00" . ($billingCount);
            } elseif ($billingCount >= "10") {
                $billingID = "B000" . ($billingCount);
            } else {
                $billingID = "B0000" . ($billingCount);
            }

            $query = "INSERT INTO `pjw5za`.`Billing` VALUES ('$billingID', '$ccNum', '$cvv', '$expirationDate', '$addressID')";
            mysqli_query($link,$query);

            $_SESSION['billingID'] = $billingID;
        }
    ?>

</body>

</html>
