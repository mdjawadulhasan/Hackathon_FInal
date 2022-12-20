<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Dtsignin.php");
    exit();
}
$user_name = $_SESSION["user_name"];
$query = "SELECT * FROM doctortbl WHERE dtuser_name='$user_name';";
require_once '../conn.php';
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $Dtname = $row['dtname'];
    $dtid=$row['dtid'];
}

?>





<?php

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $Prescdate = $_POST['prescdate'];
        $ptid = $_POST['ptid'];
        $presctext = $_POST['presctext'];

        require_once '../conn.php';
        $sql="INSERT INTO prescriptiontbl(prsid,did,pid,prescription,Date,Dtname) VALUES ('0','$dtid','$ptid','$presctext','$Prescdate','$Dtname')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Prescrition Giving Done!")</script>';
            header("refresh: 0; url=ProvidePrescr.php");
            mysqli_close($conn);
        } else {
            echo "Try Again !";
        }
    }
}

?>