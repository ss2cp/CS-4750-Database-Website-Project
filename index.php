<!--
Ketao Yin
CS 4750
index.php
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PokemonDB</title>

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

        <!-- Portfolio Section -->
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <a href="./pokemon.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/pokemon.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_movies.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/types.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_home.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/pokeballs.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_electronics.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/gyms.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./potion.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/pokemondb.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_shoes.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/regions.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_computers.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/games.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_handmade.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/leaders.png" alt="" width="700" height="450">
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="./dept_cellphones.php">
                    <img class="img-responsive img-rounded" src="./assets/homepage/potions.png" alt="" width="700" height="450">
                </a>
            </div>
        </div>
    </div>

</body>

</html>
