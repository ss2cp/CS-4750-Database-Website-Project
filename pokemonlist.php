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
                        //$query = "SELECT `id`, `name`, `image`, `type1`,`type2`,`strength` FROM `pokemon` INNER JOIN `pokemon_type_strength` ON (nameType = type1) GROUP BY 1";
                        $query = "
                        SELECT 
                        p.id,
                        p.name,
                        p.image,
                        p.type1,
                        p.type2,
                        ps.strength,
                        pw.weakness
                        FROM pokemon AS p
                        INNER JOIN pokemon_type_strength AS ps ON p.type1 = ps.nameType 
                        INNER JOIN pokemon_type_weakness AS pw on p.type1 = pw.nameType
                        WHERE p.id IN (
                            SELECT before_id
                            FROM pokemon_evolution
                            )
                         GROUP BY p.id";
                        $result = mysqli_query($conn, $query);
                        



                        while ($row = $result->fetch_assoc()) {
                            $name = $row["name"];
                            $id = $row["id"];
                            $imageURL = $row["image"];
                            $type1 = $row["type1"];
                            $type2 = $row["type2"];
                            $strength1 = $row["strength"];
                            $weakness1 = $row["weakness"];
                            $evolution = $row["after_id"];
                         
                            // $productURL = "./product_page.php"."?product_id=".$row["name"];     // used to create product page

                            echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                                    <div class=\"thumbnail\">
                                        <img src=\"$imageURL\" alt=\"$name\" style=\"width: auto; height: 200px\" >
                                        <div class=\"text\">
                                            <h3>$id - $name</h3>
                                        </div>
                                        <div class=\"caption\">
                                            <h4 class=\"pull-left\">Type: <a href=\"type.php\"> $type1 $type2 </a><br/><br/>Strength: $strength1
                                                <br/>Weakness: $weakness1 
                                                <br/>Next Evolution ID: $evolution
                                            </h4>
                                        </div>
                                    </div>
                                </div>";

                        }

                        /* free result set */
                        $result->close();

                        mysqli_close($conn);
                    ?>