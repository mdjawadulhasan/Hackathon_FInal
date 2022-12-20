<?php

$title = 'Statistics';
require_once './header.php';

$data1 = "";
$data2 = "";

$project_id = $_GET['project_id'];

$conn = mysqli_connect('localhost', 'root', '', 'dpp');
$query = "SELECT * FROM proj WHERE project_id='$project_id';";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {

  $Totalcost = $row['completion_percentage'];
  $project_name = $row['project_name'];

}

$data2 = $completion_percentage;
$data1 = 100 - $data2;


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <title>Pie Chart with Chart.js</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css" />

  <style>
    body {
      margin: 0;
    }

    .container {
      height: 100vh;
    }

    .chart-wrapper {
      width: 1000px;
      height: 1000px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="title text-center mb-5">
        <h1>What's your favorite FOOD?</h1>
      </div>
      <div class="chart-wrapper">
        <canvas id="myChart"></canvas>
        <br>
        Project Name :
        <?php echo $project_name; ?>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <script>
    let ctx = document.getElementById("myChart").getContext("2d");
    let d1 = '<?php echo $data1; ?>';
    let d2 = '<?php echo $data2; ?>';
    let labels = ["Remaining", "Complete"];
    let colorHex = ["#FB3640", "#43AA8B"];

    let myChart = new Chart(ctx, {
      type: "pie",
      data: {
        datasets: [
          {
            data: [d1, d2],
            backgroundColor: colorHex,
          },
        ],
        labels: labels,
      },
      options: {
        responsive: true,
        legend: {
          position: "bottom",
        },
        plugins: {
          datalabels: {
            color: "#fff",
            anchor: "end",
            align: "start",
            offset: -10,
            borderWidth: 2,
            borderColor: "#fff",
            borderRadius: 25,
            backgroundColor: (context) => {
              return context.dataset.backgroundColor;
            },
            font: {
              weight: "bold",
              size: "60",
            },
            formatter: (value) => {
              return value + " %";
            },
          },
        },
      },
    });
  </script>
</body>

</html>