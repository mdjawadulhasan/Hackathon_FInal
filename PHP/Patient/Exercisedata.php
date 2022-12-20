<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Exercise Record';
require_once './includes/header.php';
require_once './includes/sidebar.php';
require_once '../conn2.php';

$defaultvalue1 = 0;
$defaultvalue2 = 0;
$defaultvalue3 = 0;
$user_name = $_SESSION["user_name"];
$Todaydt = date('Y-m-d');
$query = "SELECT *FROM excdatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {

    $defaultvalue1 = $row['inruncounter'];
    $defaultvalue2 = $row['outruncounter'];
    $defaultvalue3 = $row['cyclingcounter'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <style>
        h4{
            text-align: center;
            color: #16a085;
        }
    </style>
</head>
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                    <i class="fas fa-chevron-circle-right"></i> Your Previous Data 
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="chart-container">
                        <p class="chartext">

                        </p>
                        <canvas id="mycanvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Exercisestyle.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<style>
    body {
            background-image: linear-gradient(to right top, #edd3e2, #e3cfe1, #d8cbdf, #cdc7dd, #c2c3d9, #bbc4da, #b3c4db, #abc5da, #a4cadd, #9ed0dc, #9bd5da, #9cd9d4);
            margin: 0;
            height: 100%;
            
        }
</style>
</head>

<body>
    <div class="excontainer">

        <div class="ex inrun">
            <div class="eximage">
                <img src="../../Images/inrun.svg" alt="">
            </div>

        </div>

        <div class="ex outrun">
            <div class="eximage">
                <img src="../../Images/outrun.svg" alt="">
            </div>

        </div>

        <div class="ex cycle">
            <div class="eximage">
                <img src="../../Images/cycle.svg" alt="">
            </div>
        </div>



        <div class="Countercontent">
            <p>Indoor Run</p>
            <div class="counterbox">
                <span id="number1">

                    <?php
                    if (isset($_POST['Setted1']))
                        echo $_POST['Count1'];

                    else
                        echo $defaultvalue1;
                    ?>
                </span> KM
            </div>
            <div class="btns center">
                <button class="btnsubtract">-</button>
                <button class="btnadd">+</button>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input id="fnumber1" type="hidden" name="Count1" value="<?php
                                                                            if (isset($_POST['Setted1']))
                                                                                echo $_POST['Count1'];

                                                                            else
                                                                                echo $defaultvalue1;
                                                                            ?>" required>
                    <input type="submit" value="SET" name="Setted1" class="btnset">
                </form>


            </div>

        </div>



        <div class="Countercontent">
            <p>Outdoor Run</p>
            <div class="counterbox">
                <span id="number2">

                    <?php
                    if (isset($_POST['Setted2']))
                        echo $_POST['Count2'];

                    else
                        echo $defaultvalue2;
                    ?>
                </span> KM
            </div>
            <div class="btns center">
                <button class="btnsubtract">-</button>
                <button class="btnadd">+</button>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input id="fnumber2" type="hidden" name="Count2" value="<?php
                                                                            if (isset($_POST['Setted2']))
                                                                                echo $_POST['Count2'];

                                                                            else
                                                                                echo $defaultvalue2;
                                                                            ?>" required>
                    <input type="submit" value="SET" name="Setted2" class="btnset">
                </form>


            </div>

        </div>



        <div class="Countercontent">
            <p>Cycling</p>
            <div class="counterbox">
                <span id="number3">

                    <?php
                    if (isset($_POST['Setted3']))
                        echo $_POST['Count3'];

                    else
                        echo $defaultvalue3;
                    ?>
                </span> KM
            </div>
            <div class="btns center">
                <button class="btnsubtract">-</button>
                <button class="btnadd">+</button>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input id="fnumber3" type="hidden" name="Count3" value="<?php
                                                                            if (isset($_POST['Setted3']))
                                                                                echo $_POST['Count3'];

                                                                            else
                                                                                echo $defaultvalue3;
                                                                            ?>" required>
                    <input type="submit" value="SET" name="Setted3" class="btnset">
                </form>


            </div>
            <button class="viewgrph" data-bs-toggle="modal" data-bs-target="#exampleModal">View Previous Data</button>
        </div>

    </div>


</body>
<script type="text/javascript" src="Js/jquery.min.js"></script>
<script type="text/javascript" src="Js/Chart.min.js"></script>
<script type="text/javascript" src="Js/Exercisedata.js"></script>

</html>



<?php

if (isset($_POST["Setted1"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = 0;


        $countval1 = $_POST['Count1'];
        $user_name = $_SESSION["user_name"];


        $query = "SELECT *FROM excdatatbl where crnt_date='$Todaydt' and username='$user_name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $sql = "";



        if ($count >= 1) {
            $sql = "UPDATE excdatatbl SET inruncounter ='$countval1' where crnt_date='$Todaydt' and username='$user_name'";
        } else {
            $sql = "INSERT INTO excdatatbl(exedtaid,username,crnt_date,inruncounter,outruncounter,cyclingcounter) VALUES ('0','$user_name','$Todaydt','$countval1','0','0')";
        }

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo '<script>Swal.fire(
                "Data Updated!",
                "",
                "success"
              )</script>';
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}



if (isset($_POST["Setted2"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = 0;


        $countval2 = $_POST['Count2'];
        $user_name = $_SESSION["user_name"];


        $query = "SELECT *FROM excdatatbl where crnt_date='$Todaydt' and username='$user_name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $sql = "";



        if ($count >= 1) {
            $sql = "UPDATE excdatatbl SET outruncounter ='$countval2' where crnt_date='$Todaydt' and username='$user_name'";
        } else {
            $sql = "INSERT INTO excdatatbl(exedtaid,username,crnt_date,inruncounter,outruncounter,cyclingcounter) VALUES ('0','$user_name','$Todaydt','0','$countval2','0')";
        }

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo '<script>Swal.fire(
                "Data Updated!",
                "",
                "success"
              )</script>';
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}




if (isset($_POST["Setted3"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = 0;


        $countval3 = $_POST['Count3'];
        $user_name = $_SESSION["user_name"];


        $query = "SELECT *FROM excdatatbl where crnt_date='$Todaydt' and username='$user_name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $sql = "";



        if ($count >= 1) {
            $sql = "UPDATE excdatatbl SET cyclingcounter ='$countval3' where crnt_date='$Todaydt' and username='$user_name'";
        } else {
            $sql = "INSERT INTO excdatatbl(exedtaid,username,crnt_date,inruncounter,outruncounter,cyclingcounter) VALUES ('0','$user_name','$Todaydt','0','0','$countval1')";
        }

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo '<script>Swal.fire(
                "Data Updated!",
                "",
                "success"
              )</script>';
        } else {
            echo '<script>alert("Try Again")</script>';
        }
    }
}

?>