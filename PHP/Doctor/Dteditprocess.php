<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Dtsignin.php");
    exit();
} else {

    $user_name = $_SESSION["user_name"];
    $query = "SELECT * FROM doctortbl WHERE dtuser_name='$user_name';";
    require_once '../conn.php';
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $currentpass = $row['dtpass'];
    }
}
?>
<?php

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $new_name = $_POST['name'];
        $new_degree = $_POST['degree'];
        $new_dept = $_POST['dept'];
        $new_chamber = $_POST['chamber'];
        $new_vtime = $_POST['vtime'];
        $new_vdays = $_POST['vdays'];
        $new_phnno = $_POST['phnno'];
        // $new_pass = $_POST['newpass'];



        $input_crnt_pass = $_POST['crntpass'];
        if ($input_crnt_pass == $currentpass) {

            $sql = "UPDATE doctortbl SET dtname='$new_name',dtdegree='$new_degree',dtdept='$new_dept',dtchamber='$new_chamber',dtvisitingtime='$new_vtime',dtvisitingdays='$new_vdays',dtphone='$new_phnno' where dtuser_name='$user_name';";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Info Updated!")</script>';
               header("refresh: 0; url=Dteditprofile.php");
                mysqli_close($conn);
            } else {
                echo '<script>alert("Try Again!")</script>';
                 header("refresh: 0; url=Dteditprofile.php");
            }
        } else {
            echo '<script>alert("Password Didnt matched!")</script>';
            header("refresh: 0; url=Dteditprofile.php");
        }
    }
}

?> 