<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=AppuserSignin.php");
    exit();
}

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_name = $_SESSION["user_name"];
        $id = $_POST['id'];
        $report = $_POST['report'];
        $star = $_POST['star'];
        $tdate = date("Y/m/d");
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');

        $sql = "INSERT INTO reports(Rid,Uname,tdate,Report_text,project_id,star) VALUES ('0',' $user_name','$tdate','$report','$id','$star')";

        if (mysqli_query($conn, $sql)) {
            header("location:ViewProjects.php");
            mysqli_close($conn);
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}

?>