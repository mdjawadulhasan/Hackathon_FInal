<?php

$pid=$_GET['pid'];
require_once '../conn.php';
$sql = "DELETE FROM patienttbl where pid='$pid'";

if (mysqli_query($conn, $sql)) {
    header("location:Managepat.php");
    mysqli_close($conn);
} else {
    echo '<script>alert("Try Again!")</script>';
}


?>
