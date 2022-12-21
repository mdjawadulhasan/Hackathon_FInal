<style>
  <?php session_start();
  session_unset();
  session_destroy();
  ?>
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Public Project Information</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />

  <link rel="icon" href="../Images/homepp.svg" type="image/icon type">
</head>

<body>
  <header class="header">
    <a href="#" class="logo">
      <i class="fas fa-laptop-medical"></i>Public Project Information
    </a>

    <span class="logo2">
      <button onclick="Addcolor()"> <i class="fas fa-adjust"></i></button>
    </span>




  </header>

  <section class="home">
    <div class="img">
      <img src="../Images/homepp.svg" alt="">
    </div>

    <div class="elements">

      <h3>Welcome to the Public Project Information Website</h3>
      <p>
        View Real time project information from this website
      </p>

      <div class="btn">
        <a href="AppUser/AppuserSignin.php" class="loginbtn">Login as AppUser<span
            class="fas fa-sign-in-alt"></span></a>
      </div>
      <br>
      <br>
      <div class="btn">
        <a href="EXCUser/EXCSignin.php" class="loginbtn">Login as EXC User<span class="fas fa-sign-in-alt"></span></a>
      </div>
      <br>
      <br>
      <div class="btn">
        <a href="GovtAgency/GovtSignin.php" class="loginbtn">Login as Govt Agency<span
            class="fas fa-sign-in-alt"></span></a>
      </div>


    </div>
  </section>





  <script>
    var count = 0;

    function Addcolor() {
      if (count % 2 == 0) {
        count++;
        document.querySelector(".home").style.backgroundColor = "#5b6361";
        document.querySelector("h3").style.color = "white";
        document.querySelector("p").style.color = "white";
      } else {
        count++;
        document.querySelector(".home").style.backgroundColor = "#fafafa";
        document.querySelector("h3").style.color = "black";
        document.querySelector("p").style.color = "#777";



      }

    }


    $(document).ready(function () {
      $(".counter").counterUp({
        delay: 10,
        time: 1200,
      });
    });
  </script>
</body>

</html>