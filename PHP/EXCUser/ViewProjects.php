<?php

session_start();
if (!isset($_SESSION["excuser_name"])) {
    header("refresh: 0; url=EXCSignin.php");
    exit();

}

$title = 'View Projects';
require_once './includes/header.php';
?>


<?php

function showprojects($sql)
{
    $conn = mysqli_connect('localhost', 'root', '', 'dpp');
    $query = $sql;
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['name'] . '</center></td>';
        echo '<td><center>' . $r['location'] . '</center></td>';
        echo '<td><center>' . $r['latitude'] . '</center></td>';
        echo '<td><center>' . $r['longitude'] . '</center></td>';
        echo '<td><center>' . $r['cost'] . '</center></td>';
        echo '<td><center>' . $r['timespan'] . '</center></td>';
        echo '<td><center>' . $r['start_date'] . '</center></td>';
        echo '<td><center>' . $r['completion'] . '</center></td>';
        echo '<td><center>' . $r['actual_cost'] . '</center></td>';
        echo "<td><a href=\"Projectupdate.php?project_id=$r[project_id]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
        echo "<td><a href=\"ShowReport.php?project_id=$r[project_id]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
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
                <label id="aptl1" for="Search">Seacrh By Location: </label>
                <input id="aptsrc" type="text" name="search" value="<?php if (isset($_POST['search']))
                    echo $_POST['search']; ?>"><i class="fas fa-search"></i>
            </div>


            <div class="dtsrc">
                <button type="submit" name="submit" class="dtsrcbtn">Search</button>
            </div>

        </div>





    </form>


    <table class="tablestyle">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Location</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Cost (Crores )</th>
                <th>Time Span (Years)</th>
                <th>Start Date</th>
                <th>Project Completion Percentage</th>
                <th>Actual Cost</th>
                <th>Update Project Data</th>
                <th>Show Users Report</th>
            </tr>
        </thead>
        <tbody>
</section>

<?php

$user_name = $_SESSION["excuser_name"];
$query = "SELECT * FROM users WHERE Uname='$user_name';";
$conn = mysqli_connect('localhost', 'root', '', 'dpp');
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $type = $row['UType_Criteria'];
}

if (isset($_POST["submit"])) {
    $dept = $_POST['search'];



    $qry = "SELECT * FROM proj WHERE location like '%$dept%' and exect='$type'";

    showprojects($qry);

} else {
    $qry = "SELECT *FROM proj where exect='$type'";
    showprojects($qry);
}

?>