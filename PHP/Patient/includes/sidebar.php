<div class="sidediv">
  <div class="btn">
    <span class="fas fa-bars"></span>
  </div>
  <nav class="sidebar">
    <div class="text">Menu</div>
    <ul>
      <li>
        <a href="#" class="feat-btn"><i class="far fa-calendar-check"></i>  Appointment
          <span class="fas fa-caret-down first"></span>
        </a>
        <ul class="feat-show">
          <li><a href="../../../../PHAWA/PHP/Patient/Bookappointment.php">Book Appointment</a></li>
          <li><a href="../../../../PHAWA/PHP/Patient/Viewappointment.php">View Appointment</a></li>
        </ul>
      </li>
      <li><a href="../../../../PHAWA/PHP/Patient/Seepresc.php"><i class="fas fa-file-medical"></i>  Prescriptions </a></li>
      <li><a href="../../../../PHAWA/PHP/Patient/Donorlist.php"> <i class="fas fa-hand-holding-water"></i>  Donor Lists </a></li>
      <li><a href="../../../../PHAWA/PHP/Patient/covidinfo.php"><i class="fas fa-virus"></i>  Covid-19 Info</a></li>
      <li><a href="../../../../PHAWA/PHP/Patient/Vaccinationhistory.php"><i class="fas fa-file-medical-alt"> </i>  Vaccination History</a></li>
      <li><a href="../../../../PHAWA/PHP/Patient/Medreminder.php">  <i class="far fa-bell"></i>  Medicine Reminder</a></li>
      <li><a href="../../../../PHAWA/PHP/Patient/Ambulancecall.php">  <i class="fas fa-phone-volume"></i>  Call Ambulance</a></li>
      
      
    
    </ul>
  </nav>
</div>

<script>
  $(".btn").click(function() {
    $(this).toggleClass("click");
    $(".sidebar").toggleClass("show");
  });
  $(".feat-btn").click(function() {
    $("nav ul .feat-show").toggleClass("show");
    $("nav ul .first").toggleClass("rotate");
  });
  $(".serv-btn").click(function() {
    $("nav ul .serv-show").toggleClass("show1");
    $("nav ul .second").toggleClass("rotate");
  });
  $("nav ul li").click(function() {
    $(this).addClass("active").siblings().removeClass("active");
  });
</script>