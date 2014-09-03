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
$idsm=mysql_fetch_array(mysql_query("select IdSmtr from semester where status=1"));
$ta=mysql_fetch_array(mysql_query("select ta from ta where status=1"));
while($i<$d){
    $hadir="hadir$i";
    $nis="nis$i";
    $sakit="s$i";
    $ijin="i$i";
    $absen="a$i";
    $qin="insert into absensi values ('','$_POST[$nis]','$_POST[kelas]','$idsm[IdSmtr]','$_POST[bulan]','$ta[ta]','$_POST[pertemuan]','$_POST[$hadir]','$_POST[$sakit]','$_POST[$ijin]','$_POST[$absen]')";
    $hslin=mysql_query($qin);
    $i++;
}
if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); history.back(0)</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
