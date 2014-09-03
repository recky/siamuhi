<?php
/**
 * Created by JetBrains PhpStorm.
 * User: richees
 * Date: 12/11/13
 * Time: 9:12 PM
 * To change this template use File | Settings | File Templates.
 */
include"konek.php";
$aksi=$_GET['aksi'];
switch($aksi){
    case 'hapus':
        $qin="delete from jadwal where id='$_GET[id]'";
        $hslin=mysql_query($qin);

        if($hslin){
            echo"<script>alert('Data berhasil terhapus'); window.location='../index.php?content=jadwal' </script>";
        }else{
            echo"<script>alert('Data gagal terhapus'); window.location='../index.php?content=jadwal'</script>";
        }
        break;
}

?>