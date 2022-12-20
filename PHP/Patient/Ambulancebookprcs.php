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
        $pickup = $_POST['padd'];
        $destination = $_POST['dadd'];


        $conn = mysqli_connect('localhost', 'root', '', 'phawa');
        $sql = "INSERT INTO ambulancebooktbl(bookingid,username,pickupadd,Destinationadd) VALUES ('0','$user_name','$pickup', '$destination')";
        if (mysqli_query($conn, $sql)) {
            header("location:Ambulancecall.php");
            mysqli_close($conn);
        } else {
            echo '<script>alert("Try Again!")</script>';
        }
    }
}

?>


<?php

if (isset($_POST["cancel"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_name = $_SESSION["user_name"];
       


        require_once '../conn.php';
        $sql = "DELETE FROM ambulancebooktbl where username='$user_name'";
        if (mysqli_query($conn, $sql)) {
            header("location:Ambulancecall.php");
            mysqli_close($conn);
        } else {
            echo '<script>alert("Try Again!")</script>';
        }
    }
}

?>