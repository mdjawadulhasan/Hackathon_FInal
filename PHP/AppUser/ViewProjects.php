<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=AppuserSignin.php");
    exit();
}

$title = 'View Projects';
require_once './includes/header.php';
require_once './includes/sidebar.php';
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
        echo "<td><a href=\"ReportProject.php?project_id=$r[project_id]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
        echo '</tr><center>';
    }

    echo '</tbody>';
    echo '</table>';
}

?>


<section class="BookApt">

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
                <th>Submit Reports</th>
            </tr>
        </thead>
        <tbody>
</section>

<?php



if (isset($_POST["submit"])) {
    $dept = $_POST['search'];



    $qry = "SELECT * FROM proj WHERE location like '%$dept%'";

    showprojects($qry);

} else {
    $qry = "SELECT *FROM proj ";
    showprojects($qry);
}

?>