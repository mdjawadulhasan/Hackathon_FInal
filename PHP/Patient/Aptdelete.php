<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}

$aptid=$_GET['aptid'];
require_once '../conn.php';
$sql = "DELETE FROM appointmenttbl where aptid=$aptid";

if (mysqli_query($conn, $sql)) {
    header("location:Viewappointment.php");
    mysqli_close($conn);
} else {
    echo '<script>alert("Try Again!")</script>';
}


?>


