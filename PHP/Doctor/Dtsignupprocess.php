<?php

$usernameInDB = $mailInDB = "";

if (isset($_POST["submit"])) {

    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $dept = $_POST['dept'];
    $chamber = $_POST['chamber'];
    $vtime = $_POST['vtime'];
    $vdays = $_POST['vdays'];
    $phnno = $_POST['phnno'];


    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];



    require_once '../conn.php';
    $sql = "INSERT INTO doctortbl(dtid,dtname,dtdegree,dtdept,dtchamber,dtvisitingtime,dtvisitingdays,dtphone,dtuser_name,dtemail_id,dtpass) VALUES ('0','$name','$degree','$dept',' $chamber',' $vtime','$vdays',' $phnno','$user_name','$user_email','$user_pass')";



    $query = "SELECT dtuser_name FROM doctortbl WHERE dtuser_name='$user_name';";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $usernameInDB = $row['dtuser_name'];
    }


    $query = "SELECT dtemail_id FROM doctortbl WHERE dtemail_id='$user_email'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $mailInDB = $row['dtemail_id'];
    }


    if ($usernameInDB == $user_name) {

        echo '<script>alert("User Name already available!,Try different User Name!")</script>';
        header("refresh: 0; url=Dtsignup.php");
        mysqli_close($conn);
    } else  if ($mailInDB == $user_email) {
        echo '<script>alert("Mail address already exist !,Try different mail address!")</script>';
        header("refresh: 0; url=Dtsignup.php");
        mysqli_close($conn);
    } else {
        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["user_name"] = $_POST["user_name"];
            header("refresh: 0; url=Dtprofile.php");
            mysqli_close($conn);
        } else {
            echo "Signup is not  !";
        }
    }
}


?>
