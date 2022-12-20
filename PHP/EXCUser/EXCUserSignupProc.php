<?php
$usernameInDB = $mailInDB = "";

if (isset($_POST["submit"])) {

    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];
    $user_email = $_POST['user_email'];
    $UType_Criteria = $_POST['TypeCriteria'];


    $UType = "eu";



    require_once '../conn.php';
    $sql = "INSERT INTO users(Uid,Uname,Pass,UType,UType_Criteria,email) VALUES ('0','$user_name','$user_pass','$UType','$UType_Criteria','$user_email')";

    if (isset($user_name) && isset($user_pass)) {

        $query = "SELECT Uname FROM users WHERE Uname='$user_name';";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $usernameInDB = $row['Uname'];
        }


        $query = "SELECT email FROM users WHERE email='$user_email'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $mailInDB = $row['email'];
        }


        if ($usernameInDB == $user_name) {

            echo '<script>alert("User Name already available!,Try different User Name!")</script>';
            header("refresh: 0.5; url=EXCSignin.php");
            mysqli_close($conn);
        } else if ($mailInDB == $user_email) {
            echo '<script>alert("Mail address already exist !,Try different mail address!")</script>';
            header("refresh: 0.5; url=EXCSignin.php");
            mysqli_close($conn);
        } else {
            if (mysqli_query($conn, $sql)) {
                session_start();
                $_SESSION["exuser_name"] = $_POST["user_name"];
                header("refresh: 1; url=EXCHome.php");
                mysqli_close($conn);
            } else {
                echo '<script>alert("Try Again")</script>';
            }
        }
    }
}