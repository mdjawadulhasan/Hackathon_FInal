<?php
if(session_status()>=0)
{
    session_start();
    session_unset();
    session_destroy();
    header("refresh: 0; url=Admin.php");

}

?>