<?php
$title = 'Logout';
?>

<!DOCTYPE html>

<head>
    <script>
        sessionStorage.clear();  
    </script>
</head>

</html>

<?php
if (session_status() >= 0) {
    session_start();
    session_unset();
    session_destroy();
    header("refresh: 0; url=index.php");
}

?>