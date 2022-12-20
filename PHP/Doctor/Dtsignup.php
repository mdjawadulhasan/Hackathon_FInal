

<?php
if (session_status() >= 0) {
  session_start();
  if (isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Dtprofile.php");
  }
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="./css/styleDreg.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="Dtsignupprocess.php" method="post" name="sForm" onsubmit="return Formvalidate()">
        <div class="user-details">
          <div class="input-box">
            <span class="details"> Name</span>
            <input type="text" placeholder="Name" name="name" value="" required>

          </div>
          <div class="input-box">
            <span class="details">Degree</span>

            <input type="text" placeholder="Degree" name="degree" value="" required>

          </div>
          <div class="input-box">
            <span class="details">Department</span>

            <input type="text" placeholder="Department" name="dept" value="" required>


          </div>
          <div class="input-box">

            <span class="details">Visiting Time</span>
            <input type="text" placeholder="Visiting Time" name="vtime" value="" required>

          </div>
          <div class="input-box">
            <span class="details">Visiting Days </span>
            <input type="text" placeholder="Visiting Days " name="vdays" value="" required>

          </div>
          <div class="input-box">
            <span class="details">Phone No</span>
            <input type="text" name="phnno" placeholder="01x-xxxxxxxx"  required>

          </div>

          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" placeholder="Username" name="user_name" value="" required>

          </div>


          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" placeholder="Email" name="user_email" value="" required>

          </div>


          <div class="input-box">
            <span class="details">Chamber</span>
            <input type="text" placeholder="Chamber" name="chamber" value="" required>

          </div>
          <div class="input-box">
            <span class="details"> Password</span>
            <input type="password" placeholder="password" name="user_pass" value="" required>

          </div>

          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>

        </div>


        <div class="button">

          <a href="Dtsignin.php" class="previous">&laquo;<b> Back<b></a>

          <!-- <input type="submit"  name="submit" value="Back"> -->
          <input type="submit" name="submit" value="Register">

        </div>
      </form>
    </div>
  </div>
  <script>
    function Formvalidate() {

      let name = document.forms["sForm"]["name"].value;
      if (name[0] <= 65 || name[0] >= 120) {
        alert("\"Invalid Name\" The number is not allowed in the first position");
        return false;
      }
      let pass = document.forms["sForm"]["user_pass"].value;
      if (pass.length < 7) {
        alert(" \"weak Password\" Password size at least 8 characters. ");
        return false;
      }
      let phone = document.forms["sForm"]["phnno"].value;
      if (phone.length !=12 ) {
        alert("Invalid Phone Number ,Phone number must be 11 nummber");
        return false;
      }
      let uanme = document.forms["sForm"]["user_name"].value;
      if (uanme[0] <= 65 || uanme[0] >= 120) {
        alert("\"Invalid User Name\" The number is not allowed in the first position");
        return false;
      }
      let email = document.forms["sForm"]["user_email"].value;
      symbolposition = emailID.indexOf("@");
      dotposition = emailID.lastIndexOf(".");
      if (symbolposition < 1 || (symbolposition - atpos < 2)) {
        alert("Invalid Email");
        return false;
      }
    }
  </script>

</body>

</html>