<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=AppuserSignin.php");
    exit();
}

$title = 'View Projects';
require_once './includes/header.php';
require_once './includes/sidebar.php';
$project_id = $_GET['project_id'];
?>




<div class="infoinput2">
    <form action="AddReport.php" method="post">
        <div class="form-group">
            <label for="exampleFormControlTextarea3">Submit Report</label>
            <textarea class="form-control" name="report" id="exampleFormControlTextarea3" rows="7" required></textarea>

            <label for="star">Choose star:</label>

            <select name="star" id="star">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <input type="hidden" name="id" value=" <?php echo $project_id ?>">

        <div class=" form-group">
            <br>
            <button type="submit" name="submit" class="vsubmitbtn">Add</button>
        </div>
    </form>
</div>