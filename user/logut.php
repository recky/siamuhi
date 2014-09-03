<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 9/23/13
 * Time: 10:24 AM
 * To change this template use File | Settings | File Templates.
 */
session_start();
$_SESSION=array();
session_destroy();
header("location:../index.php");
exit();
$expire=time()-60*60*24*30;
?>