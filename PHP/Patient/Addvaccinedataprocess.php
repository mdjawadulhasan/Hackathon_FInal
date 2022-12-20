<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}

?>

<?php

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_name = $_SESSION["user_name"];
        $vname = $_POST['vname'];
        $doses = $_POST['doses'];
        $date = $_POST['vdate'];

        require_once '../conn.php';
        $sql = "INSERT INTO vaccinedatatbl(vcnid,username,vname,vdoses,vdate) VALUES ('0','$user_name','$vname', '$doses','$date')";
        if (mysqli_query($conn, $sql)) {
            header("location:Vaccinationhistory.php");
            mysqli_close($conn);
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}

?>


<?php


$vcnid=$_GET['vcnid'];
require_once '../conn.php';
$sql = "DELETE FROM vaccinedatatbl where vcnid=$vcnid";

if (mysqli_query($conn, $sql)) {
    header("location:Vaccinationhistory.php");
    mysqli_close($conn);
} else {
    echo '<script>alert("Try Again!")</script>';
}


?>


