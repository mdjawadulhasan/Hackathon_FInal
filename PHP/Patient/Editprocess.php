
<?php
require_once '../conn.php';

session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 1; url=Patsignin.php");
    exit();
} else {
    $user_name = $_SESSION["user_name"];
    $query = "SELECT * FROM patienttbl WHERE ptusername='$user_name';";
   
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $currentpass = $row['ptpass'];
        $gender = $row['ptgender'];
        $Bgrp = $row['ptbgrp'];
    }
}
?>

<?php

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newname = $_POST['uname'];
        $newemail = $_POST['email'];
        $new_phn = $_POST['phnno'];
        $new_age = $_POST['age'];
        $newgender = $_POST['gender'];
        $new_bgrp = $_POST['Bgrp'];
        $input_crnt_pass = $_POST['crntpass'];

        if($newgender=="")
        {
            $newgender=$gender;
        }

        if ($input_crnt_pass == $currentpass) {

            $sql = "UPDATE patienttbl SET ptname='$newname',ptuseremail='$newemail', ptgender='$newgender',ptphone='$new_phn',ptage='$new_age',ptbgrp='$new_bgrp' where ptusername='$user_name';";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Info Updated!")</script>';
                header("refresh: 0; url=Patprofile.php");
                //off con
                mysqli_close($conn);
            } else {
                echo '<script>alert("Try Again!")</script>';
                header("refresh: 0; url=Pateditprofile.php");
            }
        } else {
            echo '<script>alert("Password Didnt matched!")</script>';
            header("refresh: 0; url=Pateditprofile.php");
        }
    }
}

?>