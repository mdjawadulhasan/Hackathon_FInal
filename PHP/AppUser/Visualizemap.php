<?php

$title = 'Project Location';
require_once './includes/header.php';


$array_data = array();
$conn = mysqli_connect('localhost', 'root', '', 'dpp');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * FROM proj";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($r = mysqli_fetch_assoc($result)) {

        $id = $r['project_id'];
        $val = $r['name'];
        $name = "<a href=\"Projectdetails.php?project_id=$id\"><input type='submit' value='' >. $val.</a>";
        $cost = $r['cost'];
        $lat = $r['latitude'];
        $long = $r['longitude'];
        $com = $r['completion'];
        $title = "Completed : " . $com;
        $data = array("type" => "Feature", "geometry" => array("type" => "Point", "coordinates" => [$long, $lat]), "properties" => array("title" => $title, "description" => $name));
        $array_data[] = $data;

    }
}
$main_data = array("type" => "FeatureCollection", "features" => $array_data);
$map = json_encode($main_data);
// echo $map;

?>

<body>
    <div id="map"></div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiamF3YWQ1MjkyMyIsImEiOiJjbGJzZHY4YTIwd2VuM29zMzJvc2QwdXE4In0.c5iuNnLPPnk22YSTY47Ahw';

        const geojson =<?php echo $map ?>;
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v11',
            center: [90.40874895549243, 23.729211164246585],
            zoom: 10
        });

        // add markers to map
        for (const feature of geojson.features) {
            // create a HTML element for each feature
            const el = document.createElement('div');
            el.className = 'marker';

            // make a marker for each feature and add it to the map
            new mapboxgl.Marker(el)
                .setLngLat(feature.geometry.coordinates)
                .setPopup(
                    new mapboxgl.Popup({ offset: 25 }) // add popups
                        .setHTML(
                            `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                        )
                )
                .addTo(map);
        }

    </script>
</body>