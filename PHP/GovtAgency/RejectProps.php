<?php

    $title = 'Check Constrains';
    ///require_once 'includes/header.php';
    $prop_id = $_GET['pid'];
    // var_dump($prop_id);
    // if(constraint1($prop_id) and constraint2($prop_id) and constraint3($prop_id)){
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql="DELETE FROM props WHERE project_id='$prop_id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location:GovtHome.php");
    // }


?>
