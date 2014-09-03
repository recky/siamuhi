<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$ul=$_POST['jumlah'];
$point=1;
while($point<=$ul){
    $ns="nik$point";
    $qin="insert into staff values ('$_POST[$ns]','','','','','','')";
    $hslin=mysql_query($qin);
    $point++;
}

if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=dtpegawai'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
