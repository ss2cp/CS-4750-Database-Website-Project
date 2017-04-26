<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    $query = "SELECT MAX(id) FROM `pokemon`";
    $result = mysqli_query($conn,  $query);
    $row = mysqli_fetch_row($result);

    /* free result set */
    $result->close();

    mysqli_close($conn);
?>
    <!-- Form -->
    <div class="container">
        <form class="form-horizontal" id="form_members" role="form" action="new_pokemon.php" method="POST">
            <legend>Pokemon Info</legend>
            <div class="form-group">
                <label for="name" class="col-sm-2">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Bulbasaur">
                </div>
                <label for="id" class="col-sm-2" >ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $row[0]+1?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="type1" class="col-sm-2">Type 1</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="type1" id="type1" placeholder="Fire">
                </div>
                <label for="type2" class="col-sm-2">Type 2</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="type2" id="type2" placeholder="Grass (or leave blank if N/A)">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-sm-2">Image URL</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="url" id="url" placeholder="image URL">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-warning" name="submit1" id="submit1">Submit</button>
                    
                </div>
            </div>
        </form>
        <form class="form-horizontal" id="form_members2" role="form" action="delete_pokemon.php" method="POST">
            <legend>Delete a Pokemon</legend>
            <label for="Did" class="col-sm-2">ID</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="Did" id="Did" placeholder="001" required>
            </div>
            <button type="submit" class="btn btn-warning" name="submit2" id="submit2">Submit</button>
        </form>
        <form class="form-horizontal" id="form_members3" role="form" action="modify_pokemon.php" method="POST">
            <legend>Modify Pokemon Info</legend>
            <div class="form-group">
                <label for="name3" class="col-sm-2">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name3" id="name3" placeholder="Bulbasaur">
                </div>
                <label for="id3" class="col-sm-2">ID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="id3" id="id3" placeholder="The last ID is <?php echo $row[0]?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="type13" class="col-sm-2">Type 1</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="type13" id="type13" placeholder="Fire">
                </div>
                <label for="type23" class="col-sm-2">Type 2</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="type23" id="type23" placeholder="Grass (or leave blank if N/A)">
                </div>

            </div>
            <div class="form-group">
                <label for="url3" class="col-sm-2">Image URL</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="url3" id="url3" placeholder="image URL">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-warning" name="submit3" id="submit3">Submit</button>
                    
                </div>
            </div>
        </form>
    </div>
</body>

</html>
