<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 1/6/14
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */


include "konek.php";
$i=1;
$d=$_POST['jml'];
while($i<$d){
    $bul="bulan$i";
    $temu="pertemuan$i";
    $hadir="hadir$i";
    $id="idab$i";
    $sakit="s$i";
    $ijin="i$i";
    $absen="a$i";
    $qin="update absensi set bulan='$_POST[$bul]', pertemuan='$_POST[$temu]', kehadiran='$_POST[$hadir]', s='$_POST[$sakit]', i='$_POST[$ijin]', a='$_POST[$absen]' where IdAbsensi='$_POST[$id]'";
    $hslin=mysql_query($qin);
    $i++;
}
if($hslin){
    echo"ttt$bul";
    echo"<script>alert('Data berhasil tersimpan'); history.back(0)</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
