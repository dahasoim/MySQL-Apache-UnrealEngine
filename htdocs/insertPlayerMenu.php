<?php
  $host='localhost';
  $user='user';
  $pass='password';
  $db='database';
  $data=file_get_contents('php://input');
  $player=json_decode($data);

  $name=$player->name;
  $recipe=json_encode($player->recipe,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
  
  $conn = mysqli_connect($host,$user,$pass,$db);
  if ($conn->connect_error) {
    $arr["connection"] = false;
    return;
  }
  if($conn) {
    $arr["connection"] = true;
  }
 
  $sql = "INSERT INTO playersandwich (Name,Recipe) "."VALUES ('$name','$recipe')"."on duplicate key update Recipe='$recipe'";
  $inserted = mysqli_query($conn, $sql);
   mysqli_query($conn, "set session character_set_connection=utf8;");

  if ($inserted) {
    $arr['inserted'] = true;
  } else {
    $arr['inserted'] = false;
  }
  mysqli_close($conn);
  $jsonarr = json_encode($arr);
  echo $jsonarr;
?>
