<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}

$title = 'Select Doctor';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>


<?php

function ShowDocttor($sql)
{
    require_once '../conn.php';
    $query = $sql;
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['dtname'] . '</center></td>';
        echo '<td><center>' . $r['dtdegree'] . '</center></td>';
        echo '<td><center>' . $r['dtdept'] . '</center></td>';
        echo '<td><center>' . $r['dtchamber'] . '</center></td>';
        echo '<td><center>' . $r['dtphone'] . '</center></td>';
        echo '<td><center>' . $r['dtemail_id'] . '</center></td>';
        echo "<td><a href=\"Bookaptprocess.php?dtid=$r[dtid]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
        echo '</tr><center>';
    }


    echo '</tbody>';
    echo '</table>';
}



?>


<section class="BookApt">
    <div class="titletext">
        <h2><i class="fas fa-angle-double-right"></i> Book Appointment </h2>
    </div>
    <form class="Bookapt-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="srchdt">
            <div class="deptin">
                <label id="aptl1" for="Search">Seacrh By Department: </label>
                <input id="aptsrc" type="text" name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>" required><i class="fas fa-search"></i>
            </div>

            <div class="dtsrc">
                <button type="submit" name="submit" class="dtsrcbtn">Search</button>
            </div>

            <div class="alldtshow">
                <button type="submit" name="show" class="dtsrcbtn">Show All</button>
            </div>

        </div>


    </form>


    <table class="tablestyle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Degree</th>
                <th>Department</th>
                <th>Chamber</th>
                <th>Phone No</th>
                <th>Mail ID</th>
                <th>Set</th>

            </tr>
        </thead>
        <tbody>
</section>

<?php
if (isset($_POST["submit"])) {
    $dept = $_POST['search'];
    $qry = "SELECT * FROM doctortbl WHERE dtdept like '%$dept%'";
    ShowDocttor($qry);
} else {
    $qry = "SELECT *FROM doctortbl";
    ShowDocttor($qry);
}


if (isset($_POST["show"])) {
    $qry = "SELECT *FROM doctortbl";
    ShowDocttor($qry);
}
?>






<!-- <?php require_once './includes/footer.php'; ?> -->