<?php


$title = 'View Projects';
require_once './includes/header.php';
?>


<?php

function ShowProposals($sql)
{
    $conn = mysqli_connect('localhost', 'root', '', 'dpp');
    $query = $sql;
    $result = mysqli_query($conn, $query);

    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['project_id'] . '</center></td>';
        echo '<td><center>' . $r['name'] . '</center></td>';
        echo '<td><center>' . $r['location'] . '</center></td>';
        echo '<td><center>' . $r['latitude'] . '</center></td>';
        echo '<td><center>' . $r['longitude'] . '</center></td>';
        echo '<td><center>' . $r['exect'] . '</center></td>';
        echo '<td><center>' . $r['cost'] . '</center></td>';
        echo '<td><center>' . $r['timespan'] . '</center></td>';
        echo '<td><center>' . $r['goal'] . '</center></td>';
        echo '<td><center>' . $r['proposal_date'] . '</center></td>';
        echo "<td><a href=\"ApproveProps.php?pid=$r[project_id]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
        echo "<td><a href=\"RejectProps.php?pid=$r[project_id]\"><input type='submit' value='' ><i class='fas fa-angle-double-right'></i></i></i></a></td>";
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
                <label id="aptl1" for="Search">Seacrh By Category: </label>
                <input id="aptsrc" type="text" name="search" value="<?php if (isset($_POST['search']))
                    echo $_POST['search']; ?>"><i class="fas fa-search"></i>
            </div>


            <!-- <div class="yearin">
                <label id="aptl1" for="Search">Seacrh By Year: </label>
                <input id="aptsrc" type="text" name="y1" value="<?php if (isset($_POST['y1']))
                    echo $_POST['y1']; ?>">To

                <input id="aptsrc" type="text" name="y2" value="<?php if (isset($_POST['y2']))
                    echo $_POST['y2']; ?>"><i class="fas fa-search"></i>
            </div> -->


            <div class="dtsrc">
                <button type="submit" name="submit" class="dtsrcbtn">Search</button>
            </div>

        </div>





    </form>


    <table class="tablestyle">
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Location</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Exec</th>
                <th>Cost</th>
                <th>Timespan</th>
                <th>Goal</th>
                <th>Proposal Date</th>
                <th>Approve</th>
                <th>Reject</th>
            </tr>
        </thead>
        <tbody>
</section>

<?php
if (isset($_POST["submit"])) {
    $dept = $_POST['search'];
    // $year1 = $_POST['y1'];
    // $year2 = $_POST['y2'];


    if (empty($year1) && empty($year2)) {

        $qry = "SELECT * FROM project WHERE category like '%$dept%'";

    } else if ($dept == null) {
        $time_input1 = strtotime($year1);
        $time_input2 = strtotime($year2);

        // echo ($year1);

        //SELECT * FROM wp_osd_properties WHERE `listing_expiration` < '2020-08-05'
        // $qry = "SELECT * FROM project where 'project_start_time' >=  '$year1' ";

        // qry = "SELECT * FROM project WHERE ".$time_input1." AND ". $time_input2";

        //$qry = "SELECT * FROM project where BETWEEN '$time_input1' AND   '$time_input2' ";

    }

} else {
    $qry = "SELECT * FROM props";
    ShowProposals($qry);
}

?>






<!-- <?php require_once './includes/footer.php'; ?> -->