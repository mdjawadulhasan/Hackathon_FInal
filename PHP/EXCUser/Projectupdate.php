<?php

session_start();
if (!isset($_SESSION["excuser_name"])) {
    header("refresh: 0; url=EXCSignin.php");
    exit();

}

$title = 'View Projects';
require_once './includes/header.php';
?>

<div class="infoinput">
    <form action="ProjectUpdateProcess.php" method="post">
        <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group focused">
                        <label class="form-control-label">Completion Time</label>
                        <input type="text" autocomplete="off" name="name" class="form-control form-control-alternative"
                            required>
                    </div>
                    <div class="form-group focused">
                        <label class="form-control-label">Actual Cost</label>
                        <input type="text" autocomplete="off" name="phnno" class="form-control form-control-alternative"
                            placeholder="01x-xxxxxxxx" pattern="[0-9]{3}-[0-9]{8}" required>
                    </div>

                </div>

            </div>
        </div>

    </form>
</div>