<?php


session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Heart Rate Data';
require_once './includes/header.php';
require_once './includes/sidebar.php';
require_once '../conn2.php';

$defaultvalue = 60;
$user_name = $_SESSION["user_name"];
$Todaydt = date('Y-m-d');
$query = "SELECT *FROM heartratedatatbl where crnt_date='$Todaydt' and username='$user_name'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $defaultvalue = $row['heartrcount'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <style>
        h4 {
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
    <script>
        dcheck();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Homestyle.css">
    <style>
        body {
            background-image: linear-gradient(to right top, #edd3e2, #e3cfe1, #d8cbdf, #cdc7dd, #c2c3d9, #bbc4da, #b3c4db, #abc5da, #a4cadd, #9ed0dc, #9bd5da, #9cd9d4);
            margin: 0;
            height: 100%;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <section class="Heartratedata" id="Heartratedata">
        <!--  -->
        <div class="image">
            <img src="../../Images/heartrate.svg" alt="">
        </div>
        <div class="Countercontent">
            <p>What is Your Average Heart Rate today?</p>
            <div class="counterbox">
                <span id="number">

                    <?php
                    if (isset($_POST['Setted']))
                        echo $_POST['Count'];

                    else
                        echo $defaultvalue;
                    ?>
                </span> BPM
            </div>
            <div class="btns center">
                <button class="btnsubtract">-</button>
                <button class="btnadd">+</button>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input id="fnumber" type="hidden" name="Count" value="<?php
                                                                            if (isset($_POST['Setted']))
                                                                                echo $_POST['Count'];

                                                                            else
                                                                                echo $defaultvalue;
                                                                            ?>" required>
                    <input type="submit" value="SET" name="Setted" class="btnset">
                </form>


            </div>
            <button class="viewgrph" data-bs-toggle="modal" data-bs-target="#exampleModal">View Previous Data</button>
        </div>
        </div>
    </section>
    <script type="text/javascript" src="Js/jquery.min.js"></script>
    <script type="text/javascript" src="Js/Chart.min.js"></script>
    <script type="text/javascript" src="Js/BPM.js"></script>
</body>

<?php


if (isset($_POST["Setted"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $count = 0;

        $countval = $_POST['Count'];
        $user_name = $_SESSION["user_name"];



        $query = "SELECT *FROM heartratedatatbl where crnt_date='$Todaydt' and username='$user_name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $sql = "";



        if ($count >= 1) {
            $sql = "UPDATE heartratedatatbl SET heartrcount=' $countval' where crnt_date='$Todaydt' and username='$user_name'";
        } else {
            $sql = "INSERT INTO heartratedatatbl(heartratedataid,username,crnt_date,heartrcount) VALUES ('0','$user_name',' $Todaydt','$countval')";
        }

        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            echo '<script>Swal.fire(
                "Data Updated!",
                "",
                "success"
              )</script>';
        } else {
            echo '<script>Swal.fire(
                "Try Again",
                 "",
                 "error"
            )</script>';
        }
    }
}

?>