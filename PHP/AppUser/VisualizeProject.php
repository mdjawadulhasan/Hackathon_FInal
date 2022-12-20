<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=AppuserSignin.php");
    exit();
}


$title = 'Visualize';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    <style>
        .vi {
            margin-top: 100px;
            margin-left: 100px;
            width: 1300px;
        }
    </style>
</head>

<body>

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'dpp');
    $query = $con->query("
    SELECT 
      name,
        completion
    FROM proj");

    foreach ($query as $data) {
        $name[] = $data['name'];
        $completion[] = $data['completion'];
    }

    ?>


    <div class="vi">
        <canvas id="myChart"></canvas>
    </div>

    <script>

        const labels = <?php echo json_encode($name) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Project Completed %',
                data: <?php echo json_encode($completion) ?>,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
            ],
                borderWidth: 2
    }]
  };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

</body>

</html>