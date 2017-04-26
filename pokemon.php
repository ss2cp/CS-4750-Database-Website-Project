<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PokemonDB - Pokemons</title>

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
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script> 
    <script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>

   <script>
   $(document).ready(function() {
       $( "#pnameinput" ).change(function() {
      
            $.ajax({
                url: 'searchPokemon.php', 
                data: {searchPokemon: $( "#pnameinput" ).val()},
                success: function(data){
                    $('#pnameresult').html(data);
        
                }
             });
         });
       
     });
</script>
</head>

<body>

    <!-- Navbar -->
    <?php include("./navbar.php");?>

  <!-- Page Content -->
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">

                <div class="row">
                    <input class="xlarge" id="pnameinput" type="search" size="30" placeholder="Pokemon Name Contains"/>

                    <div id="pnameresult">Search Result</div>
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

                        $query = "SELECT `id`, `name`, `image`, `type1`,`type2`,`strength` FROM `pokemon` INNER JOIN `pokemon_type_strength` ON (nameType = type1) GROUP BY 1";
                        $result = mysqli_query($conn, $query);



                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $id = $row["id"];
                            $imageURL = $row["image"];
                            $type1 = $row["type1"];
                            $type2 = $row["type2"];
                            $strength1 = $row["strength"];
                         
                            // $productURL = "./product_page.php"."?product_id=".$row["name"];     // used to create product page

                            echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                                    <div class=\"thumbnail\">
                                        <img src=\"$imageURL\" alt=\"$name\" style=\"width: auto; max-height: 200px\" >
                                        <div class=\"text\">
                                            <h3>$id - $name</h3>
                                        </div>
                                        <div class=\"caption\">
                                            <h4 class=\"pull-left\">Type: <a href=\"type.php\"> $type1 $type2 </a><br/><br/>Strength: $strength1<br/>Weakness: </h4>
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
