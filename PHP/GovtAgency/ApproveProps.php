<?php

    $title = 'Check Constrains';
    ///require_once 'includes/header.php';
    $prop_id = $_GET['pid'];
    // var_dump($prop_id);

    function constraint1($pid){
        //FIND EXEC
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql="SELECT exect FROM props WHERE project_id='$pid'";
        $result = mysqli_query($conn, $sql);
        
        while ($r = mysqli_fetch_assoc($result)) {
            $exec=$r['exect'];
        }
        //FIND MAX LIMIT FROM CONSTRAIN
        $sql="SELECT max_limit from cons WHERE code='$exec' AND constraint_type='executing_agency_limit'";
        $result = mysqli_query($conn, $sql);
        // var_dump($result);
        $maxl=INF;
        if(mysqli_num_rows($result)>0){

            while ($r = mysqli_fetch_assoc($result)) {
                $maxl=$r['max_limit'];
            }
        }

        // find running projects from proj
        $sql="SELECT * from proj WHERE exect='$exec' AND completion<100";
        $result = mysqli_query($conn, $sql);
        $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $cnt= mysqli_num_rows($result);

        return $cnt<$maxl;
    }
    // var_dump(constrain1($prop_id));

    function constraint2($pid){
        //Find location
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql="SELECT location FROM props WHERE project_id='$pid'";
        $result = mysqli_query($conn, $sql);
        while ($r = mysqli_fetch_assoc($result)) {
            $loc=$r['location'];
        }
        //find location max limit
        $maxl=INF;
        $sql="SELECT max_limit from cons WHERE code='$loc' AND constraint_type='location_limit'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while ($r = mysqli_fetch_assoc($result)) {
                $maxl=$r['max_limit'];
            }
        }
        // echo $maxl;
        
        //find running projects on this location
        $sql="SELECT * from proj WHERE location='$loc' AND completion<100";
        $result = mysqli_query($conn, $sql);
        $r = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $cnt= mysqli_num_rows($result);
        // echo $cnt;
        return $cnt<$maxl;
    }
    // var_dump(constraint2($prop_id));

    function constraint3($pid){
        //FIND EXEC
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql="SELECT exect, cost FROM props WHERE project_id='$pid'";
        $result = mysqli_query($conn, $sql);
        
        while ($r = mysqli_fetch_assoc($result)) {
            $exec=$r['exect'];
            $cost=$r['cost'];
        }
        //FIND MAX LIMIT FROM CONSTRAIN
        $sql="SELECT max_limit from cons WHERE code='$exec' AND constraint_type='yearly_funding'";
        $result = mysqli_query($conn, $sql);
        // var_dump($result);
        $maxl=INF;
        if(mysqli_num_rows($result)>0){
            while ($r = mysqli_fetch_assoc($result)) {
                $maxl=$r['max_limit'];
            }
        }
        //calculating total budget
        $total=0;
        $sql="SELECT sum(actual_cost) AS 'total' from proj WHERE exect='$exec' AND completion<100";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while ($r = mysqli_fetch_assoc($result)) {
                $total=$r['total'];
            }
        }
        // echo $total;
        return $total+$cost<=$maxl;
        // echo $cnt;
        // return $cnt<$maxl;

    }
    //  constraint3($prop_id);

    // function constraint4($pid){
    //     //find project_id dependent components

    //     //

    // }
    // constraint4($proj_id);
    // var_dump(!constraint1($prop_id));
    // var_dump(constraint2($prop_id));
    // var_dump(constraint3($prop_id));

    // approve
    if(constraint1($prop_id) and constraint2($prop_id) and constraint3($prop_id)){
        $conn = mysqli_connect('localhost', 'root', '', 'dpp');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $stmt = mysqli_stmt_init($conn);
        $sql= "SELECT * FROM props WHERE project_id='$prop_id'";
        $result = mysqli_query($conn, $sql);
        $name=NULL;
        $loc=NULL;
        $lat=NULL;
        $long=NULL;
        $exect=NULL;
        $cost=NULL;
        $timespan=NULL;
        $goal=NULL;
        $id='proj';
        if(mysqli_num_rows($result)>0){
            while($r=mysqli_fetch_assoc($result)){
                $name=$r['name'];
                $loc=$r['location'];
                $lat=$r['latitude'];
                $long=$r['longitude'];
                $exect=$r['exect'];
                $cost=$r['cost'];
                $timespan=$r['timespan'];
                $goal=$r['goal'];
                $id.=substr($r['project_id'],4);
            }
        }
        $sdate = date("Y/m/d");
        // echo $id;
        $sql="INSERT INTO proj(name, location, latitude, longitude, exect, cost, timespan, project_id, goal, start_date, completion, actual_cost) VALUES ('$name','$loc','$lat','$long', '$exect','$cost','$timespan','$id','$goal','$sdate',0.00,0.00)";
        $result = mysqli_query($conn, $sql);
        $sql="DELETE FROM props WHERE project_id='$prop_id'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location:GovtHome.php");
    }
    else{
        echo '<script>alert("Constraint not fullfilled!")</script>';
        header("refresh: 0.001; url=GovtHome.php");
        //error message
    }


?>
