<?php
session_start();
if (!isset($_SESSION["user_name"])) {
  header("refresh: 0; url=Dtsignin.php");
  exit();
}

$patientid = $_GET['patientid'];
require_once '../conn.php';
$query = "SELECT * FROM patienttbl WHERE pid='$patientid';";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $ptname = $row['ptname'];
  $ptage = $row['ptage'];
  $ptbgrp = $row['ptbgrp'];
  $ptid = $row['pid'];
}


?>

<?php
$title = 'View Appointment';
require_once './includes/header.php';

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <div class="modal-body">
          <div id="chart-container">
            <p class="chartext">
            <h2>
              <center>Users Previous Data </center>
            </h2>
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Doctor/css/bmistyle.css" />
  <title>BMI</title>
</head>

<body>
  <div class="container">

    <form action="ConfirPresc.php" method="post">

      <input type="hidden" name="ptid" value="<?php echo $ptid; ?>">
      <h3>SET PRESCRIPTION DATE:<h3>
          <input type="date" name="prescdate" required>
          <label for="Presc">
            <h3>Give Prescription:
          </label>
          <br>
          <textarea name="presctext" rows="10" cols="30" required>Provide the Prescription :</textarea>
          <br>
          <button type="submit" name="submit" style="background-color:#04AA6D">SET</button><br><br>

  </div>
  </form>

  <div class="container">

    <img src="../../Images/eat.png" width="200" height="150">

    <h2>BMI Calculator</h2>
    <h3>Your BMI is: <span id="bmi">0.00</span></h3>
    <input type="text" id="weight" placeholder="Weight (kg)" />
    <input type="text" id="height" placeholder="Height (feet) " />
    <button id="calculate">Calculate</button>
    <button id="calculate" data-bs-toggle="modal" data-bs-target="#exampleModal">See Exercise Data</button>
  </div>
  <script src="../Doctor/bmiapp.js"></script>





</body>


<script type="text/javascript" src="Js/jquery.min.js"></script>
<script type="text/javascript" src="Js/Chart.min.js"></script>
<script type="text/javascript" src="Js/Exercisedata.js"></script>

</html>