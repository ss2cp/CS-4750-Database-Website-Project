<!--
Ketao Yin
CS 4750
dept_beauty.php
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DashShop - Beauty Department</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/shop-homepage.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

                <div class="row">
                    <?php

                        // echo "<h2>PHP is Fun!</h2>";
                        // echo "Hello world!<br>";
                        // echo "I'm about to learn PHP!<br>";
                        // echo "This ", "string ", "was ", "made ", "with multiple parameters.";

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

                        $query = "SELECT `nameGym`, `city`, `type`, `image` FROM `pokemon_gyms` 
                        #WHERE `dept_id` =  \"D00000\"";
                        $result = mysqli_query($conn, $query);

                        while ($row = $result->fetch_assoc()) {
                            $gymName = $row["nameGym"];
                            $city = $row["city"];
                            $type = $row["type"];
                            $imageURL = $row["image"];
                            #$productURL = "./product_page.php"."?product_id=".$row["name"];     // used to create product page

                            echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                                    <div class=\"thumbnail\">
                                        <img src=\"$imageURL\" alt=\"\" style=\"width: auto; height: 200px\" >
                                        <div class=\"text\">
                                            <h4>$gymName</h4>
                                        </div>
                                        <div class=\"caption\">
                                            <h4>City: $city</h4>
                                            <br>
                                            <h4>Type: $type</h4>
                                        </div>
                                    </div>
                                </div>";

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
