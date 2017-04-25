<!--
Ketao Yin
CS 4750
product_page.php
-->

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
                        $productID = $_GET[product_id];

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

                        $query = "SELECT * FROM `Product` WHERE `product_id` =  \"$productID\"";
                        $result = mysqli_query($conn, $query);

                        while ($row = $result->fetch_assoc()) {
                            $productName = $row["product_name"];
                            $imageURL = $row["image_URL"];
                            $price = $row["price"];
                            $productDescription = $row["product_description"];
                            $weight = $row["weight"];
                            $modelNumber = $row["model_number"];
                            $dimension = $row["dimension"];
                            $stock = $row["stock"];
                            $swiftEligibility = $row["swift_eligibility"];
                            
                        echo "<div class=\"thumbnail\">
                                <img src=\"$imageURL\" alt=\"\" style=\"width: auto; max-height: 400px\" >
                                <div class=\"caption-full\">
                                    <h4 class=\"pull-right\">\$$price</h4>
                                    <h4><a href=\"#\">$productName</a>
                                    </h4>
                                    <p>$productDescription</p>
                                    <p>Swift Eligible: $swiftEligibility</p>
                                    <p>Weight: $weight</p>
                                    <p>Model Number: $modelNumber</p>
                                    <p>Product Dimension: $dimension</p>
                                    <p>Available Stock: $stock</p>
                                </div>
                            </div>";
                        }

                        /* free result set */
                        $result->close();

                        mysqli_close($conn);
                    
                        // Add to Cart button
                        echo "<div class=\"row\" align=\"center\" width=\"200px\" height=\"100px\">
                                <form action=\"./item_added.php\">
                                    <input type=\"hidden\" id=\"product_id\" name=\"product_id\" value=\"$productID\"/>
                                    <input type=\"submit\" value=\"Add to Cart\"/>
                                </form>
                            </div>

                            <hr>";
                    
                    ?>  
                    
                    <div class="well">
                    
                    <legend>Product Reviews</legend>

                    <?php
                        $productID = $_GET[product_id];

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

                        $query = "SELECT * FROM `Product_Review` WHERE `product_id` =  \"$productID\"";
                        $result = mysqli_query($conn, $query);

                        while ($row = $result->fetch_assoc()) {
                            $dashRating = $row["dash_rating"];
                            $text = $row["text"];
                            $date = $row["date"];
                            $userID = $row["user_id"];

                            $query = "SELECT `name` FROM `User` WHERE `user_id` =  \"$userID\"";
                            $output = mysqli_query($conn, $query);
                            $userName = $output->fetch_assoc()["name"];

                            echo "<div class=\"row\">
                                    <div class=\"col-md-12\">
                                        <p>$userName</p>
                                        <span class=\"pull-right\">$date</span>
                                        <p>$dashRating / 5 would recommend.</p>
                                        <p>$text</p>
                                    </div>
                                </div>
                                <hr>";
                        }

                        /* free result set */
                        $result->close();

                        mysqli_close($conn);
                    ?>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
