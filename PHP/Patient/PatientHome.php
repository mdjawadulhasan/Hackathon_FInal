<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Home';
require_once './includes/header.php';
require_once './includes/sidebar.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Homestyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>

    <div class="alert hide">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Warning: Update Your Health Data!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <section class="services" id="services">

        <div class="box-container">

            <div class="box b1">
                <a href="Sleepdata.php" class="fas fa-bed"></a>
                <h3>Sleep</h3>
                <p>Update Your Regular Sleep Data.</p>

            </div>

            <div class="box b2">
                <a href="Heartratedata.php" class="fas fa-heartbeat"></a>
                <h3>Average Heart Rate</h3>
                <p>Update Your Average Heart Rate.</p>

            </div>

            <div class="box b3">
                <a href="Bodyweightdata.php" class="fas fa-child"></a>
                <h3>Body Weight</h3>
                <p>Update Your Body Weight</p>

            </div>

            <div class="box b4">
                <a href="Exercisedata.php" class="fas fa-running"></a>
                <h3>Exercise</h3>
                <p>Update Your Regular Exercise Data.</p>

            </div>

            <div class="box b5">
                <a href="Waterdrinkingdata.php" class="fas fa-glass-whiskey"></a>
                <h3>Water Drinking</h3>
                <p>Update Your Water Drinking Data </p>

            </div>



            <div class="box b6">
                <a href="Covidtest.php" class="fas fa-virus"></a>
                <h3>Covid-19 Test</h3>
                <p>Test Covid-19 Possibility possibility by your symptoms</p>

            </div>

        </div>
    </section>

    <script>
        function show() {
            $('.alert').addClass("show");
            $('.alert').removeClass("hide");
            $('.alert').addClass("showAlert");
        }
        $('.close-btn').click(function() {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
        });
    </script>
</body>


<?php
$Todaydt = date('Y-m-d');
$user_name = $_SESSION["user_name"];
require_once '../conn.php';

$query = "SELECT *FROM sleepdatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count1 = mysqli_num_rows($result);

$query = "SELECT *FROM heartratedatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count2 = mysqli_num_rows($result);

$query = "SELECT *FROM weightdatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count3 = mysqli_num_rows($result);

$query = "SELECT *FROM excdatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count4 = mysqli_num_rows($result);

$query = "SELECT *FROM waterdatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count5 = mysqli_num_rows($result);

$count=(min($count1, $count2, $count3, $count4, $count5));


if ($count <= 0) {

    echo '<script type="text/javascript">',
    'show();',
    '</script>';
}

?>