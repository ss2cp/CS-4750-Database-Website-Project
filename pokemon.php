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
      $.ajax({
            url: 'pokemonlist.php', 
            data: {pokemonlist: $( "#pnameinput" ).val()},
            success: function(data){
                $('#pnameresult').html(data);
    
            }
        }); 
       $( "#pnameinput" ).change(function() {
            if($('#pnameinput').is(':empty')){
                $.ajax({
                    url: 'searchPokemon.php', 
                    data: {searchPokemon: $( "#pnameinput" ).val()},
                    success: function(data){
                        $('#pnameresult').html(data);
            
                    }
                });
            }else{
              $.ajax({
                    url: 'pokemonlist.php', 
                    data: {pokemonlist: $( "#pnameinput" ).val()},
                    success: function(data){
                        $('#pnameresult').html(data);
            
                    }
                }); 
            }
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
                    

                </div>
            </div>
        </div>
    </div>

</body>

</html>
