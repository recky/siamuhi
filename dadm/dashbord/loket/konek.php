<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 9/22/13
 * Time: 11:46 AM
 * To change this template use File | Settings | File Templates.
 */
$host="localhost";
$user="root";
$pass="root";
$db="siamuhi";
$koneksi=mysql_connect($host,$user,$pass) or die ("server anda mati");
$select=mysql_select_db($db) or die ("Database tidak ditemukan");
?>