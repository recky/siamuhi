<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qed="update keuangan set Jenis='$_POST[jenis]',Kelas='$_POST[kelas]',Biaya='$_POST[biaya]',TA='$_POST[ta]',Batas='$_POST[batas]'where IdKeu='$_POST[idkeu]'";
$hsled=mysql_query($qed);

if($hsled){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=jpemb'</script>";

}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";

}
?>
