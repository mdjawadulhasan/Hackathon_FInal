<?php
session_start();
if (!isset($_SESSION["excuser_name"])) {
    header("refresh: 0; url=EXCSignin.php");
    exit();
}


$title = 'EXC Profile';
require_once './includes/header.php';
$user_name = $_SESSION["excuser_name"];
$query = "SELECT * FROM users WHERE Uname='$user_name';";
require_once '../conn.php';
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $name = $row['Uname'];
    $type = $row['UType_Criteria'];
    $Email = $row['email'];
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../EXCUser/css/profilestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
    <div class="profile">
        <div class="usercard">
            <div class="imgcontainer">
                <img src="../../Images/placeholder.jpg" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4><b>
                        <?php echo $name ?>
                    </b></h4>
            </div>
        </div>

        <div class="userinfo">
            <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="<?php echo $name ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email address</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="<?php echo $Email ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-last-name">User Type</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                    value="<?php echo $type ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <!-- <button type="button" class="editbtn" onclick="location.href='Pateditprofile.php';">Edit Profile</button> -->

        </div>
    </div>
</body>