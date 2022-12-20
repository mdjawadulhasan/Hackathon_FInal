<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Admin.php");
    exit();
}
$title = 'Donor List';
require_once './includes/header.php';

?>
<!doctype html>
<html lang="en">

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Write Message</h3>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Message</label>
                            <input type="text" name="inputmsg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <small id="emailHelp" class="form-text text-muted">This message will be sent to every users.</small>
                        </div>

                        <button type="submit" name="Setted" class="msgsentbtn">Sent</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>


<br>
<br>
<br>
<br>
<br>
<div class="hd">
    <h2><i class="fas fa-chevron-circle-right"></i> Manage Users</h2>
</div>


<button class="msgbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Sent Notifications</button>
<button onclick="location.href='ProcessambReq.php';" class="msgbtn" >Process Ambulance Request</button>
<section class="Patlist">

    <div class="dnrtbl">
        <table class="tablestyle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Username</th>
                    <th>Usermail</th>
                    <th>&nbsp;&nbsp; Delete(&#128465) &nbsp;&nbsp;</th>
                </tr>
            </thead>
            <tbody>
    </div>
</section>






<?php




require_once '../conn.php';
$query = "SELECT *FROM patienttbl";
$result = mysqli_query($conn, $query);

while ($r = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><center>' . $r['ptname'] . '</center></td>';
    echo '<td><center>' . $r['ptphone'] . '</center></td>';
    echo '<td><center>' . $r['ptgender'] . '</center></td>';
    echo '<td><center>' . $r['ptage'] . '</center></td>';
    echo '<td><center>' . $r['ptbgrp'] . '</center></td>';
    echo '<td><center>' . $r['ptusername'] . '</center></td>';
    echo '<td><center>' . $r['ptuseremail'] . '</center></td>';
    echo "<td><a href=\"PatDelete.php?pid=$r[pid]\" onClick=\"return confirm
('Are you sure to delete?')\"><input type='submit' value=''>&nbsp;&nbsp; &nbsp;&nbsp;<i class='fas fa-trash-alt'></i></a></td>";
    echo '</tr><center>';
}

?>
</table>
</body>
</html>


<?php
require_once '../conn.php';
if (isset($_POST["Setted"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $msg = $_POST['inputmsg'];
        
        $sql = "INSERT INTO notificationtbl(Notificationid,Msg) VALUES ('0','$msg')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>Swal.fire(
                "Message has been sent!",
                "",
                "success"
              )</script>';
            mysqli_close($conn);
        } else {
            echo '<script>Swal.fire(
                "Try Again",
                 "",
                 "error"
            )</script>';
        }
    }
}

?>
