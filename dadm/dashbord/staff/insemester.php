<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 7:12 PM
 * To change this template use File | Settings | File Templates.
 */

include "konek.php";
$qin="insert into semester values ('$_POST[idsmtr]','$_POST[smtr]','$_POST[status]')";
$hslin=mysql_query($qin);
if($hslin){
    echo"<script>alert('Data berhasil tersimpan'); window.location='../index.php?content=semester'</script>";
}else{
    echo"<script>alert('Gagal tersimpan'); history.back(0)</script>";
}
?>
