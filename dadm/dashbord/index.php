<?php

session_start();
$hak=$_SESSION['hak'];
switch($hak){
    case 0:
        include("super.php");
        break;
    case 1:
        include("staff.php");
        break;
    case 2:
        include("guru.php");
        break;
    case 3:
        include("loket.php");
        break;
}
?>