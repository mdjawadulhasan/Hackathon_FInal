<?php
$title = 'Profile';
require_once './includes/header.php'; ?>
<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Dtsignin.php");
    exit();
} else {

    $user_name = $_SESSION["user_name"];
    $query = "SELECT * FROM doctortbl WHERE dtuser_name='$user_name';";
    require_once '../conn.php';
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        $name = $row['dtname'];
        $degree = $row['dtdegree'];
        $dept = $row['dtdept'];
        $chamber = $row['dtchamber'];
        $vtime = $row['dtvisitingtime'];
        $vdays = $row['dtvisitingdays'];
        $phnno = $row['dtphone'];
        $currentpass = $row['dtpass'];
        $user_email = $row['dtemail_id'];
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Doctor/css/profilestyle.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>


<body>

    <body>

        <div class="profile">
            <div class="usercard">
                <div class="imgcontainer">
                    <img src="../../Images/p1.png" alt="Avatar" style="width:100%">
                </div>
                <div class="container">
                    <h4><b><?php echo $name ?></b></h4>
                </div>
            </div>


            <br>
            <div class="userinfo">
                <form action="Dteditprocess.php" method="post">
                    <h4 class="heading-small text-muted mb-4"><b>User information<b></h4>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Name</label>
                                    <input type="text" id="input-username" name="name" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $name ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Email address</label>
                                    <input type="email" id="input-email"  class="form-control form-control-alternative" value="<?php echo  $user_email ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">User Name</label>
                                    <input type="text" id="input-first-name"  class="form-control form-control-alternative" placeholder="First name" value="<?php echo $user_name ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-last-name">Phone Number</label>
                                    <input type="text" id="input-last-name" name="phnno" class="form-control form-control-alternative" value="<?php echo  $phnno ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <h4 class="heading-small text-muted mb-4"><b>Professional Information<b>
                    </h4>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Department </label>
                                    <input type="text" id="input-username" name="dept" class="form-control form-control-alternative" value="<?php echo $dept ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-degree">Degree </label>
                                    <input type="text" id="input-degree" name="degree" class="form-control form-control-alternative" value="<?php echo   $degree ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Visiting Time </label>
                                    <input type="text" id="input-first-name"  name="vtime" class="form-control form-control-alternative" value="<?php echo  $vtime ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Visiting Days </label>
                                    <input type="text" id="input-username" name="vdays"  class="form-control form-control-alternative" value="<?php echo   $vdays ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Chamber </label>
                                    <input type="text" id="input-first-name" name="chamber"  class="form-control form-control-alternative" value="<?php echo $chamber ?>" required>
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

    </body>

</html>