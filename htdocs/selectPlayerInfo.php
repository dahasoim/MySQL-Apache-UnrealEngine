<?php
 header('Content-type: application/json; charset=UTF-8');
 $name = $_REQUEST["name"];
 $host='localhost';
 $user='user'; 
 $pass='password';
 $db='database';

 $arr = array();
 $conn = mysqli_connect($host,$user,$pass,$db);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  if($conn) {
  }
  $select_query = "SELECT * FROM playerDB where Name='$name' ";
  mysqli_query($conn, "set session character_set_connection=utf8;");
  $result_set = mysqli_query($conn, $select_query);

  if (mysqli_num_rows($result_set) > 0) {
    while($row = mysqli_fetch_assoc($result_set)) {
         $arr["id"] =  $row["ID"]; $arr["name"]=$row["Name"];
    }
  } else {
    $arr["id"] = '0'; $arr["name"]='0';
  }
  mysqli_close($conn);
  $json = json_encode($arr);
  echo $json;
?>
