<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
require_once './includes/header.php';
$user_name = $_SESSION["user_name"];
$query = "SELECT * FROM patienttbl WHERE ptusername='$user_name';";
require_once '../conn.php';
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $patname = $row['ptname'];
    $patid=$row['pid'];
}

?>





<?php

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $AptDate = $_POST['aptdate'];
        $Dtrname = $_POST['dtrname'];
        $Dtrid = $_POST['dtrid'];

        require_once '../conn.php';
        $sql="INSERT INTO appointmenttbl(aptid,doctorid,patientid,apdtname,apptname,appdate) VALUES ('0','$Dtrid',$patid,'$Dtrname','$patname','$AptDate')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>Swal.fire(
                "Appointment Has been Set!",
                "",
                "success"
              )
              </script>';
            header("refresh: 1; url=Bookappointment.php");
            mysqli_close($conn);
        } else {
            echo '<script>Swal.fire(
                "Try Again",
                 "",
                 "error"
            )</script>';
        }
    }
}

?>