<?php
  require "dbutil.php";
  $db = DbUtil::loginConnection();
  
  $stmt = $db->stmt_init();
  
  if($stmt->prepare("select * from `pokemon` where `name` like ?") or die(mysqli_error($db))) {
    $searchString = '%' . $_GET['searchPokemon'] . '%';
    $stmt->bind_param(s, $searchString);
    $stmt->execute();
    $stmt->bind_result($id, $name, $type1,$type2,$image);
    echo "<table border=1><th>ID</th><th>Name</th><th>Type1</th><th>Type2</th><th>Image</th>\n";
    while($stmt->fetch()) {
      echo "<tr><td>$id</td><td>$name</td><td>$type1</td><td>$type2</td><td>$image</td></tr>";
    }
    echo "</table>";
  
    $stmt->close();
  }
  
  $db->close();
?>