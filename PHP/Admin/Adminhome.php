<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Admin.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home page </title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../Images/ticon.svg" type="image/icon type">

    <link rel="stylesheet" href="../Admin/css/adhomestyle.css">
    <style>
        .navbar i {
            color: #16a085;
        }
    </style>
</head>

<body>
    <section class="home" id="home">

        <div class="image">
            <img src="image/home-img.svg" alt="">
        </div>

        <div class="content">
            <h3>stay safe, stay healthy</h3>
            <p></p>

        </div>

    </section>



    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-laptop-medical"></i> Health Care System </a>

        <nav class="navbar">

            <a href="AddDonor.php">Manage Donor</a>
            <a href="ManagePat.php">Manage Patient</a>
            <a href="ManageDoctor.php">Manage Doctor</a>
            <a href="Adminlogout.php"><i class="fas fa-sign-out-alt"></i></a>
        </nav>
    </header>



    <?php
    require_once '../conn.php';
    $query = "SELECT * from patienttbl";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $query = "SELECT * from donortbl";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count2 = mysqli_num_rows($result);


    $query = "SELECT * from doctortbl";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count3 = mysqli_num_rows($result);


    ?>

    <br>

    <br>

    <br>

    <br>

 
    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-procedures"></i>
            <h3><?php echo $count ?></h3>
            <p>Number of Patient</p>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <h3> <?php echo $count2 ?></h3>
            <p>Number of Donors</p>
        </div>

        <div class="icons">
            <i class="fas fa-user-md"></i>
            <h3><?php echo $count3 ?></h3>
            <p>Number of Doctors</p>
        </div>

        <div class="icons">
            <i class="fas fa-hospital"></i>
            <h3>100+</h3>
            <p>available hospitals</p>
        </div>

    </section>

</body>

</html>