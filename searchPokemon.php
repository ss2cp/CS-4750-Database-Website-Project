<?php
  require "dbutil.php";
  $db = DbUtil::loginConnection();
  
  $stmt = $db->stmt_init();
  if($stmt->prepare("SELECT 
                        p.id,
                        p.name,
                        p.image,
                        p.type1,
                        p.type2,
                        ps.strength,
                        pw.weakness,
                        pe.after_id
                        FROM pokemon AS p
                        LEFT OUTER JOIN pokemon_type_strength AS ps ON p.type1 = ps.nameType 
                        LEFT OUTER JOIN pokemon_type_weakness AS pw on p.type1 = pw.nameType
                        LEFT OUTER JOIN pokemon_evolution as pe on p.id = pe.before_id
                        where `name` like ? GROUP BY p.id") or die(mysqli_error($db))) {
    $searchString = '%' . $_GET['searchPokemon'] . '%';
    $s="";
    $stmt->bind_param('s', $searchString);
    $stmt->execute();
    $stmt->bind_result($id, $name, $image, $type1,$type2,$strength,$weakness, $evolution);
    // echo "<table border=1><th>ID</th><th>Name</th><th>Type1</th><th>Type2</th><th>Image</th><th>Strength</th>\n";
    while($stmt->fetch()) {
      // echo "<tr><td>$id</td><td>$name</td><td>$type1</td><td>$type2</td><td>$image</td><td>$strength</td></tr>";
    	echo "<div class=\"col-sm-4 col-lg-4 col-md-4\">
                    <div class=\"thumbnail\">
                        <img src=\"$image\" alt=\"$name\" style=\"width: auto; height: 200px\" >
                        <div class=\"text\">
                            <h3>$id - $name</h3>
                        </div>
                        <div class=\"caption\">
                            <h4 class=\"pull-left\">Type: <a href=\"type.php\"> $type1 $type2 </a><br/><br/>Strength: $strength
                                <br/>Weakness: $weakness
                                <br/>Next Evolution ID: $evolution
                            </h4>
                        </div>
                    </div>
                </div>";
    }
    // echo "</table>";
  
    $stmt->close();
  }
  
  $db->close();
?>

