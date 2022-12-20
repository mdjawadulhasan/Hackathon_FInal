<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Book Appointment';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>


<body>

    <section class="viewpres">
    <div class="titletext">
        <h2><i class="fas fa-angle-double-right"></i> View Prescription </h2>
    </div>
        <div class="prescimg">
            <img src="../../Images/prescription.gif" alt="">
        </div>
        <div class="presctbl">
            <table class="tablestyle">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Prescription</th>

                    </tr>
                </thead>
                <tbody>


                    <?php
                    $user_name = $_SESSION["user_name"];
                    $query = "SELECT * FROM patienttbl WHERE ptusername='$user_name';";
                    require_once '../conn.php';
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {

                        $ptid = $row['pid'];
                    }


                    require_once '../conn.php';
                    $query = "SELECT *FROM prescriptiontbl where pid='$ptid'";
                    $result = mysqli_query($conn, $query);

                    while ($r = mysqli_fetch_array($result)) {
                        echo '<tr>';
                        echo '<td><center>' . $r['Dtname'] . '</center></td>';
                        echo '<td><center>' . $r['Date'] . '</center></td>';
                        echo '<td><center>' . $r['prescription'] . '</center></td>';
                        echo '</tr>';
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </section>
</body>