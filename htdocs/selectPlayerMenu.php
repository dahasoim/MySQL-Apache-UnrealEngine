<?php
 header('Content-type: application/json; charset=UTF-8');
 $name = $_REQUEST["name"];
 $host='localhost';
 $user='user';
 $pass='password';
 $db='database';

 $conn = mysqli_connect($host,$user,$pass,$db);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $select_query = "SELECT Recipe FROM playersandwich where Name='$name' ";
  mysqli_query($conn, "set session character_set_connection=utf8;");
  $result_set = mysqli_query($conn, $select_query);

  if (mysqli_num_rows($result_set) > 0) {
    while($row = mysqli_fetch_assoc($result_set)) {
         $result=$row;
    }
  } else {
    echo "no Data";
  }
  mysqli_close($conn);

  $json = json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
  echo $json;
?>
