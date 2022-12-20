<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Set Appointment';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>

<?php


$dtid = $_GET['dtid'];
require_once '../conn.php';
$query = "SELECT * FROM doctortbl WHERE dtid='$dtid';";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $dtname = $row['dtname'];
    $degree = $row['dtdegree'];
    $dept = $row['dtdept'];
    $chamber = $row['dtchamber'];
    $vtime = $row['dtvisitingtime'];
    $vdays = $row['dtvisitingdays'];
    $phnno = $row['dtphone'];
    $user_email = $row['dtemail_id'];
    $Doctorid = $row['dtid'];
}
?>

<section class="bookapt">

    <div class="dtset">
        <div class="Dtprofile">
            <div class="dtimg">
                <img src="../../Images/Dtuser.png" alt="Avatar" height="200px" width="170px"">
                </div>
                <div class=" dtcontainer">
                <h4><b><?php echo $dtname ?></b></h4>
                <p><?php echo   $degree ?></p>
            </div>
        </div>
        <div class="row">
            <form action="Confirmappointment.php" method="post">

                <input type="hidden" name="dtrname" value="<?php echo $dtname; ?>">
                <input type="hidden" name="dtrid" value="<?php echo $dtid; ?>">
                <input type="date" name="aptdate" class="box" required>
                <input type="submit" name="submit" value="book now" class="btnset">

            </form>
        </div>
    </div>

    <div class="aptsetimage">
        <img src="../../Images/book-img.svg" alt="">
    </div>
</section>


</body>

</html>