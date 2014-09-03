<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qed="update mapel set Mapel='$_POST[mapel]',IdKategori='$_POST[idkategori]',Kelas='$_POST[kelas]',IdJurusan='$_POST[idjurusan]',kkm='$_POST[kkm]'where KodeMapel='$_POST[kdmapel]'";
$hsled=mysql_query($qed);

if($hsled){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=mapel'</script>";

}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";

}
?>
