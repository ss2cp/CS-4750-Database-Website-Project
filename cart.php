<!--
Ketao Yin
CS 4750
cart.php
-->

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
        <legend>Shopping Cart</legend>
        
        <!-- SQL Test -->
        <?php

            $username="cs4750s17csp9sm";
            $password="dataPro";
            $database="cs4750s17csp9sm";
            $mysqlserver="stardock.cs.virginia.edu";

            // Create connection
            $conn = mysqli_connect($mysqlserver,$username,$password,$database);

            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $query = "SELECT b.`product_id`, b.`product_name`, b.`price`, a.`quantity` FROM  `Contains` a INNER JOIN  `Product` b ON a.`product_id` = b.`product_id` AND `cart_id` = \"C00100\"";
            $result = mysqli_query($conn, $query);
            $cartPrice = 0;

            while ($row = $result->fetch_assoc()) {
                $productID = $row["product_id"];
                $productName = $row["product_name"];
                $price = $row["price"];
                $quantity = $row["quantity"];
                $itemTotalPrice = $price * $quantity;
                $cartPrice += $itemTotalPrice;

                echo "<div class=\"col-md-9\">
                    <h5>$productName</h5>
                    <p>Quantity: $quantity</p>
                    <p>Price: \$$itemTotalPrice</p>
                </div>";

            }

            /* free result set */
            $result->close();

            mysqli_close($conn);

            echo "<div class=\"col-md-9\">
                    <h4>Total Price: \$$cartPrice</h5>
                </div>";

            // Checkout button
            echo "<div class=\"row\" align=\"center\" width=\"200px\" height=\"100px\">
                    <form action=\"./checkout_billing.php\">
                        <input type=\"submit\" value=\"Checkout Now\"/>
                    </form>
                </div>";
        ?>

    </div>
</body>

</html>
