<?php

session_start();
if (!isset($_SESSION["excuser_name"])) {
    header("refresh: 0; url=EXCSignin.php");
    exit();

}

$title = 'View Projects';
$project_id = $_GET['project_id'];
require_once './includes/header.php';


$query = "SELECT * FROM proj WHERE project_id='$project_id';";
$conn = mysqli_connect('localhost', 'root', '', 'dpp');
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

    $name = $row['name'];
    $completion = $row['completion'];
    $actual_cost = $row['actual_cost'];
}


?>

<div class="infoinput">
    <h2>Project Name :
        <?php echo $name ?>
    </h2>
    <br>
    <form action="ProjectUpdateProcess.php" method="post">
        <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label">Completion Time</label>
                        <input type="text" autocomplete="off" name="ctime" class="form-control form-control-alternative"
                            value="<?php echo $completion ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $project_id ?>">
                    <div class="form-group focused">
                        <label class="form-control-label">Actual Cost</label>
                        <input type="text" autocomplete="off" name="cost" class="form-control form-control-alternative"
                            value="<?php echo $actual_cost ?>" required>
                    </div>

                </div>

            </div>
        </div>
        <button type="submit" name="submit" class="vsubmitbtn">Update</button>
    </form>
</div>