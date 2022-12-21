<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=AppuserSignin.php");
    exit();
}

$title = 'View Projects Details';
require_once './includes/header.php';
require_once './includes/sidebar.php';
$project_id = $_GET['project_id'];






$query = "SELECT * FROM proj WHERE project_id='$project_id';";
$conn = mysqli_connect('localhost', 'root', '', 'dpp');
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $name = $row['name'];
    $location = $row['location'];
    $exc = $row['exect'];
    $cost = $row['cost'];
    $goal = $row['goal'];
    $start_date = $row['start_date'];
    $completion = $row['completion'];
    $actual_cost = $row['actual_cost'];
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../AppUser/css/pd.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            Project Name :
                            <?php $name ?>
                        </h5>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Location : </label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $location ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Executing agency officials :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $exc ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Goal :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $goal ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Completion Time :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $completion ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>project_id? Cost :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $cost ?> Crores
                                    </p>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label>Actual Cost :</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php echo $actual_cost ?> Crores
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>