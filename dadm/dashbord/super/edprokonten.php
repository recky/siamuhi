<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$tgl=date("Y-m-d");
$qed="update berita set tgl='$tgl',judul='$_POST[judul]',konten='$_POST[konten]',nik='$_POST[nik]',akses='$_POST[akses]',status='$_POST[pub]' where id='$_POST[id]'";
$hsled=mysql_query($qed);

if($hsled){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=editor'</script>";

}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";

}
?>
