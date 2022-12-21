<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <title>loginprocess</title>
</head>

<body>

</body>

</html>
<?php
require_once '../conn.php';
if (isset($_POST["submit"])) {

    // collect value of input field
    $user_name = $_POST['user_name'];
    $user_pass = $_POST['user_pass'];


    $query = "SELECT * from users WHERE Uname='$user_name' and Pass='$user_pass' and UType='gv';";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    $type = $row['UType_Criteria'];
    // var_dump($type);
    if ($count == 1) {
        session_start();
        $_SESSION["gvuser_name"] = $_POST["user_name"];
        $_SESSION['type'] = $type;
        header("refresh: 0; url=GovtHome.php");
        mysqli_close($conn);
        exit();
    } else {
        echo '<script>Swal.fire(
                "Credentials Incorrect",
               "Try Again",
                "error"
              )</script>';
        header("refresh: 2; url=GovtSignin.php");
    }
}

?>