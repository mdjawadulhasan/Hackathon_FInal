<?php
$conn = mysqli_connect('localhost', 'root', '', 'dpp');

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $ctime = $_POST['ctime'];
        $cost = $_POST['cost'];


        $sql = "UPDATE proj SET completion='$ctime',actual_cost='$cost' where project_id='$id';";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Info Updated!")</script>';
            header("refresh: 0; url=ViewProjects.php");
            //off con
            mysqli_close($conn);
        } else {
            echo '<script>alert("Try Again!")</script>';
            header("refresh: 0; url=ViewProjects.php");
        }

    }
}

?>