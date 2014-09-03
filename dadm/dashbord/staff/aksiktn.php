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
        $qin="delete from berita where id=$_GET[id]";
        $hslin=mysql_query($qin);

        if($hslin){
            echo"<script>alert('Data berhasil terhapus'); window.location='../index.php?content=editor' </script>";
        }else{
            echo"<script>alert('Data gagal terhapus'); window.location='../index.php?content=editor'</script>";
        }
        break;
    case 'unpub':
        $id=$_GET["id"];
        $qs="select status from info_konten where id=$id";
        $rowqs=mysql_fetch_array(mysql_query($qs));
        switch($rowqs['status']){
            case 0:$qin="update berita set status='1'where id=$id";
                break;
            case 1:$qin="update berita set status='0'where id=$id";
                break;
        }
        $hslin=mysql_query($qin);
        if($hslin){
            echo"<script>alert('Perubahan berhasil'); window.location='../index.php?content=editor' </script>";
        }else{
            echo"<script>alert('Perubahan gagal'); window.location='../index.php?content=editor'</script>";
        }
        break;
}

?>