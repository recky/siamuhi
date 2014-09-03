<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/31/13
 * Time: 1:23 AM
 * To change this template use File | Settings | File Templates.
 */
include("../konek.php");
session_start();
$idlogin=$_SESSION["id"];

$ip   = $_SERVER['REMOTE_ADDR'];
$tanggal = date("Ymd");
$waktu  = date("h:i:s");

$s = mysql_query("SELECT * FROM konter WHERE ip='$ip' AND tanggal='$tanggal' AND idlogin='$idlogin' ");

if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO konter(id, ip, tanggal, hak, waktu, idlogin) VALUES('','$ip','$tanggal','4','$waktu','$idlogin')");
}else{
    mysql_query("UPDATE  konter SET waktu='$waktu' where ip='$ip' and tanggal='$tanggal' and idlogin='$idlogin'");
}

?>