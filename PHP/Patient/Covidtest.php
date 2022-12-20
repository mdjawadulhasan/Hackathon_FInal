<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Covid-19 Test';
require_once './includes/header.php';
require_once './includes/sidebar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .framediv {
            margin-top: -130px;
            margin-right: 0px;
            height: 100%;
            
        }
        *{
            /* overflow-y: hidden; */
        }
        
    </style>

</head>

<body>
    <div class="framediv">
        <iframe src="https://livecoronatest.com/chat.php?city=Unnamed%20Road&lat=23.820264&lng=90.417367&addr_dist=Unknown&addr_div=Unknown" width="100%" height="1000px"></iframe>
    </div>
</body>

</html>