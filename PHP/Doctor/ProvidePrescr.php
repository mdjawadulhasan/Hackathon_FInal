<?php
$title = 'View Appointment';
require_once './includes/header.php';
?>
<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Dtsignin.php");
    exit();
}



?>


<section class="viewapt">
    <div class="viewaptimg">
        <img src="../../Images/Apt.gif" alt="" width="500" height="500">
    </div>
    <div class="viewapttbl">
        <table class="tablestyle">
            <thead>

                <tr>
                    <th>Doctor Name</th>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                    <th>Give</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $user_name = $_SESSION["user_name"];
                $query = "SELECT * FROM doctortbl WHERE dtuser_name='$user_name';";
                require_once '../conn.php';
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {

                    $dtid = $row['dtid'];
                }


                require_once '../conn.php';
                $query = "SELECT *FROM appointmenttbl where doctorid='$dtid'";
                $result = mysqli_query($conn, $query);

                while ($r = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td><center>' . $r['apdtname'] . '</center></td>';
                    echo '<td><center>' . $r['apptname'] . '</center></td>';
                    echo '<td><center>' . $r['appdate'] . '</center></td>';
                    echo "<td><a href=\"ProvidePrescrProcess.php?patientid=$r[patientid]\"><input type='submit' value='' ><i class='fa fa-forward'></i></a></td>";
                }
                ?>

        </table>
    </div>
    
</section>