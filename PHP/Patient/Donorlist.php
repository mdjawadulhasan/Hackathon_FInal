<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}

$title = 'Donor List';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>


<?php

function ShowDonor($sql)
{
    require_once '../conn.php';
    $query = $sql;
    $result = mysqli_query($conn, $query);


    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['dnrname'] . '</center></td>';
        echo '<td><center>' . $r['dnrphone'] . '</center></td>';
        echo '<td><center>' . $r['dnrbrgp'] . '</center></td>';
        echo '<td><center>' . $r['dnrcity'] . '</center></td>';
        echo '<td><center>' . $r['dnrarea'] . '</center></td>';
        echo '</tr><center>';
    }

    echo '</tbody>';
    echo '</table>';
}

?>


<section class="Dnrlist">
<div class="titletext">
        <h2><i class="fas fa-angle-double-right"></i> Donor List</h2>
    </div>
    <form class="DonorList-Form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="srchdt">
            <div class="Dnrin">
                <label id="dnrl1" for="Search">Seacrh By Blood Group: </label>
                <input id="Dnrsrc" type="text" name="search" value="<?php if (isset($_POST['search'])) echo $_POST['search']; ?>" required><i class="fas fa-search"></i>
            </div>

            <div class="dtsrc">
                <button type="submit" name="submit" class="dtsrcbtn">Search</button>
            </div>
        </div>
    </form>

    <div class="dnrimg">
        <img src="../../Images/dnr.gif" alt="" >
    </div>
    <div class="dnrtbl">
    <table class="tablestyle">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone No</th>
                <th>Blood Group</th>
                <th>City</th>
                <th>Area</th>

            </tr>
        </thead>
        <tbody>
    </div>
   
</section>


    <?php
    if (isset($_POST["submit"])) {
        $Blodgrp = $_POST['search'];
        $qry = "SELECT * FROM donortbl WHERE dnrbrgp like '%$Blodgrp%'";
        ShowDonor($qry);
    } else {
        $qry = "SELECT *FROM donortbl";
        ShowDonor($qry);
    }
    ?>


</table>
</body>

