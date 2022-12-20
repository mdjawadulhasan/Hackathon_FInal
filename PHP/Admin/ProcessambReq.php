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



    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="hd">
        <h2><i class="fas fa-chevron-circle-right"></i> Process Ambulance Request</h2>
    </div>


    <button onclick="Printpage()" class="printbtn">Print</button>
    <br>
    <br>
    
    <section class="ambreqlist">
        
        <div class="ambreqtbl">
            <table class="tablestyle" id="ambreqtbl">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>PickUp Address</th>
                        <th>Destination Address</th>
                    </tr>
                </thead>
                <tbody>
        </div>
    </section>
    <script>
        function Printpage() {
          
            const element = document.getElementById("ambreqtbl");
            html2pdf()
                .from(element)
                .save();
        }
    </script>

</body>

</html>


<?php

require_once '../conn.php';
$query = "SELECT *FROM ambulancebooktbl";
$result = mysqli_query($conn, $query);

while ($r = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td><center>' . $r['username'] . '</center></td>';
    echo '<td><center>' . $r['pickupadd'] . '</center></td>';
    echo '<td><center>' . $r['Destinationadd'] . '</center></td>';
    echo '</tr><center>';
}

?>
</table>
</body>

</html>