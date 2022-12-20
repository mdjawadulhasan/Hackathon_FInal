<?php

$title = 'View Report';
require_once './includes/header.php';
$project_id = $_GET['project_id'];

function ShowReport($sql)
{
    $conn = mysqli_connect('localhost', 'root', '', 'dpp');
    $query = $sql;
    $result = mysqli_query($conn, $query);
    $idx = 1;
    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['Report_text'] . '</center></td>';
        echo '<td><center>' . $r['star'] . '</center></td>';
        echo '</tr><center>';
        $idx++;
    }


    echo '</tbody>';
    echo '</table>';
}

function ShowProjectName($sql)
{
    $conn = mysqli_connect('localhost', 'root', '', 'dpp');

    $query = $sql;
    $result = mysqli_query($conn, $query);
    while ($r = mysqli_fetch_array($result)) {
        echo $r['name'];
    }



}

?>

<div class="tb">

    Project Name :
    <?php

    $sql = "SELECT name from proj where project_id='$project_id' ";
    ShowProjectName($sql);
    ?>

    <table class="tablestyle">
        <thead>
            <tr>
                <th>Issues</th>
                <th>Ratings</th>
            </tr>
        </thead>
        <tbody>
            </section>


            <?php
            $qry = "SELECT * FROM reports WHERE project_id='$project_id' ORDER BY star DESC";
            ShowReport($qry);
            ?>
        </tbody>
    </table>
</div>