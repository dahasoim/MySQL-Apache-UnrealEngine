<?php
  header('Content-type: application/json; charset=UTF-8');
  $host='localhost';
  $user='user';
  $pass='password';
  $db='database';
  $arr = array();

  $name=$_REQUEST["name"];

  $conn = mysqli_connect($host,$user,$pass,$db);
  if ($conn->connect_error) {
    $arr["connection"] = false;
    return;
  }
  if($conn) {
    $arr["connection"] = true;
  }

  $sql = "INSERT INTO playerdb (Name) "."VALUES ('$name')";
  mysqli_query($conn, "set session character_set_connection=utf8;");
  $inserted = mysqli_query($conn, $sql);

  if ($inserted) {
    $arr['inserted'] = true;
  } else {
    $arr['inserted'] = false;
  }
  mysqli_close($conn);
  $json = json_encode($arr);
  echo $json;
?>
