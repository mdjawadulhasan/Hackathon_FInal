<div class="sidediv">
  <div class="btn">
    <span class="fas fa-bars"></span>
  </div>
  <nav class="sidebar">
    <div class="text">Menu</div>
    <ul>
      Project Viusalizer
      <li><a href="./VisualizeProject.php">Completion Time</a></li>
      <li><a href="./VisualizeLocation.php">Location Wise</a></li>
      <li><a href="./Visualizeyear.php">Year Wise</a></li>
      <li><a href="./Visualizemap.php">Project Location</a></li>




    </ul>
  </nav>
</div>

<script>
  $(".btn").click(function () {
    $(this).toggleClass("click");
    $(".sidebar").toggleClass("show");
  });
  $(".feat-btn").click(function () {
    $("nav ul .feat-show").toggleClass("show");
    $("nav ul .first").toggleClass("rotate");
  });
  $(".serv-btn").click(function () {
    $("nav ul .serv-show").toggleClass("show1");
    $("nav ul .second").toggleClass("rotate");
  });
  $("nav ul li").click(function () {
    $(this).addClass("active").siblings().removeClass("active");
  });
</script>