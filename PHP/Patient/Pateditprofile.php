<?php

session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 1; url=Patsignin.php");
    exit();
} else {
    $title = 'Edit Profile';
    require_once './includes/header.php';
    require_once './includes/sidebar.php';

    $user_name = $_SESSION["user_name"];
    $query = "SELECT * FROM patienttbl WHERE ptusername='$user_name';";
    require_once '../conn.php';
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $currentpass = $row['ptpass'];
        $phoneno = $row['ptphone'];
        $age = $row['ptage'];
        $Bgrp = $row['ptbgrp'];
        $name = $row['ptname'];
        $gender = $row['ptgender'];
        $Email = $row['ptuseremail'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Patient/css/profilestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>

<body>
    <div class="profile">
        <div class="usercard">
            <div class="imgcontainer">
                <img src="../../Images/placeholder.jpg" alt="Avatar" style="width:100%">
            </div>
            <div class="container">
                <h4><b><?php echo $name ?></b></h4>
            </div>
        </div>

        <div class="userinfo">
            <form action="Editprocess.php" method="post">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" name="uname" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $name ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Email address</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Email ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-first-name">User Name</label>
                                <input type="text" id="input-first-name"  readonly class="form-control form-control-alternative" placeholder="First name" value="<?php echo $user_name ?>" >
                                
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-last-name">Phone Number</label>
                                <input type="text" name="phnno" id="input-last-name" class="form-control form-control-alternative" value="<?php echo $phoneno ?>" placeholder="01x-xxxxxxxx" pattern="[0-9]{3}-[0-9]{8}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">Personal Information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Age</label>
                                <input type="text" name="age" id="input-username" class="form-control form-control-alternative" value="<?php echo $age ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Gender</label>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="Male" required />
                                            <span> Male </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="Female" required />
                                            <span>Female </span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="Others" required/>
                                            <span>Others </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                                    <select name="Bgrp" class="form-control" required>
                                         <option value="">Select Group</option>
                                        </option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <h6 class="heading-small text-muted mb-4">Password Confirmation</h6>
                <div class="pl-lg-4">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Current Password</label>
                            <input type="password" name="crntpass" id="input-email" class="form-control form-control-alternative" value="" required>
                        </div>
                    </div>
                </div>
               
                <button type="submit" name="submit" class="savebtn">Save</button>
        </div>
        </form>

    </div>
    </div>
</body>

