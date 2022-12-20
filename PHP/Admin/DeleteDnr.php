<?php

$did=$_GET['did'];
require_once '../conn.php';
$sql = "DELETE FROM donortbl where did=$did";

if (mysqli_query($conn, $sql)) {
    header("location:AddDonor.php");
    mysqli_close($conn);
} else {
    echo '<script>alert("Try Again!")</script>';
}


?>