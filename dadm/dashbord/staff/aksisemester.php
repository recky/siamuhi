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
        $qin="delete from semester where IdSmtr='$_GET[id]'";
        $hslin=mysql_query($qin);

        if($hslin){
            echo"<script>alert('Data berhasil terhapus'); window.location='../index.php?content=semester' </script>";
        }else{
            echo"<script>alert('Data gagal terhapus'); window.location='../index.php?content=semester'</script>";
        }
        break;
    case 'akti':
        $id=$_GET["id"];
        $qs="select Status from semester where IdSmtr='$id'";
        $rowqs=mysql_fetch_array(mysql_query($qs));
        switch($rowqs['Status']){
            case 0:$qin="update semester set status='1'where IdSmtr='$id'";
                break;
            case 1:$qin="update semester set status='0'where IdSmtr='$id'";
                break;
        }
        $hslin=mysql_query($qin);
        if($hslin){
            echo"<script>alert('Perubahan berhasil'); window.location='../index.php?content=semester' </script>";
        }else{
            echo"<script>alert('Perubahan gagal'); window.location='../index.php?content=semester'</script>";
        }
        break;
}

?>