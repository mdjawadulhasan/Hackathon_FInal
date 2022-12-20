<?php
require_once '../conn.php';

if (isset($_POST["submit"])) {

    $name = $_POST['name'];
    $phnno = $_POST['phnno'];
    $Bgrp = $_POST['bgrp'];
    $city = $_POST['city'];
    $area = $_POST['area'];


   
    $sql = "INSERT INTO donortbl(did,dnrname,dnrphone,dnrbrgp,dnrcity,dnrarea) VALUES ('0','$name','$phnno','$Bgrp','$city','$area')";
    if (mysqli_query($conn, $sql)) {
        header("location:AddDonor.php");
        mysqli_close($conn);
    } else {
        echo "Signup is not Done Bro !";
    }
}


?>