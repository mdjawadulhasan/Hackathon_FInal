<?php

session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}


//setting header to json
header('Content-Type: application/json');



//get connection
require_once '../conn2.php';



if(!$mysqli){
  die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
// $query = sprintf("SELECT playerid, score FROM score ORDER BY playerid");
$user_name = $_SESSION["user_name"];
$query = sprintf("SELECT crnt_date,heartrcount FROM heartratedatatbl where username='$user_name' ORDER BY crnt_date ");


//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);