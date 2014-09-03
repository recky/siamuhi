<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/2/14
 * Time: 10:41 AM
 * To change this template use File | Settings | File Templates.
 */


// membaca file koneksi.php
include "konek.php";

// membentuk string command menjalankan mysqldump
// diasumsikan file mysqldump terletak di dalam folder C:\AppServ\MySQL\bin

$command = "D:\xampp\mysql\bin\mysqldump -u".$user." -p".$pass." ".$db." > ".$db.".sql";
// perintah untuk menjalankan perintah mysqldump dalam shell melalui PHP
exec($command);
 // bagian perintah untuk proses download file hasil backup.

header("Content-Disposition: attachment; filename=".$db.".sql");
header("Content-type: application/download");
$fp  = fopen($db.".sql", 'r');
$content = fread($fp, filesize($db.".sql"));
fclose($fp);

echo $content;

exit;
?>