<?php
    session_start();
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">PokemonDB</a>
        </div>

    <?php
    if ($_SESSION['username']) {
        $username="cs4750s17csp9sm";
        $password="dataPro";
        $database="cs4750s17csp9sm";
        $mysqlserver="stardock.cs.virginia.edu";

        $link=mysqli_connect($mysqlserver,$username,$password,$database) or die("Failed to connect to server !!");

        // Find customer first name
        $sessionUserName = $_SESSION['username'];
        $nameQuery = "SELECT `username` FROM `pokemon_user` WHERE `username` = \"$sessionUserName\"";
        $nameResult = mysqli_query($link, $nameQuery);
        $name = $nameResult->fetch_assoc()["username"];
        $firstName = explode(" ", $name);
    ?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="">Hi, <?php echo $firstName[0]?></a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        <!-- </div> -->

<?php
        if ($firstName[0] == "admin") {
        echo"<ul class=\"nav navbar-nav navbar-right\">
                <li>
                    <a href=\"./admin.php\">ADMIN</a>
                </li>
            </ul>
        </div>";
        }else{
            echo"
        </div>";
        }

        ?>

    <?php }
    ?>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>