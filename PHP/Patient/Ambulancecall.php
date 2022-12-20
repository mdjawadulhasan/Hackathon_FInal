<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("refresh: 0; url=Patsignin.php");
    exit();
}
$title = 'Amblance Call';

require_once './includes/header.php';
require_once './includes/sidebar.php';
?>

<?php
$count=0;
$user_name = $_SESSION["user_name"];
require_once '../conn.php';
$query = "SELECT * from ambulancebooktbl where username='$user_name'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


?>



<section>
    <div class="amb">
        <div class="ambulanceimg">
            <img src="../../Images/amb.svg" id="imgid">
            
        </div>
        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="539" height="420" id="gmap_canvas" src="https://maps.google.com/maps?q=Ambulance&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 395px;
                        width: 539px;
                    }
                </style><a href="https://www.embedgooglemap.net">google maps on my web site</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 395px;
                        width: 539px;
                    }
                </style>
            </div>
        </div>

    </div>
    <div class="bookamb">
        <h2>Provide Details</h2> <h4 id="bookedtext"></h4>
        <h3 id="stattext"></h3>
        <form action="Ambulancebookprcs.php" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Pickup Address</label>
                <input type="text" name="padd" class="form-control" id="formGroupExampleInput" required>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Destination Address</label>
                <input type="text" name="dadd" class="form-control" id="formGroupExampleInput2" required>
            </div>
            <button type="submit" id="bookambbtn" name="submit"  class="btnset">Book now</button>
            
            
        </form>
        <form action="Ambulancebookprcs.php" method="post">
        <button type="submit" id="cancelbbtn" name="cancel"  class="btnset">Cancel Booking  </button>
        </form>
    </div>

    <script type="text/javascript">
        var val = "<?php echo"$count"?>";
        if (val>=1){
    
            document.getElementById("bookedtext").innerHTML="-Already Boked-";
            document.getElementById("imgid").src="../../Images/Runningamb.svg";
            document.getElementById("bookambbtn").style.visibility="hidden";
            document.getElementById("stattext").innerHTML="An ambulance is on your way"
        }
        else
        {
            document.getElementById("cancelbbtn").style.visibility="hidden";
            document.getElementById("stattext").style.visibility="hidden";
            document.getElementById("bookedtext").style.visibility="hidden";
        }
    </script>
</section>




