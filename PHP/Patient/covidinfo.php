<?php
session_start();
if (!isset($_SESSION["user_name"])) {
  header("refresh: 0; url=Patsignin.php");
  exit();
}
$title = 'Covid-19';
require_once './includes/header.php';
require_once './includes/sidebar.php';
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Covid Datas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../Patient/css/stylecovid.css" />
</head>

<body>
  <div class="container">
    <h2><img src="" id="flag"></h2>
    <h2><span id="country"></span> </h2>
    <span>
      <h2>COVID -19 Dashboard</h2>
    </span>
    <div class="board">
      <div class="card a"><i class="fa fa-tachometer"></i>
        <h5>Active Cases</h5><span id="active"></span>
      </div>
      <div class="card ca"><i class="fa fa-th-list"></i>
        <h5>Total Cases</h5><span id="cases"></span>
      </div>
      <div class="card cr"><i class="fas fa-exclamation-triangle"></i>
        <h5>Critical Cases</h5><span id="critical"></span>
      </div>
      <div class="card d"><i class="fa fa-times"></i>
        <h5>Total Deaths</h5><span id="death"></span>
      </div>
      <div class="card r"><i class="fas fa-user-check"></i>
        <h5>Recovered Cases</h5><span id="recovered"></span>
      </div>
      <div class="card t"><i class="fas fa-vials"></i>
        <h5>Total Testes Done</h5><span id="tests"></span>
      </div>
    </div>
  </div>
  <button class="sbtn" onclick="ShowCovid()">Show Map</button>
 
  <div id="covidmap">
    <iframe src="https://ourworldindata.org/grapher/total-cases-covid-19?tab=map" width="100%" height="600px"></iframe>
  </div>

  
  

</body>

</html>
<script type="text/javascript">
  fetch('https://corona.lmao.ninja/v2/countries/Bangladesh')
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data);
      id = data.country;
      document.getElementById("active").innerHTML = data.active.toLocaleString();
      document.getElementById("cases").innerHTML = data.cases.toLocaleString();
      document.getElementById("critical").innerHTML = data.critical.toLocaleString();
      document.getElementById("death").innerHTML = data.deaths.toLocaleString();
      document.getElementById("recovered").innerHTML = data.recovered.toLocaleString();
      document.getElementById("tests").innerHTML = data.tests.toLocaleString();
      document.getElementById("flag").src = data.countryInfo.flag;
    });

    function ShowCovid() {
    var x = document.getElementById("covidmap");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }


</script>