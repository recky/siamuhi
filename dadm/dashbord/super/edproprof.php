<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$folder="foto/";
$gambar=$folder .basename($_FILES['foto']['name']);
$sukses=true;
if($gambar=="foto/"){
    $qadmin="select b.url from info_staff b where b.nik='$_POST[nik]'";
    $hsladmin=mysql_query($qadmin);
    $rowadmin=mysql_fetch_array($hsladmin);
    $gambar=$rowadmin['url'];
}else{
    $sukses=move_uploaded_file($_FILES['foto']['tmp_name'],"../".$gambar);
}

$qed="update staff set nama='$_POST[nama]',jk='$_POST[jk]',alamat='$_POST[alamat]',hp='$_POST[hp]',jabatan='$_POST[jabatan]',url='$gambar' where nik='$_POST[nik]'";
$hsled=mysql_query($qed);

if($hsled&&$sukses){

   echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=edprof'</script>";

}else{
   echo"<script>alert('Gagal tersimpan'); window.location='../index.php?content=edprof'</script>";

}
?>
