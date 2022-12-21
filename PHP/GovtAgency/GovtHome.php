<?php
session_start();
if(!isset($_SESSION["gvuser_name"])){
    header("location:GovtSignin.php");
}

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
    $loc=$_POST['search'];
    if(!empty($loc)){
        $loc = "%".$loc."%";
        if($_SESSION['type']==='ECNEC') $qry = "SELECT * FROM props WHERE cost>'50' AND location like '$loc'";
        else if($_SESSION['TYPE']==='MOP') $qry = "SELECT * FROM props WHERE cost<='50' AND location like '$loc'";
        ShowProposals($qry);
    }
    
    
 }
 else {
    if($_SESSION['type']==='ECNEC') $qry = "SELECT * FROM props WHERE cost>'50'";
    else if($_SESSION['TYPE']==='MOP') $qry = "SELECT * FROM props WHERE cost<='50'";
    ShowProposals($qry);
}

?>






<!-- <?php require_once './includes/footer.php'; ?> -->
