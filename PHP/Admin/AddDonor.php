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


<div class="hd">
    <h2><i class="fas fa-chevron-circle-right"></i> Manage Donors</h2>
</div>
<div class="infoinput">
    <form action="AddDnrprocess.php" method="post">
        <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label">Full Name</label>
                        <input type="text" autocomplete="off" name="name" class="form-control form-control-alternative" required>
                    </div>
                    <div class="form-group focused">
                        <label class="form-control-label">Phone No</label>
                        <input type="text" autocomplete="off" name="phnno" class="form-control form-control-alternative" placeholder="01x-xxxxxxxx" pattern="[0-9]{3}-[0-9]{8}" required>
                    </div>
                    <div class="form-group focused">
                        <label class="form-control-label">Choose Blood Group </label>
                        <select name="bgrp" class="form-control" id="exampleFormControlSelect1">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">City</label>
                        <input type="text" autocomplete="off" name="city" class="form-control form-control-alternative" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Area</label>
                        <input type="text" autocomplete="off" name="area" class="form-control form-control-alternative" required>
                    </div>
                    <div class="form-group">
                        <br>
                        <button type="submit" name="submit" class="vsubmitbtn">Add</button>
                    </div>

                </div>
            </div>
        </div>

    </form>


    <section class="Dnrlist">
        <div class="dnrtbl">
            <table class="tablestyle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Blood Group</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>&nbsp;&nbsp; Delete(&#128465) &nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
        </div>

    </section>



    <?php
   require_once '../conn.php';
    $query = "SELECT *FROM donortbl";
    $result = mysqli_query($conn, $query);


    while ($r = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><center>' . $r['dnrname'] . '</center></td>';
        echo '<td><center>' . $r['dnrphone'] . '</center></td>';
        echo '<td><center>' . $r['dnrbrgp'] . '</center></td>';
        echo '<td><center>' . $r['dnrcity'] . '</center></td>';
        echo '<td><center>' . $r['dnrarea'] . '</center></td>';

        echo "<td><a href=\"DeleteDnr.php?did=$r[did]\" onClick=\"return confirm
('Are you sure to delete?')\"><input type='submit' value=''>&nbsp;&nbsp; &nbsp;&nbsp;<i class='fas fa-trash-alt'></i></a></td>";




        echo '</tr><center>';
    }

    ?>
    </table>



    </body>

    </html>