<?php

$dtid=$_GET['dtid'];
require_once '../conn.php';
$sql = "DELETE FROM doctortbl where dtid='$dtid'";

if (mysqli_query($conn, $sql)) {
    header("location:ManageDoctor.php");
    mysqli_close($conn);
} else {
    echo '<script>alert("Try Again!")</script>';
}


?>
