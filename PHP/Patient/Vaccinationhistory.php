<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Vaccination History';

require_once './includes/header.php';
require_once './includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <style>
        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        a:active {
            text-decoration: none;
        }
    </style>
</head>

<body>
    
    <div class="infoinput" style="background-image: url('../../Images/scope.jpg');">
    <div class="titletext">
        <h2><i class="fas fa-angle-double-right"></i> Vaccination History</h2>
    </div>
    <br>   
    <form action="Addvaccinedataprocess.php" method="post">
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label">Vaccine Name</label>
                            <input type="text" autocomplete="off" name="vname" class="form-control form-control-alternative" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vaccine Doses</label>
                            <select name="doses" class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label">Vaccination Date</label>
                            <input type="date" name="vdate" class="form-control" id="dob" name="dob">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="vsubmitbtn">Save</button>
        </form>
        <button onclick="Printpage()" class="printbtn">Print</button>
    </div>


    <div class="vcntbl">
        <table class="tablestyle" id="vtbl">
            <thead>
                <tr>
                    <th>Vaccine Name</th>
                    <th>Doses</th>
                    <th>Date</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            $username = $_SESSION["user_name"];
            require_once '../conn.php';
            $query = "SELECT *FROM vaccinedatatbl where username='$username' order by vdate desc";
            $result = mysqli_query($conn, $query);

            while ($r = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo '<td><center>' . $r['vname'] . '</center></td>';
                echo '<td><center>' . $r['vdoses'] . '</center></td>';
                echo '<td><center>' . $r['vdate'] . '</center></td>';
                echo "<td><a href=\"Addvaccinedataprocess.php?vcnid=$r[vcnid]\" onClick=\"return confirm
                ('Are you sure to delete?')\"><input type='submit' value=''><i class='fas fa-trash-alt'></i></a></td>";
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            ?>
    </div>

    <script>
        function Printpage() {

            const element = document.getElementById("vtbl");
            html2pdf()
                .from(element)
                .save();
        }
    </script>
</body>

</html>