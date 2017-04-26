<?php
  require "dbutil.php";
  $db = DbUtil::loginConnection();
  
  $stmt = $db->stmt_init();
  if($stmt->prepare("select `id`, `name`, `image`, `type1`,`type2`,`strength` from `pokemon` inner join `pokemon_type_strength` ON (nameType = type1) where `name` like ? GROUP BY 1") or die(mysqli_error($db))) {
    $searchString = '%' . $_GET['searchPokemon'] . '%';
    $stmt->bind_param(s, $searchString);
    $stmt->execute();
    $stmt->bind_result($id, $name, $image, $type1,$type2,$strength);
    echo "<table border=1><th>ID</th><th>Name</th><th>Type1</th><th>Type2</th><th>Image</th><th>Strength</th>\n";
    while($stmt->fetch()) {
      echo "<tr><td>$id</td><td>$name</td><td>$type1</td><td>$type2</td><td>$image</td><td>$strength</td></tr>";
    }
    echo "</table>";
  
    $stmt->close();
  }
  
  $db->close();
?>