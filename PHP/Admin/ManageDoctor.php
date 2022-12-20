<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Admin.php");
    exit();
}
$title = 'Donor List';
require_once './includes/header.php';


?>
<br>
<br>
<br>
<br>
<div class="hd"><h2><i class="fas fa-chevron-circle-right"></i> Manage Doctors</h2></div>


<section class="Dctrlist">
    <div class="Dctrlist">
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Degree</th>
                    <th>Department</th>
                    <th>Chamber</th>
                    <th>Phone No</th>
                    <th>Mail ID</th>
                    <th>&nbsp;&nbsp; Delete(&#128465) &nbsp;&nbsp;</th>
                </tr>
            </thead>
            <tbody>
    </div>

</section>





<?php



require_once '../conn.php';
$query = "SELECT *FROM doctortbl";
$result = mysqli_query($conn, $query);

while ($r = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><center>' . $r['dtname'] . '</center></td>';
    echo '<td><center>' . $r['dtuser_name'] . '</center></td>';
    echo '<td><center>' . $r['dtdegree'] . '</center></td>';
    echo '<td><center>' . $r['dtdept'] . '</center></td>';
    echo '<td><center>' . $r['dtchamber'] . '</center></td>';
    echo '<td><center>' . $r['dtphone'] . '</center></td>';
    echo '<td><center>' . $r['dtemail_id'] . '</center></td>';
    echo "<td><a href=\"DoctorDelete.php?dtid=$r[dtid]\" onClick=\"return confirm
('Are you sure to delete?')\"><input type='submit' value=''> &nbsp;&nbsp; &nbsp;&nbsp;<i class='fas fa-trash-alt'></i></a></td>";




    echo '</tr><center>';
}

?>

</table>
</body>

</html>